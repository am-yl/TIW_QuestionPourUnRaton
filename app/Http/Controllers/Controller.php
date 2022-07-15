<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Questionnaire;
use App\Models\User;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    public function index() {

        $user = User::find(Auth::user()->id);
        switch (Auth::user()->role_id) {
            case 1 :
            case 2 :
            case 3 :
                return view('dashboard', [
                    'user' => $user,
                ]);
                break;
            case 4 :
                $users = User::All();
                $questionnaires = Questionnaire::All();
                $groupes = Groupe::All();

                return view('dashboard', [
                    'user' => $user,
                    'users' => $users,
                    'questionnaires' => $questionnaires,
                    'groupes' => $groupes,
                ]);
                break;
            }
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
