<?php 
namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TreatmentController extends Controller {



  static function Treatment_photo($id,$id1){
        
    try{
        $photo_id       = Photo:: where('id',$id1)->get('id'); 
        $treatment      = Treatment::find($id);
        $photo_Id       =  $photo_id;

        $treatment->photos()->attach($photo_Id);
    }catch(\Exception $e){
      return response()->json(['message'=>'an error uccored']);

    }
        return response()->json(['message'=>'photo added successfully! ']);


} 


  public function Create_Treatment(Request $request)
  {
    try{
    $validate = $request->validate([
      'name'           =>'required|string',
      'description'    =>'required',
      'self_diagnosed' =>'required',

  ]);
    $treatment = Treatment::create([
      'name'           =>$validate['name'],
      'description'    =>$validate['description'],
      'self_diagnosed' =>$validate['self_diagnosed'],
  ]);

  $photos = [];
      if ($request->hasfile('files')) {
        foreach ($request->file('files') as $file) {
          $photo           =PhotoController    ::upload($file);
          $treatment_photo =TreatmentController::Treatment_photo($treatment->id, $photo->id);
          array_push($photos, $treatment_photo);
        }
      }
}catch(\Exception $e){
    return ['message'  =>'An error accoured when create treatment !'];
}
    return $treatment;
  }
  

  public function search_by_treatment(Request $request){
    
    $search = $request->input('search');
    $test   = Treatment::where('name','LIKE','%'.$search.'%')->get();
    return response()->json($test) ;
}
  
}

?>