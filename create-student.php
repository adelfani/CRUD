<?php
$connection = require_once 'Connect.php';


$id = $_POST['id'] ?? '';

if ($id) {
    $connection->updateStudent($id, $_POST);
} else {
    $connection->addStudent($_POST);
}



header('Location: http://localhost/basiccrud/');