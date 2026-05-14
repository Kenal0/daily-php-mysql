<?php

use Core\App;
use Core\Database;
use Core\Validator;

$name = $_POST['name'];
$currentUserId = $_SESSION['user']['id'];

$db = App::resolve(Database::class);

$errors = [];
if (!Validator::name($name, $min = 2, $max = 35))
{ $errors['body'] = "Имя должно быть больше {$min} и меньше {$max} символов, а так же содержать только буквы";
}

if (!empty($errors)) {
    return view("profile/profile.view.php", [
        'heading' => 'Profile',
        'errors' => $errors
    ]);
}
$db->query('UPDATE users SET name = :name WHERE id = :id', [
    'name' => $name,
    'id' => $currentUserId
]);
$_SESSION['user']['name'] = $name;



if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $filename = 'avatar_' . $currentUserId . '.' . $extension;

    move_uploaded_file($_FILES['avatar']['tmp_name'], base_path('public/images/' . $filename));

    $db->query('UPDATE users SET avatar = :avatar WHERE id = :id', [
        'avatar' => '/images/' . $filename,
        'id' => $currentUserId
    ]);

    $_SESSION['user']['avatar'] = '/images/' . $filename;
}


header('location: /');
exit();
