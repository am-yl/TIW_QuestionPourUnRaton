<?php

namespace App\Http\Controllers;
use App\Models\Questionnaire;
use App\Models\Question;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Questionnaire::All();
        return view('questionnaires', [
            'questionnaires' => $questionnaires,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes = Groupe::All();
        return view('questionnaireform', [
            'groupes' => $groupes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questionnaire = new Questionnaire;
        $questionnaire->name = $request->name;
        $questionnaire->description = $request->description;
        $questionnaire->save();

        if(isset($request->groupe_id)) {
            foreach($request->groupe_id as $groupe_id) {
                $groupe = Groupe::find($groupe_id);
                $questionnaire->groupes()->save($groupe);
            }
        }

        return redirect('questionnaires');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $question_id = 0)
    {
        $questionnaire = Questionnaire::find($id);
        $question = Question::find($question_id);
        if (isset($question)) {
            return view('questionnaire', [
                'questionnaire' => $questionnaire,
                'question' => $question,
            ]);
        }
        return view('questionnaire', [
            'questionnaire' => $questionnaire,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::find($id);
        $groupes = Groupe::All();
        if(isset($questionnaire)) {
            return view('questionnaireform', [
                'questionnaire' => $questionnaire,
                'groupes' => $groupes,
            ]);
        } else {
            return view('questionnaires');
        }
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
        $questionnaire = Questionnaire::find($id);
        $questionnaire->name = $request->name;
        $questionnaire->description = $request->description;
        $questionnaire->save();

        if(isset($request->groupe_id)) {
            foreach ($request->groupe_id as $groupe_id) {
                $set = $questionnaire->groupes()->where('groupe_id', $groupe_id)->get();
                if(count($set) == 0) {
                    $groupe = Groupe::find($groupe_id);
                    $questionnaire->groupes()->save($groupe);
                }
            }
        }
        return redirect('questionnaires');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionnaire = Questionnaire::find($id);
        if(isset($questionnaire)) {
            $questionnaire->groupes()->detach();
            $questionnaire->delete();
        }
        return redirect('questionnaires');
    }
}
