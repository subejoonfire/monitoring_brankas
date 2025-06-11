<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $primaryKey = 'email';
    protected $allowedFields = ['email', 'password'];

    public function verify(string $email, string $password): bool
    {
        $admin = $this->find($email);
        return $admin && password_verify($password, $admin['password']);
    }
}
