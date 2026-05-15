<?php

use Core\App;
use Core\Database;
use Core\Validator;

$name = $_POST['name'];
$currentUserId = $_SESSION['user']['id'];
$db = App::resolve(Database::class);
$errors = [];

if (!Validator::name($name, $min = 2, $max = 35)) {
    $errors['body'] = "Имя должно быть больше {$min} и меньше {$max} символов, а так же содержать только буквы";
}

$fileValidation = Validator::file($_FILES['avatar']);
$avatarPath = $_SESSION['user']['avatar'] ?? null;
$newFileUploaded = !empty($_FILES['avatar']['name']);

if ($newFileUploaded) {
 if (!$fileValidation) {
     $errors['errorAvatar'] = 'Слишком большой файл или неподходящее расширение';
    } else {
     if (!empty($_SESSION['user']['avatar'])) {
         $oldFiles = glob(base_path('public/images/avatar_' . $currentUserId . '*'));

         foreach ($oldFiles as $oldFile) {
             if (file_exists($oldFile))
                 unlink($oldFile);
         }
     }

     $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
     $filename = 'avatar_' . $currentUserId . '.' . $extension;
     move_uploaded_file($_FILES['avatar']['tmp_name'], base_path('public/images/' . $filename));

     $avatarPath = '/images/' . $filename;
 }
}



if (!empty($errors)) {
    return view("profile/profile.view.php", [
        'heading' => 'Profile',
        'errors' => $errors
    ]);
}


$db->query('UPDATE users SET name = :name, avatar = :avatar WHERE id = :id', [
    'name' => $name,
    'avatar' => $avatarPath,
    'id' => $currentUserId
]);

$_SESSION['user']['name'] = $name;
$_SESSION['user']['avatar'] = $avatarPath;

header('location: /');
exit();
