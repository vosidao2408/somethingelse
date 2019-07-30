<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Article;

class SearchController extends Controller
{
    
      public function index()
     {
         
        return view('search');
     }
     public function search(Request $request)
     {
         if($request->ajax())
     {
     $output="";
     $articles=Article::where('address','LIKE','%'.$request->search."%")->get();
     if($articles)
     {
     foreach ($articles as $key => $article) {
     $output.='<tr>'.
     '<td>'.$article->id.'</td>'.
     '<td>'.$article->title.'</td>'.
     '<td>'.$article->address.'</td>'.
     '<td>'.$article->contact.'</td>'.
     '<td>'.$article->status.'</td>'.
     '</tr>';
     }
       }
     else if(!$articles) {
            $articles = Category::where('district','LIKE','%'.$request->search."%")->first()->articles()->get();
            if($articles){
                foreach ($articles as $key => $article) {
                    $output.='<tr>'.
                    '<td>'.$article->id.'</td>'.
                    '<td>'.$article->title.'</td>'.
                    '<td>'.$article->address.'</td>'.
                    '<td>'.$article->contact.'</td>'.
                    '<td>'.$article->status.'</td>'.
                    '</tr>';
            }
         }
         
        }
        return Response($output);
    }
}
}
