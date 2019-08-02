<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Http\Response;
use App\Category;
use SebastianBergmann\Environment\Console;

class PaginationController extends Controller
{
    function index()
    {
     $data = Article::orderBy('id','asc')->paginate(10);
     return view('pagination', compact('data'));
    }

    function fetch_data(Request $request)
    {
        if($request->ajax())
        {
               $query = $request->get('query');
               if($query == ''){
                $data = Article::orderBy('id','asc')->paginate(10);
               }
               else{
      
                $articles = $data = Article::where('title', 'like', '%'.$query.'%')
                ->orWhere('address', 'like', '%'.$query.'%')
                ->orderBy('id','asc')
                ->paginate(10);

                if($articles->toArray() == ''){
                    $data = Category::where('district','like','%'.$query.'%')->first();
                    //->articles()->paginate(10);
                }
               }
               dd($data);
         return view('pagination_data', compact('data'))->render();
         
        }
       }
}
