<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\infocontact;

class ContactController extends Controller
{
    //methode pour afficher la page contact
    public function showcontact(){
        return view('contact');
    }

    //methose d'ajout contact
    public function addcontact(Request $request){
        $request->validate([
            'email'=> "required|max:50",
            'message'=> "required"
        ]);

        $donnes = new Contact ([
            'email' => $request->email,
            'message' => $request->message
        ]);
        $donnes->save();
        $data = [
            'email' => $request->email,
            'message' => $request->message
        ];
        $user = "kpatoukpaelvis@gmail.com";

        Mail::to($user)
        ->bcc("strongadd12@gmail.com")
        ->queue(new infocontact($data));

        if($donnes){
            return redirect('/contact')->with("succes", "Message envoyé avec succes !");
        }else{
            return redirect('/contact')->with("fail", "échec !");
        }

    }

    public function contactlist(){
        $contact = Contact::All();
        return view('lescontacts', compact('contact'));
    }

    public function dedailcontact($idcontact){
        $detailscontact = Contact::find($idcontact);
        return view('details', compact("detailscontact"));

    }

    public function deletecontact($idc){
        $deletearticle = Contact::find($idc);
        $deletearticle->delete();
    }
}
