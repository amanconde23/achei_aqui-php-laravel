<?php

namespace App\Http\Controllers;

use App\UserRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;


class UserRatingController extends Controller
{
    /**
     * Mostra todas as avaliacoes dos usuarios
     *
     */
    public function index()
    {
        $userRatings = UserRating::orderBy('avaliado')->get();
        return view('admin/usuario/userRatings', [
            'userRatings' => $userRatings,
        ]);
    }

    /**
     * Formulario de avaliacao de usuario
     *
     */
    public function create(UserRating $userRating)
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('usuario/rateUser', [
            'userRating' => $userRating,
            'users' => $users
        ]);
    }

    /**
     * Armazenar avaliacao do usuario
     *
     */
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

    public function filterBadRatings(Request $request)
    {
        if($request->has('check-filter-rating')){
            $userRatings = UserRating::where('rating', 'LIKE', 'ruim')->get();
            if(count($userRatings) > 0){
                return view('admin/usuario/resultadoBuscaAvaliacaoRuim', [
                    'userRatings' => $userRatings
                ]);
            }else{
                echo ('Nenhum resultado encontrado');
            }
        }else{
            echo ('Nenhum resultado encontrado');
        }
    }
}
