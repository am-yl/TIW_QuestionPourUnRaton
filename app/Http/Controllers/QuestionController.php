<?php

namespace App\Http\Controllers;
use App\Models\Questionnaire;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($q_id, $id)
    {

    }
}
