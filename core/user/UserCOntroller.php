<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $userModel = $this->model('User ');
        $users = $userModel->getAllUsers();
        $this->view('user/index', ['users' => $users]);
    }

    public function show($id) {
        $userModel = $this->model('User ');
        $user = $userModel->getUser ById($id);
        $this->view('user/show', ['user' => $user]);
    }
}
