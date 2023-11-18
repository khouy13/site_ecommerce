<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

use Validator;
class CategorieController extends Controller
{

    public function categorie(){
                   
    $categories=Categorie::all();
         return response()->json($categories);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs=$request->all();
        $roules=[
                'catagorie_name'=>'required',
        ];
        $validator=Validator::make($inputs,$roules);
        
        if($validator->fails()){
            return response()->json([
             'success'=>false,
             'message'=>'sorry not stored',
             'error'=>$validator->errors()
            ]);
        }
        $cat=Categorie::create($inputs);
        return response()->json([
            'success'=>true,
            'message'=>'stored successfully',
            'categorie'=>$cat
        ]);

     }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function Update(Request $request,$id)
    {        
            $categorie=Categorie::find($id); 
            $inputs=$request->all();
             $roules=[
                'catagorie_name'=>'required'
             ];
             $validator=Validator::make($inputs,$roules);
             if($validator->fails()){
                return response()->json([
                 'success'=>false,
                 'message'=>'sorry categorie not updated ',
                 'error'=>$validator->errors()
                ]);
            }
            $categorie->update($inputs);
            return response()->json([
                'success'=>true,
                'message'=>'updated successfully',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return response()->json(['message'=>'categorie deleted successfully']);
    
    }
}
