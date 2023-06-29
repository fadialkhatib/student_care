<?php 
namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller {

  public function Add_subject_to_the_app(Request $request,$tr_id)
  {
    try{
    $validate = $request->validate([
      'name'  =>'required',
      'year'  =>'required'
    ]);
    $add            = Subject::create([
      'treatment_id'=>$tr_id,
      'name'        =>$validate['name'],
      'year'        =>$validate['year']
    ]);
  }catch(\Exception $e){
    return ['error'=>'An Error occoured when add subject !'];
  }
    return ['subject Added successfully!',$add];
  }

public function Edit_subject_in_the_app(Request $request,$id)
{
  try{
  $edit = Subject::where('id',$id)->update([
    'treatment_id'=>$request->treatment_id,
    'name'        =>$request->name,
    'year'        =>$request->year
  ]);
}catch(\Exception $e){
  return ['error'=>'An Error occoured when Edite subject !'];
}
  return ['Subject Edited successfully!',$edit];
}


  public function Delete_subject_from_the_app ($id)
  {
    try{
    Subject::where('id',$id)->delete();
    }catch(\Exception $e){
      return ['error'=>'An Error occoured when delete subject !'];
    }
    return 'Subject Deleted successfully!';
  }
}

?>