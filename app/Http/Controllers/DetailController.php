<?php

namespace App\Http\Controllers;
use App\Models\Detail;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DetailController extends Controller
{
    public function enregistrer($parametre){
        $demandes=session()->get('demandes');   
        $id=(integer)$parametre; 
        foreach($demandes as $demande){
            $data=[
                'commande_id'=> $id,
                'product_id'=> $demande['produit_id'],
                'quantite'=> $demande['produit_quantite'],
                'total'=> $demande['produit_quantite']*$demande['produit_prix'],
                'categorie_id'=>$demande['produit_categorie']
            ];
            Detail::create($data);
        }
        session()->forget('demandes');
        session()->forget('total');
        session()->forget('nbr_produit');
        return view('demande.valide');
    }
 
    public function getDetails($id){
        $details=Detail::all()->where('commande_id',$id);
        $table=[];
        foreach($details as $detail){
           $product=Product::find($detail['product_id']);
           $data=[
              'id'=>$detail['product_id'],
              'quantite'=>$detail['quantite'],
              'total'=>$detail['total'],
              'name'=>$product->name
           ];
           $table[]=$data;
        }
        return $table;
    }

    public function  getNombreDeProduitParCategorie(){
        $categories=Categorie::all();
        $table=[];
        foreach($categories as $categorie){
            $product=Detail::all()->where('categorie_id',$categorie['id']);
            $data=0;
            $quantite=0;
            foreach($product->values() as $item){
               $data+=$item['total'];
               $quantite+=$item['quantite'];
            }
            $tab=[
             'name'=>$categorie['catagorie_name'],
             'chifreAfaire'=>$data,
             'quantite'=>$quantite
            ];
          $table[]=$tab;
        }
          return $table;
    }
}
