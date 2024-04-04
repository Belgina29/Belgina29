<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function panier(){
        $products=session()->get("panier");
        return view("website.panier",compact ("products"));
    }

    public function delprodpanier($indice){
        $products=session()->get("panier");
        dd($products);
        unset( $products[$indice]);
        session()->put("panier",$products);
        return redirect()->back();
    }

    public function viderpanier(){
        session()->put("panier",[]);
        return redirect()->back();
    }
    public function addToCart(Request $request){
        $id=$request->id;
        $name=$request->name;
        $photo1=$request->photo1;
        $price=$request->price;
        $qty=$request->qty;

        if (!session()->has("panier")){
            session()->put('panier',[]);
        }
        session()->push('panier',["id"=>$id,"name"=>$name,"photo1"=>$photo1,"price"=>$price,"qty"=>$qty]);
        return redirect()->back()->with('succèss',"Un nouveau produit est ajoutée dans votre panier");
    }
}
