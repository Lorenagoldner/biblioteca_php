<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Exibir o formulário de edição de perfil.
     */
    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Request::user(),
        ]);
    }

    /**
     * Atualizar informações do perfil do usuário.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        // Se o e-mail for alterado, forçar verificação novamente.
        if ($user->isDirty('email')) {
            $user->email_verified_at = null; // Forçar verificação de novo e-mail
        }

        $user->save();

        // Redirecionar de volta para o formulário de edição com uma mensagem de sucesso.
        return Redirect::route('profile.edit')->with('status', 'Perfil atualizado com sucesso!');
    }

    /**
     * Excluir a conta do usuário.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validar senha para confirmar exclusão
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Fazer logout e excluir a conta
        Auth::logout();
        $user->delete();

        // Invalidar a sessão e regenerar token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirecionar para a página inicial com mensagem de sucesso
        return Redirect::to('/')->with('status', 'Conta excluída com sucesso!');
    }
}
