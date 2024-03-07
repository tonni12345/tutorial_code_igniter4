<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModels extends Model
{
    protected $table = 'users';

    // Add your login logic here

    // Example method for user authentication
    public function authenticate($username, $password)
    {
        $user = $this->where('username', $username)->first();
        print_r($user);

        if ($user && isset($user['password']) && hash("sha256", $password) == $user['password']) {
            // Authentication successful
            return true;
        }

        // Authentication failed
        return false;
    }

    // Add more methods for registration, password reset, etc.
}
