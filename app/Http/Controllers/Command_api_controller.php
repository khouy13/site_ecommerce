<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;
use Illuminate\Support\Facades\Response;
class Command_api_controller extends Controller
{
    public function getCommandes(){
        $comandes=Commande::all();
        $table=[];
        foreach($comandes as $comande){
              if($comande['livraison']==2){
                $livraisn='express 200DH';
              }
              else{
                $livraisn='standard 99DH';
              }
              if($comande['payment']==2){
                $payment='par carte';
              }else{
                $payment='en cache';
              }
              if($comande['statut']==2){
                $statut='traiter';
              }else{
                $statut='en attent';
              }
              $data=[
                 'id'=>$comande['id'],
                 'user_id'=>$comande['user_id'],
                 'total'=>$comande['total'],
                 'created_at'=>$comande['created_at'],
                 'livraison'=>$livraisn,
                 'payment'=>$payment,  
                 'statut'=>$statut
                ]; 
                $table[]=$data;
        }
        return $table;
    }
    public function deleteCommand($id){
         $commande=Commande::find($id);
         $commande->delete();         
    }
    public function UpdateCommand(Request $request,$id){

      $commande=Commande::find($id);
      $commande->statut=$request->statut;
      $commande->save();          
    
    }
}
