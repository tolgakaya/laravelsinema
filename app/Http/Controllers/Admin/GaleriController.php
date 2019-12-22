<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 01/11/2016
 * Time: 21:00
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Support\Facades\Input;

class GaleriController extends Controller
{
    public function index($movie_id)
    {

        $medias = Media::where('movie_id', $movie_id)->get();
        return view('admin.filims.galeris', ['medias' => $medias, 'movie_id' => $movie_id]);
    }

    public function form($movie_id)
    {
        return view('admin.filims.upload')->with('movie_id', $movie_id);
    }

    public function upload($movie_id)
    {
        $rules = array(

            'adi' => 'required|image'

        );

        $validator = \Validator::make(Input::all(), $rules);
        $validator->sometimes('url', 'required|max:255', function($input) {
            return $input->tumb == 'on';
        });

        if ($validator->fails()) {

            return \Redirect::route('galeriform', array('movie_id' => $movie_id))
                ->withErrors($validator)
                ->withInput();
        }

        $file = Input::file('adi');
        $random_name = str_random(8);
        $destinationPath = 'medias/movie/';
        $extension = $file->getClientOriginalExtension();
        $filename = $random_name . '_album_image.'.$extension;
        $uploadSuccess = Input::file('adi')->move($destinationPath, $filename);
        $gelenler = array(
            'poster' => Input::get('poster') ? 1 : 0,
            'tek' => Input::get('tek') ? 1 : 0,
            'galeri' => Input::get('galeri') ? 1 : 0,
            'video' => Input::get('tumb') ? 1 : 0,
            'url' => Input::get('tumb') ? Input::get('url') : 0,
            'adi' => $filename,
            'movie_id' => $movie_id,
            'uzanti' => $extension);

        //return $gelenler;
        Media::create($gelenler);


       return \Redirect::route('galeri', ['movie_id' => $movie_id]);

    }

    public function update($media_id)
    {
        $media=Media::find($media_id);
        if (is_null($media))
        {
            return \Redirect::route('galeri',['movie_id', $media->movie_id])->with(['mesaj'=>'Resim bulunamadı']);
        }
        $gelenler = array(
            'poster' => Input::get('poster') ? 1 : 0,
            'tek' => Input::get('tek') ? 1 : 0,
            'galeri' => Input::get('galeri') ? 1 : 0,
        );
        $media->update($gelenler);


        return \Redirect::route('galeri',['movie_id'=> $media->movie_id]);
    }
}