<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormValidateRequest;
use App\Tags;


class SqlController extends Controller
{
    public function newtag(FormValidateRequest $req)
    {
        
        $tags= new Tags();
        $tags->name=$req->input('name');
        $tags->code=$req->input('code');
        $tags->sort=$req->input('sort');
        $tags->save();

        return redirect()->route('taglist');
    }

    
    public function updatetagsubmit($id, Request $req)
    {
        
        $tags= Tags::find($id);
        $tags->name=$req->input('name');
        $tags->code=$req->input('code');
        $tags->sort=$req->input('sort');
        $tags->save();

        return redirect()->route('taglist');
    }

    public static function gettag(){
        $tags= Tags::all();
        $sort = $tags->sort(function ($a, $b) {
            $a = $a->sort;
            $b = $b->sort;
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        });
        return $sort;
    }

    public function tagremove($id){
        Tags::find($id)->delete();
        return redirect()->route('taglist');
    }

    public function updatetag($id){
        $tag = Tags::find($id);
        return view('admin/updatetag', ['data'=>$tag]);
    }
}
