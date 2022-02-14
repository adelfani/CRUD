<?php

class Connect
{
    public PDO $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:server=localhost;dbname=basiccrud', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getStudents()
    {
        $students = $this->db->prepare('SELECT * FROM student ORDER BY id');
        $students->execute();
        return $students->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addStudent($data)
    {
        $students = $this->db->prepare("INSERT INTO student (firstName, surname)
                                                VALUE (:firstName, :surname)");
        $students->bindValue("firstName", $data['voornaam']);
        $students->bindValue("surname", $data['achternaam']);
        return $students->execute();
    }

    public function getStudentById($id)
    {
        $students = $this->db->prepare("SELECT * FROM student WHERE id = :id");
        $students->bindValue('id', $id);
        $students->execute();
        return $students->fetch(PDO::FETCH_ASSOC);
    }
    public function updateStudent($id, $student)
    {
        $students = $this->db->prepare("UPDATE student SET  firstName = :firstName, surname = :surname WHERE id = :id");
        $students->bindValue("id", $id);
        $students->bindValue("firstName", $student['voornaam']);
        $students->bindValue("surname", $student['achternaam']);
        return $students->execute();
    }

    public function removeStudent($id)
    {
        $students = $this->db->prepare("DELETE FROM student WHERE id = :id");
        $students->bindValue("id", $id);
        return $students->execute();
    }


}

return new Connect();
