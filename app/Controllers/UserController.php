<?php

namespace App\Controllers;


use App\Models\User;
use Core\Controller;
use Core\Request;

class UserController extends Controller 
{


  public function index(Request $request)
  {
    $params = [
        'user' => [
          'name' => $request->post()['name'],
          'email' => $request->post()['email'],
          'password' => $request->post()['password'],
        ]
      ];
      $this->view('home', $params);
  }

  public function create(Request $request)
  {
    $user = new User();
    $user->gravar(['name' => $request->post('name'), 'email' => $request->post('email'), 'password' => $request->post('password')]);

    $this->view('/');
  }

}