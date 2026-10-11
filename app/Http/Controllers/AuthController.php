<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|min:2|max:50',
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('signin')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $jsonPath = public_path('users.json');
        $users = [];

        if (file_exists($jsonPath)) {
            $existing = file_get_contents($jsonPath);
            $decoded = json_decode($existing, true);
            if (is_array($decoded)) {
                $users = $decoded;
            }
        }

        $users[] = $data;

        file_put_contents(
            $jsonPath,
            json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        return redirect()->route('index')
            ->with('success', 'Регистрация прошла успешно!');
    }
}