<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Groupe;
use App\Models\Role;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();
        return view('users', [
            'users' => $users,
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
        $user = User::find($id);
        $groupes = Groupe::All();
        $roles = Role::All();
        if(isset($user)) {
            return view('userform', [
                'user' => $user,
                'roles' => $roles,
                'groupes' => $groupes,
            ]);
        } else {
            return view('users');
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
        $user = User::find($id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->groupe_id = $request->groupe_id;
        $user->save();
        $questionnaires = $user->groupe->questionnaires;

        foreach($questionnaires as $questionnaire) {
            // TO CHECK POUR PAS RESAVE EN BASE :) leuchtrum page 33
            $set = $user->questionnaires()->where('questionnaire_id', $questionnaire->id)->get();
            if(count($set) == 0) {
                $questionnaire = Questionnaire::find($questionnaire->id);
                $user->questionnaires()->save($questionnaire);
            }
        }


        return redirect('users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $g_id
     * @return \Illuminate\Http\Response
     */

    public function ajout_groupe(Request $request, $g_id) {
        if(isset($request->user_id)) {
            foreach($request->user_id as $id) {
                $user = User::find($id);
                $user->groupe_id = $g_id;
                $user->save();
                $questionnaires = $user->groupe->questionnaires;
                foreach($questionnaires as $questionnaire) {
                    $user->questionnaires()->save($questionnaire);
                }
            }
        }
        return redirect()
            ->action([GroupeController::class, 'show'], ['id' => $g_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(isset($user)) {
            $user->questionnaires()->detach();
            $user->delete();
        }
        return redirect('users');
    }
}
