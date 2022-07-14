<?php

namespace App\Http\Controllers;
use App\Models\Questionnaire;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                $question->name = $request->name;
                $question->reponses = json_encode($reps);
                $question->save();
            }
        }
        return redirect()
            ->action([QuestionnaireController::class, 'show'], ['id' => $question->questionnaire_id]);
    }

    /**
     * Check the answers to the test
     *
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     */
    public function answer(Request $request, $id) {
        $questionnaire = Questionnaire::find($id);
        $resultat = 0;
        foreach($questionnaire->questions as $question) {
            $note = 0;
            $goodReps = 0;
            $reponses = json_decode($question->reponses,true);
            foreach($reponses as $reponse => $bool) {
                // e_rep = une réponse d'un élève
                // reponse = une réponse du questionnaire
                // on compare les deux pour compter les points
                if($bool) {$goodReps += 1;}
                $e_rep = $question->id.'-'.str_replace(' ', '', $reponse);
                if($bool && $request->$e_rep == "on")  {
                    $note += 1;
                } else if (!$bool && $request->$e_rep == "on") {
                    $note -= 1;
                }
            }
            if($note < 0) {
                $note = 0;
            }
            $resultat += $note/$goodReps;
        }
        $resultat = $resultat/count($questionnaire->questions);
        Auth::user()->questionnaires()->updateExistingPivot($questionnaire->id, ['resultat' => $resultat]);
        return redirect()
            ->action([QuestionnaireController::class, 'index']);
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


