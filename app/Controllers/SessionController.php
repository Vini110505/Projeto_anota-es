<?php

namespace App\Controllers;

use Core\Request;
use Core\Controller;
use App\Models\User;
use App\Models\Note;
use Exception;


class sessionController extends Controller
{
    public function entrar(Request $request){
    $user = new User();

    $targetUser = $user->find(conditions: ["email" => $request->post('email'), "password" => $request->post('password')]);
    $anotacoes = new Note();


    if (!isset($targetUser[0])) {
        echo "Email ou senha errados!";
        $this->view('login');
    } else {
        $notesUser = $anotacoes->find(conditions: ["user_id" => $targetUser[0]['id']]);
        $this->view('home', ['user' => $targetUser[0], 'notas' => $notesUser]);
    }
    }


    public function saveNote(Request $request)
    {
        $note = new Note();
        $note->gravar(['text' => $request->post('text'), 'user_id' => $request->post('user_id')]);

        $notesUser = $note->find(conditions: ["user_id" => $request->post('user_id')]);
        $user = new User();
        $targetUser = $user->find(conditions: ["id" => $request->post('user_id')]);

        $this->view('home', ['user' => $targetUser[0], 'anotacoes' => $notesUser]);
    }

}