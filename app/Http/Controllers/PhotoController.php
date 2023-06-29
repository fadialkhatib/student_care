<?php 
namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class PhotoController extends Controller {

  static function upload($image)
{
    $filename = $image->getClientOriginalName();
    $path     = $image->storeAs('public/images', $filename);
    $path2    = Photo::create([
     'image'  =>$filename
    ]);
    return $path2;
}
  

static function show_image($filename)
{
    $path     = storage_path('app/public/images/'.$filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file     = File::get($path);
    $type     = File::mimeType($path);
    $response =  response()->file($path);
    //$response->header("Content-Type", $type);
    return $response;
}
}

?>