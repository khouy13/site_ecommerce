<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Commande;
use Illuminate\Support\Facades\Response;
use Validator;

class ProductController2 extends Controller
{
    public function display_image(int $id){
        $product = Product::find($id);
        $filename = public_path("images").'/'.$product['image'];
        $image=Response::download($filename);
        return $image ;

    }
   
    public function get_porducts_categorie($id){
        $products=Product::all()->where('categorie_id',$id);
        return response()->json($products->values());
    }
   
    public function index(){
          $products=Product::all();
          return $products;
    }

   public function store(Request $request){
    $inputs=$request->all();
    $roules=[
            'name'=>'required',
            'image'=>'required',
            'details'=>'required',
            'categorie_id'=>'required',
            'prix'=>'required',
    ];
    $validator=Validator::make($inputs,$roules);
    
    if($validator->fails()){
        return response()->json([
         'success'=>false,
         'message'=>'sorry not stored',
         'error'=>$validator->errors()
        ]);
    }
    if($image=$request->file('image')){
         $destinationPath="images/";
         $profileImage=date("YdmHis").".".$image->getClientOriginalExtension();
         $image->move($destinationPath,$profileImage);
         $inputs['image']=$profileImage;
    }
    $product=Product::create($inputs);
    return response()->json([
        'success'=>true,
        'message'=>'stored successfully',
        'product'=>$product
    ]);
}

public function show($id){
    
    $product=Product::find($id);
    
    if(is_null($product)){
        return response()->json([
            'success'=>false,
            'message'=>'sorry not found'
           ]);
    }
    
    return response()->json([
     'success'=>true,
     'message'=>'product found successfully',
     'product'=>$product
    ]);
}    

public function Update(Request $request,$id){
   
    $product=Product::find($id);
    $inputs=$request->all();
    $roules=[
        'name'=>'required',
        'details'=>'required',
        'categorie_id'=>'required',
        'prix'=>'required',
    ];
    
    $validator=Validator::make($inputs,$roules);
    if($validator->fails()){
        return response()->json([
         'success'=>false,
         'message'=>'sorry not stored',
         'error'=>$validator->errors()
        ]);
     }
     
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
      return response()->json([
        'success'=>true,
        'message'=>'stored successfully',
        'product'=>$product
    ]);
}
public function destroy(Product $product){
    $product->delete();
    return response()->json([
     'success'=>true,
     'message'=>'product delete successfully',
     'product'=>$product
    ]);
}
 public function getStatistique(){
    
 $user=User::count();
 $product=Product::count();
 $commande=Commande::count();
 $categorie=Categorie::count();
   
 $data=[
   'users'=>$user,
   'products'=>$product,
   'commandes'=>$commande,
   'categories'=>$categorie,
  ];

 return $data;          
}

}
