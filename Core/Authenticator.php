<?php

namespace Core;
use Core\Session;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                    'id' => $user['id'],
                    'name' => $user['name']
                ]);

                return true;
            }
        }
        return false;
    }
    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'id' => $user['id'],
            'name' => $user['name']
        ];

        session_regenerate_id(true);

    }

    public function logout()
    {
        Session::destroy();
    }
}