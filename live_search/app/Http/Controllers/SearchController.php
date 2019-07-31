<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    public function index(){
        return view('search');
    }
    public function search(Request $request){
        if($request->ajax())
        {
            $query = $request->get('query');
            if($query != ''){
                $articles = Article::where('address','like','%'.$query.'%')->paginate('10');
            }
            else{
                $articles = Article::paginate('10');
            }
            $total_data = $data->count();
        }
        else 
        $data = array([
            'data' => $articles,
            'total' => $total_data
        ]);
            dd(Response($data));
        
}
}