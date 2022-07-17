<?php

namespace App\Http\Controllers;
use App\Models\Groupe;
use App\Models\User;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if(isset($request->questionnaire_id)) {
            foreach($request->questionnaire_id as $questionnaire_id) {
                $questionnaire = Questionnaire::find($questionnaire_id);
                $groupe->questionnaires()->attach($questionnaire);
            }
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
        $eleves = User::All()->where('role_id','2')->where('groupe_id', '1');
        $groupe = Groupe::find($id);
        return view('groupe', [
            'groupe' => $groupe,
            'eleves' => $eleves,
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
        $groupe = Groupe::find($id);
        $questionnaires = Questionnaire::All();
        if(isset($groupe)) {
            return view('groupeform', [
                'groupe' => $groupe,
                'questionnaires' => $questionnaires,
            ]);
        } else {
            $eleves = User::All()->where('role_id','2')->where('groupe_id', '1');
            return view('groupe', [
                'groupe' => $groupe,
                'eleves' => $eleves,
            ]);
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

        if(isset($request->questionnaire_id)) {
            foreach($request->questionnaire_id as $questionnaire_id) {
                $set = $groupe->questionnaires()->where('questionnaire_id', $questionnaire_id)->get();
                if(count($set) == 0) {
                    $questionnaire = Questionnaire::find($questionnaire_id);
                    $groupe->questionnaires()->save($questionnaire);
                }
            }
        }
        $eleves = User::All()->where('role_id','2')->where('groupe_id', '1');
        return view('groupe', [
            'groupe' => $groupe,
            'eleves' => $eleves,
        ]);
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
            $groupe->questionnaires()->detach();
            $groupe->delete();
        }
        return redirect('groupes');
    }
}
