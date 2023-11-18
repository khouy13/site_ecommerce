<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Http\Models\Comande;
use App\Http\Models\User;

class SessionController extends Controller
{
      // public function __construct(){
      //   $this->middleware('auth')->except(['store','delete','diminuer','update']);
      // }
      public function total(){
        $total=0;
        $demandes=session()->get('demandes');
        $i=0;
        foreach($demandes as $demande){
           $total+=$demande['produit_quantite']*$demande['produit_prix'];
           $i+=1;
        }
         session()->put('nbr_produit',$i);
         session()->put('total',$total);
        }

      public function store(Request $request){

             $request->validate(
               [
                'quantite'=>'required'
               ]
             );

             $data=[
                'produit_name'=>$request->name,
                'produit_image'=>$request->image,
                'produit_id'=>$request->id,
                'produit_prix'=>$request->prix,
                'produit_details'=>$request->details,
                'produit_quantite'=>$request->quantite,
                'produit_categorie'=>$request->categorie_id
               ];   

               if(!session()->has('demandes')){
                   $demandes=[];
                   $demandes[]=$data;
                   session()->put('demandes',$demandes);
                  $this->total();
               }
               else{
                   $demandes=session()->get('demandes');
                   foreach($demandes as $i=>$item){
                      if($item['produit_id']==$data['produit_id']){
                        $item['produit_quantite']+=$data['produit_quantite'];
                        $demandes[$i]=$item;
                        session()->put('demandes',$demandes);
                        $this->total();
                        return view('demande.card');              
                       } 
                   }
                   $demandes[]=$data;
                   session()->put('demandes',$demandes);
                   $this->total();
               }
               return view('demande.card');              
           }
           public function edit($parametre) {
            if($data=session()->get('demandes')){
                foreach($data as $i=>$item){
                   if($item['produit_id']==$parametre){
                   return view('demande.edit',compact('item'));   
                   }
                }
           }

           }
           public function diminuer($parametre){
           
            if($data=session()->get('demandes')){
                 foreach($data as $i=>$item){
                    if($item['produit_id']==$parametre){
                        unset($data[$i]);
                        $total=session()->get("nbr_produit");
                        $total-=1;
                        session()->put('nbr_produit',$total);
                        session()->put('demandes',$data);
                        $this->total();
                        return view('demande.card',);
                    }
                 }
            }
           }
           public function update(Request $request,$parametre){
            $request->validate(
                [
                 'quantite'=>'required'
                ]
            );
            if($data=session()->get('demandes')){
                foreach($data as $i=>$item){
                   if($item['produit_id']==$parametre){
                       $item['produit_quantite']=$request->quantite;
                       $data[$i]=$item;
                       session()->put('demandes',$data);
                       $this->total();
                       return view('demande.card');
                   }
                }
           }
        
           }
          
}
