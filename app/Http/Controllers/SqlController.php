<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormValidateRequest;
use App\Tags;
use Illuminate\Support\Facades\DB;


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

    public function setSiteText (Request $request) {
        // есть ли такая запись в базе
        $result = DB::table('textdata')->where('code', $request->code)->update(['text' => $request->text]);
        if ($result == 0) DB::table('textdata')->insert(['code'=>$request->code, 'text' => $request->text]);
        return redirect()->back();
    }

}
