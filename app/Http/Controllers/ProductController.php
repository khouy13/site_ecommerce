<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{ 
    public function index()
    { 
        $productsAct=Product::latest()->take(10)->get();
        Session::start();
        $categories=Categorie::all();
        $products=[];
        $data=[];
        foreach($categories as $categorie){
                $product=Product::all()->where('categorie_id',$categorie->id);
                $data['catagorie_name']=$categorie->catagorie_name;
                $data['categorie_id']=$categorie->id;
                $data['product_categorie']=$product;
                $products[]=$data;
        }
        return view('product.index',['products'=>$products,'categories'=>$categories,'productsAct'=>$productsAct]);
      }
    // return view('test',\compact('categorie'))->with('i',(request()->input('page',1)-1)*5);

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Categorie::all();
        return view('product.create',compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($inputs=$request->all());

        $request->validate(
             ['name'=>'required',
             'details'=>'required',
             'prix'=>'required',
             'categorie_id'=>'required',
             'image'=>'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048'
             ]
        );
        $inputs=$request->all();
        if($image=$request->file("image")){
        $destinationPath="images/";
        $profileImage=date("YdmHis").".".$image->getClientOriginalExtension();
        $image->move($destinationPath,$profileImage);
        $inputs['image']=$profileImage;
       }
       Product::create($inputs);
       return redirect()->route("products.create")->with('success','product store successfully');
    }   

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            ['name'=>'required',
             'details'=>'required',
            ]
        );
        $inputs=$request->all();
        if($image=$request->file("image")){ 
        $destinationPath="images/";
        $profileImage=date("YdmHis")."".$image->getClientOriginalExtension();
        $image->move($destinationPath,$profileImage);
        $inputs['image']=$profileImage;
       }
       else{
         unset($inputs['image']);
       }
       $product->update($inputs);
       return redirect()->route("products.index")->with('success','product update successfully');
    }
            
    public function destroy(Product $product){
        $product->delete();
        return redirect()->route("products.index")->with('success','product delete successfully');
    }
    public function categorie($parametre){
            $products=Product::all()->where('categorie_id',$parametre);
           $categories=Categorie::all();
            return view('product.categorie',compact('products'));
    }
}
