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

        if(Auth::user()->role_id == 4) {
            $users = User::All();
            $questionnaires = Questionnaire::All();
            $groupes = Groupe::All();

            return view('dashboard', [
                'users' => $users,
                'questionnaires' => $questionnaires,
                'groupes' => $groupes,
            ]);
        }
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
