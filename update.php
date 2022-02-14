<?php

include "templates/header.php";
$connection = require_once 'Connect.php';

$currentStudent = [
    'firstName' => '',
    'surname' => '',
    'id' => ''
];

if (isset($_GET['id'])) {
    $currentStudent = $connection->getStudentById($_GET['id']);
}

?>

<div class="container">
    <form action="http://localhost/basiccrud/create-student.php" method="post">
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $currentStudent["id"]; ?>">
            <label for="voornaam">Voornaam:</label>
            <input type="text" name="voornaam" id="voornaam" class="form-control" value="<?php echo $currentStudent['firstName']; ?>">
        </div>
        <div class="form-group">
            <label for="achternaam">Achternaam:</label>
            <input type="text" name="achternaam" id="achternaam" class="form-control" value="<?php echo $currentStudent['surname']; ?>">
        </div>
        <a><button type="submit" class="btn btn-primary">
                <?php if ($currentStudent['id']): ?>
                Update
                <?php else: ?>
                Toevoegen
                <?php endif; ?>
            </button>
    </form>
</div>



<?php include "templates/footer.php"; ?>


