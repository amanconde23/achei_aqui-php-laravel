<?php

namespace App\Http\Controllers;

use App\UserRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;


class UserRatingController extends Controller
{
    public function index()
    {
        $userRatings = UserRating::all();
        return view('admin/usuario/userRatings', [
            'userRatings' => $userRatings,

        ]);
    }

    public function create(UserRating $userRating)
    {
        $users = User::all();
        return view('usuario/rateUser', [
            'userRating' => $userRating,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        Alert::success('Sucesso!', 'Usuário Avaliado com Sucesso!');
        $userId = Auth::user()->id;
        $userRating = new UserRating();
        $userRating->user_id = $userId;
        $userRating->avaliado = $request->avaliado;
        $userRating->rating = $request->rating;
        $userRating->comment = $request->comment;
        $userRating->save();
        
        return redirect()->route('user-pannel');
    }
}
