<?php 
namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subject_list;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller {

  public function student_data_entry(Request $request ,$un_id)
  {
    try{
    $validate             = $request->validate([
      'verification_card' =>'required',
      'studying_year'     =>'required'
    ]);
    $user     = Student::where('user_id',auth()->user()->id)->value('id');
    if($user){
      return ['you are already student !'];
    }
    $file     = $request->file('file');
    $photo    = PhotoController::upload($file);
    
    
     $student = Student::create([
       'user_id'          =>auth()->user()->id,
       'university_id'    =>$un_id,
       'photo_id'         =>$photo->id,
       'verification_card'=>$validate['verification_card'],
       'studying_year'    =>$validate['studying_year'],
     ]);
    
    }catch(\Exception $e){
    return ['message'=>$e->getMessage()];
    }
     return $student;
  }


  public function search_by_student_name(Request $request){
    $role = User::get('role');
    User  ::where('role', $role == 'Student')->get();
    $test =User::where('name','LIKE','%'.$request->name.'%')->get();
    return response()->json($test) ;
}
  
public function Edit_student_profile(Request $request,$us_id)
{
  $user           = User::where('id',$us_id)->update([
    'name'        =>$request->name,
    'email'       =>$request->email,
    'password'    =>bcrypt($request->password),
    'phone_number'=>$request->phone_number
  ]);
  
  $student             = Student::where('user_id',$us_id)->update([
    'university_id'    =>$request->university_id,
    'photo_id'         =>$request->photo_id,
    'verification_card'=>$request->verification_card,
    'studying_year'    =>$request->studying_year
    ]);
  return $user;$student;
}
  

function View_student_profile($us_id)
{
  $user    = User   ::where('id',$us_id)->get();
  $student = Student::where('user_id',$us_id)->get();
  return [$user , $student];
}


function Add_to_subject_list(Request $request) 
{
   $request       ->user_id;
   $request       ->subject_id;
   $student_Id    = Student::where('user_id',$request->user_id   )->get('id');
   $subject_id    = Subject::where('id'     ,$request->subject_id)->find($request->subject_id);
  
   $subject_id->student()->attach($student_Id);
   return ['added succ'];

}

function Show_subject_list(Request $request) 
{
  $student_id = Student::where('user_id',$request->user_id)->first();
  $subjects   = $student_id->subject;
  return $subjects;
 // $subjects = $student->subject()->get();
  //return $subjects;
  //dd('gh dm');
}

}

?>