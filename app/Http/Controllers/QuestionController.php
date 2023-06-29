<?php 
namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller {

public function Create_question(Request $request)
{
  try {
  $validate = $request->validate([
      'question'   =>'required|string'
  ]);
  $question = Question::create([
      'question'   =>$validate['question']
  ]);
} catch (\Exception $e) {
  return ['message'=>'An error accoured when create question !'];
}
  return $question;
}
  
}

?>