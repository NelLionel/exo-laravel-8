<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Artist;
use App\Models\Tag;
use App\Models\ArticleTag;


class ArticleController extends Controller
{
    //methode pour afficher la liste des articles
    public function index(Request $request){
        $article = Article::paginate(2);
        return view('blog', compact("article"));
    }

    //methode pour afficher les details d'un article
    public function show($idblog){
        $detailsblog = Article::find($idblog);
        //dd($detailsblog->image->path);
        return view('showarticle', compact("detailsblog"));
    }
    
     //Methode pour afficher la page d'ajout des articles

     public function showstore(){

        return view('store');
     }

    //methode pour afficher la page de modification
    public function showupdate($idblog){
        $detailsdonnes = Article::find($idblog);
        return view('update', compact("detailsdonnes"));
    }

    //public function image(){
        //return $this->hasOne(Image::class);
    //}

    //methode pour ajouter un article 
    public function store(Request $request){
        //Validation des données
        $request->validate([
            'titre' => "required|max:100",
            'description' => "required"
        ]);

        $filename = time() . '.' .$request->photo->extension();
        //dd($filename);
        $path = $request->file('photo')->storeAs(
        'maphotodeprofil', 
        $filename,
        'public'
        );


        $donnees = new Article([
            'titre' => $request->titre,
            'description' => $request->description
        ]);

        $donnees->save();

        $image = new Image();
        $image->path = $path;

        //$image->article_id =$donnees->id;
        //$image->save();

        $donnees->image()->save($image);


        if($donnees){
            return redirect('/blog')->with("success", "Article ajouter avec success !");
        }else{
            return redirect('/blog/store')->with("fail", "Ajout d'article échoué");
        }

    }


    //methode de modification d'un article
    public function update(Request $request, $idblog){
        $request->validate([
            'titre'=>'required|max:100',
            'description'=>'required'
        ]);

        //recupération des deatails de l'article en question
        $updateArticle = Article::find($idblog);

        $updateArticle->titre = $request->titre;
        $updateArticle->description = $request->description;

        $updateArticle->update();

        if($updateArticle){
            return redirect('/blog')->with("succes", "Article modifié avec succes !");
        }else{
            return redirect('/blog')->with("fail", "Modification échouée !");
        }

    }

    public function addcomment(Request $request, $idblog){
        $donneescomments = new Comment([
            'content' => $request->commentaire,
            'article_id' => $idblog
        ]);

        $donneescomments->save();

        if($donneescomments){
            return redirect('/blog')->with("succes", "Commentaire ajouter avec succes !");
        }else{
            return redirect('/blog')->with("fail", "Modification échouée !");
        }

    }


    public function delete($idblog){
        $deleteArticle = Article::find($idblog);
        $deleteArticle->delete();

        if($deleteArticle){
            return redirect('/blog')->with("success", "Article supprimé avec succes !");
        }
    }
}
