<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectValidateRequest;
use Illuminate\Support\Str;
use App\Portfolio;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class UploadController extends Controller
{
    function resize($original_file, $folder)
    {
        $newImage = Image::make($original_file);

        $height = $newImage->height();
        $width = $newImage->width();

        if ($height > $width) {
            // резайз по width
            if ($width > 1200) {
                $newImage->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        } else {
            // резайз по high
            if ($height > 1200) {
                $newImage->resize(null, 1200, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        }

        $newImage->sharpen(3);
        Storage::disk('local')->makeDirectory('public/uploads/'.$folder);            
        $newImage->save('storage/uploads/' . $folder . '/' . $original_file->getClientOriginalName());
        
        return ('uploads/' . $folder . '/' . $original_file->getClientOriginalName());
    }

    public function newprojectupload(ProjectValidateRequest $request)
    {
        

        $files =  $request->file('image');
        $title_file = $request->file('title-image');

        $folder = Str::random(10);

        foreach ($files as $file) {
            $path[] = $this->resize($file, $folder);
            // $path[] = $file->store('uploads/' . $folder, 'public');
        }
        $path_title = $this->resize($title_file, $folder);
        // $path_title = $title_file->store('uploads/' . $folder, 'public');


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

    public function updateproject(Request $request)
    {
        $portfolio = Portfolio::find($request->id);
        $folder = $portfolio->code;
        // dd ($folder);

        $files =  $request->file('image');
        if (isset($files)) {

            foreach ($files as $file) {
                $path[] = $this->resize($file, $folder);
                // $path[] = $file->store('uploads/' . $folder, 'public');
            }
            $old_paths = json_decode($portfolio->images);
            if (count($old_paths) > 0) array_push($path, $old_paths);
            // dd ($path);
            $portfolio->images = json_encode($path);
        }

        $title_file = $request->file('title-image');
        if (isset($title_file)) {
            // dd ($title_file);
            // $path_title = $title_file->store('uploads/' . $folder, 'public');
            $path_title = $this->resize($title_file, $folder);
            $portfolio->title_image = $path_title;
        }


        $portfolio->title = $request->input('title');
        $portfolio->description = $request->input('description');
        $portfolio->tags = $request->input('tags');
        $portfolio->sort = $request->input('sort');

        $portfolio->save();
        return redirect()->route('editportfolio');
        // return redirect()->route('admin-portfolios', ['id'=>$portfolio->id]);
    }

    public static function getPortfolios()
    {
        $tags = Portfolio::all();
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

    public static function getOneProject($id)
    {
        $portfolio_data = Portfolio::find($id);
        return $portfolio_data;
    }

    public function getonePortfolio($id)
    {

        $portfolio_data = Portfolio::find($id);
        // dd ($id);
        return view('project', ['data' => $portfolio_data]);
        // return redirect()->route('oneportfolio', ['data'=>$portfolio_data]);
    }

    public function deleteportfolio($id)
    {

        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        Storage::disk('public')->deleteDirectory('uploads/' . $portfolio->code);
        // return view('admin/editportfolio');
        return redirect()->route('editportfolio');
    }

    public static function changepicture(Request $request)
    {
        $project = Portfolio::find($request->id);
        $images = json_decode($project->images);
        $key = array_search($request->file, $images);

        if ($request->direction == 0) {
            Storage::disk('public')->delete($request->file);
            unset($images[$key]);
            sort($images);
            // dd($images);
            // return true;
        } else {
            $new_key = $key + $request->direction;
            if ($new_key >= 0 && $new_key < count($images)) {
                list($images[$key], $images[$new_key]) = array($images[$new_key], $images[$key]);
                // array_swap($images, $key, $new_key);
                // echo $new_key;
            }
        }
        $project->images = json_encode($images);
        $project->save();
        return view('admin/editoneproject', ['id' => $request->id]);
        // dd($images);

        // return $portfolio_data;
    }
}
