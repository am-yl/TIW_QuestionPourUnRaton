<?php

namespace App\Http\Controllers;
use App\Models\Groupe;
use App\Models\Questionnaire;

use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupes = Groupe::All();
        return view('groupes', [
            'groupes' => $groupes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questionnaires = Questionnaire::All();
        return view('groupeform', [
            'questionnaires' => $questionnaires,
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
        $groupe = new Groupe;
        $groupe->name = $request->name;
        $groupe->description = $request->description;
        $groupe->save();

        foreach($request->questionnaire_id as $q_id) {
            $questionnaire = Questionnaire::find($q_id);
            $groupe->questionnaires()->save($questionnaire);
        }

        return redirect('groupes');
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
        $groupe = Groupe::find($id);
        $questionnaires = Questionnaire::All();
        if(isset($groupe)) {
            return view('groupeform', [
                'groupe' => $groupe,
                'questionnaires' => $questionnaires,
            ]);
        } else {
            return view('groupes');
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
        $groupe = Groupe::find($id);
        $groupe->name = $request->name;
        $groupe->description = $request->description;
        $groupe->save();

        foreach($request->questionnaire_id as $q_id) {
            $questionnaire = Questionnaire::find($q_id);
            // var_dump($groupe->questionnaires($questionnaire));
            if($groupe->questionnaires($questionnaire) == null) {
                $groupe->questionnaires()->save($questionnaire);
            }
        }

        return redirect('groupes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groupe = Groupe::find($id);
        if(isset($groupe)) {
            $groupe->delete();
        }
        return redirect('groupes');
    }
}
