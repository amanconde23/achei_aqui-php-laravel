<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;
use App\UserRating;
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
        $users = User::all();
        return view('admin/usuario/adminUsuarios', [
            'users' => $users
        ]);
    }

    public function showAllUsers()
    {
        $users = User::all();
        return view('usuario/usuarios', [
            'users' => $users
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $userRating = UserRating::where(['avaliado'=>Auth::user()->name])->get();
        return view('usuario/verUsuario', [
            'user' => $user,
            'userRating' => $userRating
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editUserForm(User $user)
    {
        return view('usuario/editarUsuario', [
            'user' => $user
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        Alert::success('Sucesso!', 'Usuário Atualizado com Sucesso!');
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        
        return redirect()->route('user-pannel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['status'=>'Sua conta foi excluída com sucesso!']);
    }

    public function destroyUserAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['status'=>'Usuário excluído com sucesso!']);
    }

    public function banUser(Request $request)
    {
        $rating = 'ruim';
        $search = $request->get('searchUser');
        $badRating = UserRating::where('avaliado', 'LIKE', '%'.$search.'%')
            ->where('rating', 'LIKE', '%'.$rating.'%')
            ->get();

        $userRating = UserRating::where('avaliado', 'LIKE', '%'.$search.'%')
            ->get();
        if(count($badRating) >= 3 && count($userRating) > 0){
            return view('admin/usuario/resultadoBuscarBanirUsuario')
                ->withDetails($userRating)
                ->withQuery($search)
                ->withMessage('Esse usuário deve ser banido!');
        }else if(count($badRating) > 3 || count($userRating) > 0){
            return view('admin/usuario/resultadoBuscaUsuario')
                ->withDetails($userRating)
                ->withQuery($search)
                ->withMessage('Esse usuário está bem avaliado!');
        }
        else{
            return view('admin/usuario/resultadoBuscaUsuario')
                ->withMessage('Nenhum resultado encontrado');
        }
    }

    public function searchUser(Request $request)
    {
        $search = $request->get('searchUser');
        $user = User::where('name', 'LIKE', '%'.$search.'%')->get();
        if(count($user) > 0){
            return view('admin/usuario/resultadoBuscaAdminUsuario')
                ->withDetails($user)
                ->withQuery($search);
        }else{
            return view('admin/usuario/resultadoBuscaAdminUsuario')
                ->withMessage('Nenhum resultado encontrado');
        }
    }
}
