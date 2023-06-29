<?php 
namespace App\Http\Controllers;

use App\Http\Middleware\Blacklist;
use App\Models\Black_list;
use App\Models\Post;
use App\Models\Report;
use App\Models\Report_post;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller {



  public function Register(Request $request)
{
  try{
        $validate = $request->validate([
            'name'         => 'required|string',
            'email'        => 'required|string|unique:users,email',
            'password'     => 'required|between:8,16',
            'phone_number' => 'string|size:10',
            'role'         => 'string',
        ]);

        $user = User::create([
            'name'         => $validate['name'],
            'email'        => $validate['email'],
            'password'     => bcrypt($validate['password']),
            'phone_number' => $validate['phone_number'],
            'role'         => $validate['role'],
        ]);

        $token = $user->createToken('mytoken@FO123')->accessToken;

        $response = [
            'User Details :' => $user,
            'The Token'      => $token,
        ];
    }catch(\Exception $e){
        return response()->json(['message'=>$e->getMessage()]);
      }
        return $response;     
}

public function Login(Request $request)
{
  try{
  $validate = $request->validate([
    'email'    =>'required|string',
    'password' =>'required|between:8,16'
  ]);

  //Check Email
  $user = User::where('email',$validate['email'])->first();
  
  if(!$user){
    return response()->json(['message'=>'User Email not found! ']);
  }
  //Check Pass
  if(!Hash::check($validate['password'], $user->password)){
    return response()->json(['message'=>'Password incorrect!']);
  }
  $token    = $user->createToken('mytoken@FO123')->accessToken;
  $response = [
    'User Details'=>$user,
    'The Token'   =>$token
  ];
  }catch(\Exception $e){
    return response()->json(['message'=>'an error uccured in login!']);
  }
    return $response;
}


public function Logout(Request $request)
{
  try{
  auth()->user()->tokens()->delete();
  }catch(\Exception $e){
    return response()->json(['message'=>'an error uccored in logout!']);
  }
  return [
    'message'=>'Logged out !'
  ];
}




public function Edit_user_profile(Request $request,$us_id)
{
  $user   = User::where('id',$us_id)->update([
    'name'        =>$request->name,
    'email'       =>$request->email,
    'password'    =>$request->password,
    'phone_number'=>$request->phone_number
  ]);
  
  $student = Student::where('user_id',$us_id)->update([
    'university_id'    =>$request->university_id,
    'photo_id'         =>$request->photo_id,
    'verification_card'=>$request->verification_card,
    'studying_year'    =>$request->studying_year
    ]);
  return $user;$student;
}






static function add_to_black_list($post_id)
{
  $count_of_reports = Report_post::where([
    'post_id'  =>$post_id,
  ])->count('post_id');
  
  if($count_of_reports >= 3)
  {
    $student_id = Post::where('id',$post_id)->value('student_id');
    
    $user = Student::where('id',$student_id)->value('user_id');
    

    $black=Black_list::create([
      'user_id'=>$user
    ]);
    return ['this user',$user,'get to black list !'];
  }

}




public function block_account(Request $request) 
{
  if ($request->email ) {
    $blacklist = Black_list::where('user_id',auth()->user()->id )->first();
    if ($blacklist) {
      auth()->user()->tokens()->delete();
      return response()->json(['message' => 'Your account has been blacklisted.'], Response::HTTP_FORBIDDEN);
  } else {
      return response()->json(['message' => 'Your account is not blacklisted.'], Response::HTTP_OK);
  }
} 
}
}
?>