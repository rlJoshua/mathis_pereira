<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    protected $userService;

    protected $validator;

    public function __construct(UserService $userService, Validator $validator)
    {
        $this->middleware('auth');
        $this->userService = $userService;
        $this->validator = $validator;
    }

    public function profil()
    {
        // Get User logged
        $user = $this->userService->get(Auth::user()->getAuthIdentifier());

        return view('user.profil', [
            'user' => $user
        ]);
    }

    public function edit(Request $request)
    {
        // Get form and add rules
        $validator = $this->validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email'
        ],
        [
            'required' => 'Ce champ est requis',
            'max' => 'Ce champ est trop long',
            'email' => 'L’adresse e-mail n’est pas valide'
        ]);

        // Check if form is valid
        if ($validator->fails()) {
            return redirect('profil')
                ->withErrors($validator)
                ->withInput();
        }

        // change e-mail
        $this->userService->edit($request->get('user_id'), [
            'name' => $request->get('name'),
            'email' => $request->get('email')
        ]);

        return redirect('profil');
    }

    public function password()
    {
        return view('user.password');
    }

    public function editPassword(Request $request)
    {
        // Get form and add rules
        $validator = $this->validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ],
        [
            'required' => 'Ce champ est requis',
            'min' => 'Ce champ est trop court',
            'confirmed' => 'Les mot de passe ne sont pas identique'
        ]);

        // Check if form is valid
        if ($validator->fails()) {
            return redirect('password')
                ->withErrors($validator)
                ->withInput();
        }

        $this->userService->changePassword($request->get('user_id'), $request->get('password'));

        return redirect('profil');
    }
}
