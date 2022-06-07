<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Groupe;
use App\Models\Role;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

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
        $user->type = $request->type;
        $user->groupe_id = $request->groupe_id;

        $user->save();

        return redirect('users');
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
