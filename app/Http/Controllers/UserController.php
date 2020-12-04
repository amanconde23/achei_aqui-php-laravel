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
     * Mostra lista de usuarios cadastrados na pagina admin
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('admin/usuario/adminUsuarios', [
            'users' => $users
        ]);
    }

    /**
     * Mostra um usuario em detalhes
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $userRating = UserRating::where(['avaliado'=> $user->name])->get();
        return view('usuario/verUsuario', [
            'user' => $user,
            'userRating' => $userRating
        ]);
    }

    /**
     * Mostra um usuario em detalhes no admin
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showUserAdmin(User $user)
    {
        $rating = 'ruim';
        $badRatingMessage = 'Este usuário está mal avaliado. Deve ser banido.';
        $goodRatingMessage = 'Este usuário está bem avaliado. Nenhuma ação necessária.';
        $userRating = UserRating::where(['avaliado'=> $user->name])->get();
        $badRating = UserRating::where(['avaliado'=> $user->name])
            ->where('rating', 'LIKE', '%'.$rating.'%')
            ->get();
        if(count($badRating) >= 3 && count($userRating) > 0){
            return view('admin/usuario/verUsuarioAdminBadRating', [
                'user' => $user,
                'userRating' => $userRating,
                'message' => $badRatingMessage
            ]);
        } else {
            return view('admin/usuario/verUsuarioAdminGoodRating', [
                'user' => $user,
                'userRating' => $userRating,
                'message' => $goodRatingMessage
            ]);
        }

    }
    /**
     * Formulario de editar usuario
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
     * Acao de editar usuario
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
     * Apagar usuario
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['status'=>'Usuário excluído com sucesso!']);
    }

    /**
     * Apagar usuario pag admin
     *
     */
    public function destroyUserAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['status'=>'Usuário excluído com sucesso!']);
    }

    /**
     * Pesquisa status de avaliacao do usuario
     *
     */
    public function banUser(Request $request)
    {
        $rating = 'ruim';
        $search = $request->get('searchUser');
        $user = User::where('name', 'LIKE', '%'.$search.'%')->get();
        $badRating = UserRating::where('avaliado', 'LIKE', '%'.$search.'%')
            ->where('rating', 'LIKE', '%'.$rating.'%')
            ->get();

        $userRating = UserRating::where('avaliado', 'LIKE', '%'.$search.'%')
            ->get();
            
        if(count($badRating) >= 3 && count($userRating) > 0){
            return view('admin/usuario/resultadoBuscarBanirUsuario', [
                'user' => $user
            ])
                ->withDetails($userRating)
                ->withQuery($search)
                ->withMessage('Este usuário está mal avaliado. Deve ser banido.');
        }else if(count($badRating) > 3 || count($userRating) > 0){
            return view('admin/usuario/resultadoBuscaUsuario', [
                'user' => $user
            ])
                ->withDetails($userRating)
                ->withQuery($search)
                ->withMessage('Este usuário está bem avaliado. Nenhuma ação necessária.');
        }
        else{
            return view('admin/usuario/resultadoBuscaUsuario')
                ->withMessage('Nenhum resultado encontrado');
        }
    }

    /**
     * Pesquisar usuario
     *
     */
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
