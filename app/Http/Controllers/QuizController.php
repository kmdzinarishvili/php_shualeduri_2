<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function quiz(){
        $user = Auth::user();
        $questions =Question::all();
//        dd($questions);
        $i=1;
        return view('quiz')->with(["questions"=>$questions,'i'=>$i]);
    }
    public function create(){
        return view('create');
    }

    public function postCreate(Request $request){
        $question= new Question();
        $request=$request->all();
        $question->text = $request["question"];
        $question ->save();
        $correctIndex = $request['correct'];
        for($i=0; $i<4; $i++){
            $currAns = new Answer();
            $currAns->text = $request["answer-".($i+1)];
            $currAns->question_id=$question->id;
            $currAns->isRight= ($i == $correctIndex);
            $currAns->save();
        }
        dd($question->answers);

        return redirect()->route("quiz");
    }
    public function postQuiz(Request $request){
        $answers = $request->except(['_token']);
        $correct = 0;
        $total = 0;
        foreach($answers as $answer){
            if (Answer::find($answer)->isRight){
                $correct++;
            }
            $total++;
        }
        $percentage = ($correct*1.0/$total)*100;
        return view('results')->with("percentage", $percentage);
    }
}
