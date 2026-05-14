<?php

use Core\App;
use Core\Database;

$name = $_POST['name'];
$currentUserId = $_SESSION['user']['id'];

$db = App::resolve(Database::class);

$db->query('UPDATE users SET name = :name WHERE id = :id', [
    ':name' => $name,
    ':id' => $currentUserId
]);

$_SESSION['user']['name'] = $name;

header('location: /');
exit();
