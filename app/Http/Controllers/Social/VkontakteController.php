<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class VkontakteController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    /**
     * Метод вернет юзера после успешной авторизации
     * и отправит его на авторизацию
     *
     * @param AuthService $service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function callback(AuthService $service)
    {
        $user = Socialite::driver('vkontakte')->user();
        return $service->login($user);
//        dd($user);
    }
}
