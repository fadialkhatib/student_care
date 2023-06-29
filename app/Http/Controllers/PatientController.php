<?php 
namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Favorite_list;
use App\Models\Patient;
use App\Models\Patient_post_date;
use App\Models\Post;
use App\Models\Report;
use App\Models\Treatment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller {

  public function patient_data_entry(Request $request)
  {
    try{
    $validate        = $request->validate([
      'date_of_birth'=>'required',
      'location'     =>'required'
    ]);
    $user            = Patient::where('user_id',auth()->user()->id)->value('id');
    if($user){
      return ['you are already patient !'];
    }
    $patient         = Patient::create([
      'user_id'      =>auth()->user()->id,
      'date_of_birth'=>$validate['date_of_birth'],
      'location'     =>$validate['location'],
    ]);
  }catch(\Exception $e){
     return response()->json(['message'=>$e->getMessage()]);
  }
     return response()->json([$patient,'message'=>'Data Added Successfully!']);
  }
 
  public function Show_treatments()
  {
    $select   = Treatment::all();
    return $select;
  }

  public function Choose_treatment(Request $request)
  {
    try{
    $treatment_id = Treatment::get('name',$request->id);
    }catch(\Exception $e){
      return response()->json(['message'=>$e->getMessage()]);
    }
    return $treatment_id;

  }


  public function Edit_patient_profile(Request $request,$us_id)
  {
    $user   = User::where('id',$us_id)->update([
      'name'          =>$request->name,
      'email'         =>$request->email,
      'password'      =>bcrypt($request->password),
      'phone_number'  =>$request->phone_number
    ]); 
    
    $patient = Patient::where('user_id',$us_id)->update([
      'date_of_birth' =>$request->date_of_birth,
      'location'      =>$request->location
      ]);
    return [$user , $patient];
  }

public function View_patient_profile($us_id)
{
  $user              = User   ::where('id',$us_id)     ->get();
  $patient           = Patient::where('user_id',$us_id)->get();
  return [$user , $patient];
}

public function Add_to_favourite_list(Request $request) 
{
   $request->user_id;
   $request->post_id;
   $patient_Id = Patient::where('user_id',$request->user_id)->get('id');
   $post_id    = Post   ::where('id',$request->post_id)     ->find($request->post_id);
  
   $post_id->patient()->attach($patient_Id);
   return ['added successfully !'];

}

public function Show_favorite_list(Request $request) 
{
  $patient_id  = Patient::where('user_id',$request->user_id)->first();
  $posts       = $patient_id->post;
  return $posts;

}




public function Report_post(Request $request,$post_id) 
{
  $report    = Report::create([
    'report' =>$request->report
  ]);
 
  $post_Id   = Post  ::where('id',$post_id)->get('id');
  $report_id = Report::find($report->id);
  
  $report_id->posts()->attach($post_Id);
  return $report;
}


static function rating_the_post($click){
  $rate  = 3 ;
  
  if($click==1)
  {
    $rate =$rate-2;
  }elseif($click==2)
  {
    $rate -=1;
  }elseif($click==3)
  {
    $rate;
  }elseif($click==4)
  {
    $rate +=1;
  }elseif($click==5)
  {
    $rate +=2;
  }elseif($click==6)
  {
    $rate +=3;
  }
  return $rate;
}


static function date_post($post_id,$date_id)
{
  $date_Id = Date::where('id',$date_id)->get('id');
  $post    = Post::find($post_id);
  $post->dates()->attach($date_Id); 
  return response()->json(['messages']);
}

public function final_date(Request $request,$post_id)
{
  $patient_id   = Patient::where('user_id',$request->user_id)-> value('id');
  
  $post         = Post   ::find($post_id);
  $date         = Date::create([
    'date'      =>new Carbon($request->date)
  ]);
  
  $date_id      = $date->id;
  $date_post    = PatientController::date_post($post->id,$date_id);

  // تحقق مما إذا قام المريض بحجز موعد سابق على نفس البوست
$previous_bookings = Patient_post_date::where([
  'patient_id' => $patient_id,
  'post_id' => $post_id
  ])->count();
  
  // إذا تم العثور على حجوزات سابقة، فعدم السماح بحجز موعد جديد
  if ($previous_bookings > 0) {
  return ['You have already booked an appointment on this post!'];
  }
  
  $attach       = Patient_post_date::create([
    'patient_id'=>$patient_id,
    'post_id'   =>$post->id,
    'rate'      =>PatientController::rating_the_post($request->click),
    'approved'  =>$request->approved,
    'date_id'   =>$date_id
  ]);

  return ['date for you craeted in :',$date->date ] ;
}

}
?>