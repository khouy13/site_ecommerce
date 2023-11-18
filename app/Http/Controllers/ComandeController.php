<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\Categorie;


class ComandeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        // ->except(['store','delete','diminuer','update']);
      }
    public function index()
    {
            return view('demande.commande');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate(
           [
                 'payment'=>'required',
                 'livraison'=>'required', 
                 'user_address'=>'required', 
                 'user_phone'=>'required', 
           ]
        );
        $data=[
           'user_id'=>Auth::user()->id,
           'livraison'=>$request->livraison,
           'payment'=>$request->payment,
           'statut'=>1,
           'total'=>session()->get("total")
        ];
        Commande::create($data);
        $latestEnregistrement=Commande::latest()->first();
        $id=$latestEnregistrement->id;
        return redirect()->route('details.enregistrer',$id);
    }
    /**
     * Display the specified resource.
     */
    public function show(Comande $comande)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comande $comande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comande $comande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comande $comande)
    {
        //
    }
}
