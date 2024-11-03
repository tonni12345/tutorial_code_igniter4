<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModels extends Model
{
    protected $table = 'users';


    public function authenticate($username, $password)
    {
        $user = $this->where('username', $username)->first();
        print_r($user);

        if ($user && isset($user['password']) && hash("sha256", $password) == $user['password']) {
            return true;
        }

        return false;
    }
}
