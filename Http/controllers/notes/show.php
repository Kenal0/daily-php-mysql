<?php

use Core\App;
use Core\Database;

$currentUserId = $_SESSION['user']['id'];

$db = App::resolve(Database::class);


$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
