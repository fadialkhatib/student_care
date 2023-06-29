<?php 
namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversityController extends Controller {

  public function Add_university_to_the_app(Request $request)
  {
    try{
    $validate   = $request->validate([
      'name'    =>'required',
      'location'=>'required'
    ]);
    $add = University::create([
      'name'    =>$validate['name'],
      'location'=>$validate['location']
    ]);
  }catch(\Exception $e){
    return ['error'=>'An Error occoured when add university !'];
  }
    return ['University Added successfully!',$add];
  }

public function Edit_university_in_the_app(Request $request,$id)
{
  try{
  $edit = University::where('id',$id)->update([
    'name'            =>$request->name,
    'location'        =>$request->location
  ]);
}catch(\Exception $e){
  return ['error'=>'An Error occoured when Edit university !'];
}
  return ['University Edited successfully!',$edit];
}


  public function Delete_university_from_the_app ($id)
  {
    try{
    University::where('id',$id)->delete();
    }catch(\Exception $e){
      return ['error'=>'An Error occoured when delete university !'];
    }
    return 'University Deleted successfully!';
  }

  public function search_by_location(Request $request){


    
    $test = University:: where('location','LIKE','%'.$request->location.'%')->get();
    return response()->json($test);
}
  
}

?>