<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
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

    public function edit(UserRequest $request)
    {
        // Get form and add rules
        $validator = $this->validator::make(
            $request->all(),
            $request->rules(),
            $request->messages()
        );

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

    public function editPassword(UserRequest $request)
    {
        // Get form and add rules
        $validator = $this->validator::make(
            $request->all(),
            $request->rules(),
            $request->messages()
        );

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
