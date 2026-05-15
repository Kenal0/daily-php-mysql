<?php

use Core\Validator;
use Core\App;
use Core\Database;
use Core\Authenticator;

$db = App::resolve(Database::class);

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password at least 7 characters.';
}

$user = $db->query('select * from users where email = :email',
    [
        'email' => $email
    ])->find();

if ($user) {
    $errors['email'] = 'This email address is already registered';
}
if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}


$db->query('INSERT INTO users(email,password) VALUES(:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);


$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

(new Authenticator)->login($user);


header('location: /');
exit();
