<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Article;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    
      public function index()
        {
            return view('search');
        }
     public function search(Request $request)
        {
            if($request->ajax()){
                $output = '';
                $query = $request->get('query');
                if($query != ''){
                    $data = Article::where('address','like','%'.$query.'%')
                    ->orderBy('id','asc')
                    ->get();

                //    $articles = $data->first()->toArray(); 
                }
                // else if ($query != '' && $articles == ''){
                //   $data = Category::where('district','like','%'.$query.'%')
                //     ->first()
                //     ->articles()
                //     ->get();
                // }
                else{
                      $data = Article::orderBy('id','asc')->get();
                    }
                $total_row = $data->count();
                if($total_row > 0){
                    foreach ($data as $row)
                    {
                        $output .= '
                        <tr>
                         <td>'.$row->id.'</td>
                         <td>'.$row->title.'</td>
                         <td>'.$row->address.'</td>
                         <td>'.$row->contact.'</td>
                         <td>'.$row->status.'</td>
                        </tr>
                        ';
                    }
                }
            else {
                    $output = '
                     <tr>
                         <td align="center" colspan="5">No Data Found</td>
                     </tr>
                    ';
                }
                
                $data = array(
                    'table_data'  => $output,
                    'total_data'  => $total_row
                   );  
                return Response()->json($data);
            }
        }
}
