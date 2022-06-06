<?php

namespace App\Http\Controllers;
use App\Models\Questionnaire;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question;

        $question->name = $request->name;
        $question->questionnaire_id = $request->questionnaire_id;

        $bonneRep = 0;
        foreach($request->rep as $key => $rep) {
            if($rep != "") {
                if(isset($request->val[$key])) {
                    $reps[$rep] = true;
                    $bonneRep++;
                } else {
                    $reps[$rep] = false;
                }
            }
        }
        if ($bonneRep > 0) {
            $question->reponses = json_encode($reps);
            $question->save();
        }

        return redirect()
            ->action([QuestionnaireController::class, 'show'], ['id' => $question->questionnaire_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        if($question->questionnaire_id == $request->questionnaire_id) {
            $bonneRep = 0;
            $nbRep = 0;
            foreach($request->rep as $key => $rep) {
                if($rep != "") {
                    if(isset($request->val[$key])) {
                        $reps[$rep] = true;
                        $bonneRep++;
                    } else {
                        $reps[$rep] = false;
                    }
                    $nbRep++;
                }
            }
            if ($bonneRep > 0 && $nbRep > 1) {
                $question->reponses = json_encode($reps);
                $question->save();
            }
        }
        return redirect()
            ->action([QuestionnaireController::class, 'show'], ['id' => $question->questionnaire_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($q_id, $id)
    {
        $question = Question::find($id);
        $questionnaire = Questionnaire::find($q_id);
        if(isset($question)) {
            if($question->questionnaire_id == $q_id) {
                $question->delete();
            }
        }
        return redirect()
            ->action([QuestionnaireController::class, 'show'], ['id' => $q_id]);
    }
}
