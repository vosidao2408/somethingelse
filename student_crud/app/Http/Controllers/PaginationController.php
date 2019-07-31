<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Http\Response;

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
               if($query != ''){
                $data = Article::where('id', 'like', '%'.$query.'%')
                ->orWhere('address', 'like', '%'.$query.'%')
                ->orderBy('id','asc')
                ->paginate(10);
               }
               else{
                   $data = Article::orderBy('id','asc')->paginate(10);
               }
         
         return view('pagination_data', compact('data'))->render();
         
        }
       }
}
