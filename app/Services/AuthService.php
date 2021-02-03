<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login($user)
    {
        $email = $user->getEmail();
        $name = $user->getName();

        $userData = User::where('email', $email)->first();

        if ($userData) {
            $userData->name = $name;
            if ($userData->save()) {
                Auth::login($userData);
                return redirect()->route('admin.index');
            }
        }

        $newUser = User::create([
            'name' => $name,
            'email' => $email,
            'password' => '',
        ]);

        Auth::login($newUser);

        return redirect()->route('admin.profile')
            ->with('success', 'Ваш аккаунт создан! Задайте пароль!');
    }
}
