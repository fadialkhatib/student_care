<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Post_photo;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

  static function Post_photo($id, $id1)
  {

    try {
      $photo_id   = Photo::where('id', $id1)->get('id');
      $post       = Post::find($id);
      $photo_Id   =  $photo_id;

      $post->photos()->attach($photo_Id);
    } catch (\Exception $e) {
      return response()->json(['message' => $e->getMessage()]);
    }
    return response()->json(['message' => 'photo added successfully! ']);
  }



  public function Add_post(Request $request)
  {
    try {
      $validate        = $request->validate([
        'description'  => 'required',

      ]);
      $add = Post::create([
        'student_id'   => $request->student_id,
        'description'  => $validate['description'],
        'treatment_id' => $request->treatment_id,
      ]);

      $photos = [];
      if ($request       ->hasfile('files')) {
        foreach ($request->file('files') as $file) {
          $photo      = PhotoController::upload($file);
          $post_photo =  PostController::Post_photo($add->id, $photo->id);
          array_push($photos, $post_photo);
        }
      }
    } catch (\Exception $e) {
      //$kh =$this->Post_photo($add->id,$ph_id);
      return ['error' => $e->getMessage()];
    }
    return response()->json(['post' => $add]); //$kh ;
  }




  public function Show_posts_details($id)
  {
    $show = Post::where('id', $id)->get();
    return ['Details', $show];
  }




  public function Edit_post(Request $request, $id)
  {
    try {
      $request         ->validate([
        'description'  => 'required',
        'treatment_id' => 'required',
      ]);
      Post::where('id', $id)->update([
        'description'  => $request->description,
        'treatment_id' => $request->treatment_id
      ]);
    } catch (\Exception $e) {
      return ['error'  => $e->getMessage()];
    }

    return 'Post updated successfully';
  }

  public function Delete_post($id)
  {
    try {
      $delete = Post::where('id', $id)->delete();
    } catch (\Exception $e) {
      return ['error' => $e->getMessage()];
    }
    return ['Post Deleted successfully'];
  }

  public function Show_posts()
  {
    $show = Post::all();
    return $show;
  }
}
