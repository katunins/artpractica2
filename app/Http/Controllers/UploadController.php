<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ProjectValidateRequest;
use Illuminate\Support\Str;
use App\Portfolio;

class UploadController extends Controller
{
    public function newprojectupload(ProjectValidateRequest $request){
        
        // dd ($request);

        $files =  $request->file('image');
        $title_file = $request->file('title-image');

        $folder=Str::random(10);

        foreach ($files as $file) {
            $path[] = $file->store('uploads/'.$folder, 'public');
        }
        
        $path_title = $title_file->store('uploads/'.$folder, 'public');


        $portfolio = new Portfolio();
        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');
        $portfolio->code = $folder;
        $portfolio->tags = $request->input('tags');
        $portfolio->title_image = $path_title;
        $portfolio->sort = $request->input('sort');
        $portfolio->images = json_encode($path);
        
        $portfolio->save();
        return redirect()->route('editportfolio');
        // return redirect()->route('admin-portfolios', ['id'=>$portfolio->id]);
    }

    public static function getPortfolios(){
        $tags= Portfolio::all();
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

    public function getonePortfolio ($id) {
        
        $portfolio_data = Portfolio::find($id);
        // dd ($id);
        return view('project', ['data'=>$portfolio_data]);
        // return redirect()->route('oneportfolio', ['data'=>$portfolio_data]);
    }
}
