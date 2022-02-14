<?php

$connection = require_once 'Connect.php';

$student = $connection->getStudents();

$currentStudent = [
        'voornaam' => '',
        'achternaam' => ''
];

if (isset($_GET['id'])) {
    $currentStudent = $connection->getStudentById($_GET['id']);
}

?>

<table class="table">

    <thead>

    <tr>

        <th>Id</th>

        <th>Voornaam</th>

        <th>Achternaam</th>

    </tr>

    </thead>

    <tbody>

    <?php foreach ($student as $data) { ?>

        <tr>

            <td><?php echo $data["id"]; ?></td>

            <td><?php echo $data["firstName"]; ?></td>

            <td><?php echo $data["surname"]; ?></td>

            <td><a href="update.php/?id=<?php echo $data["id"]; ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Wijzig</button></a>
                <form action="delete.php" method="post" class="d-inline">
                    <input type="hidden" name="id" value="<?php echo $data['id']?>">
                    <button class="btn btn-outline-danger">X</button>
                </form>
            </td>

        </tr>

    <?php } ?>

    </tbody>

</table>


<!-- Modal -->


