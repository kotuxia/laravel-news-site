<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function about()
    {
        return view('main.about');
    }

    public function contacts()
    {
        $contacts = [
            'Студент'=> 'Куляк Е. В.',
            'Группа'=> '243-323',
            'Дисциплина'=> 'Серверная веб-разработка',
            'Год' => '2026',
        ];

        return view('main.contacts', ['contacts' => $contacts]);
    }
}