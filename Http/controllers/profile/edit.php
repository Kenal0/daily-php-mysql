<?php

use Core\App;
use Core\Database;
use Core\Validation\ProfileValidator;
use Core\Services\AvatarService;

$name = trim($_POST['name']);
$currentUserId = $_SESSION['user']['id'];
$db = App::resolve(Database::class);

$avatarFile = ($_FILES['avatar']);
$newFileUploaded = !empty($_FILES['avatar']['name']);

$validator = new ProfileValidator();
    if(!$validator->validate($name, $avatarFile)) {
        return view('/profile/profile.view.php', [
            'heading' => 'Profile',
            'errors' => $validator->getErrors()
        ]);
    }

$avatarPath = $newFileUploaded
    ? AvatarService::store($avatarFile, $currentUserId)
    : $_SESSION['user']['avatar'];

$db->query('UPDATE users SET name = :name, avatar = :avatar WHERE id = :id', [
    'name' => $name,
    'avatar' => $avatarPath,
    'id' => $currentUserId
]);

$_SESSION['user']['name'] = $name;
$_SESSION['user']['avatar'] = $avatarPath;

header('location: /');
exit();
