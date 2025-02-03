<?php

namespace App\Models;

use Core\Model;

class User extends Model {
    public function getAllUsers() {
        return $this->fetchAll("SELECT * FROM users");
    }

    public function getUser ById($id) {
        return $this->fetch("SELECT * FROM users WHERE id = ?", [$id]);
    }
}
