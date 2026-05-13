<?php

$_SESSION['name'] = 'Mikhail';

view("index.view.php", [
    'heading' => 'Home',
]);