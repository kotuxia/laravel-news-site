<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
{
    $jsonPath = public_path('articles.json');
    $json = file_get_contents($jsonPath);
    $articles = json_decode($json, true);

    return view('main.index', ['articles' => $articles]);
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