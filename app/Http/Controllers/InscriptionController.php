<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class InscriptionController extends Controller
{
    public function InscriptionHome(){
        return view('inscription');
    }

    public function Connexionhome(){
        return view ('connexion');
    }

    public function profil(){
        if(session::has('id')){
            $user = Inscription::where('id', session::get('id'))->first();
            return view('profil', compact('user'));
        }
    }


    public function login(Request $request){
        $request->validate([
            'email' => "required",
            'password' => "required"
        ]);

        $user = Inscription::where('email', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->Session()->put('id', $user->id);
              return redirect('profilhome');
            }else{
               return redirect('connexion')->with('fail', "Email ou mot de passe incorrecte");
            };
        }
    }

    public function deconnexion(){
        if(session::get('id')){
            session::pull('id');
            return redirect('connexion');
        }
    }

    public function inscription(Request $request){
        $request->validate([
            'nom' => "required|max:100",
            'prenom' => "required|max:100",
            'email' => "required|email|unique:inscriptions",
            'password' => "required|min:8",
            'password1' => "required|min:8"
        ]);

        if($request->password <> $request->password1){
            return redirect('inscription')->with('fail',"Les deux mots de passe ne sont pas conformes !");
        }else{
            $user = New Inscription([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->save();

            if($user){
                return redirect('inscription')->with('success', "Inscription réussie !");
            }else{
                return redirect('inscription')->with('fail',"Quelques chose s'est mal passée !");
            }
        }    

    }
}
