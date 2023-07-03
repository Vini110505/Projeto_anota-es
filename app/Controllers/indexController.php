<?php
namespace App\Controllers;

use Core\Controller;

class IndexController extends Controller {
    
    public function index() {
        $this->view('index');
    }
    public function cadastre() {
        $this->view('cadastro');
    }
    public function exit(){
        $this->view('index');
    }
    public function return(){
        $this->view('index');
    }
}
