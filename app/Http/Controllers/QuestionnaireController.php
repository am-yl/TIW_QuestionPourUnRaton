<?php

namespace App\Http\Controllers;
use App\Models\Questionnaire;
use App\Models\Question;
use Illuminate\Http\Request;

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
        return view('questionnaireform');
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
        return redirect('questionnaires');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionnaire = Questionnaire::find($id);

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
        if(isset($questionnaire)) {
            return view('questionnaireform', [
                'questionnaire' => $questionnaire,
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
            $questionnaire->delete();
        }
        return redirect('questionnaires');
    }
}
