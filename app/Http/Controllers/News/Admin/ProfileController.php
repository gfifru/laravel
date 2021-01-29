<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        if ($request->isMethod('post')) {

            $this->validate($request, $this->validateRules(), [], $this->attributesName());

            $errors = [];

            if (Hash::check($request->post('password'), $user->password)) {

//                dd($request->all());
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email'),
                ]);
//                dd($user);
                $user->save();
                return redirect()
                    ->route('admin.index')
                    ->with('success', 'Профиль успешно обновлен!');

            } else {

                $errors['password'][] = 'Неверно введен текущий пароль!';
                return redirect()
                    ->route('admin.profile')
                    ->withErrors($errors);

            }

        }

        return view('admin.profile', compact('user'));
    }

    /**
     * @return array
     */
    protected function validateRules(): array
    {
        return [
            'name' => 'required|min:3|max:255',
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'password' => 'required',
            'newPassword' => 'required|min:8',
        ];
    }

    /**
     * @return array
     */
    protected function attributesName(): array
    {
        return [
            'name' => 'Имя',
            'email' => 'Эл. почта',
            'password' => 'Пароль',
            'newPassword' => 'Новый пароль',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле [:attribute] не должно быть пустым!',
            'min' => 'Поле [:attribute] должно содержать минимум [:min] знака!',
            'max' => 'Поле [:attribute] должно содержать максимум [:max] знаков!',
            'unique' => 'Поле [:attribute] должно быть уникальным'
        ];
    }
}
