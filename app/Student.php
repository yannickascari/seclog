<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visualiseur de notes</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<h1 style="text-align: center">Tableau des étudiants/notes</h1>
<?php
require 'DataSaver.php';

$currentStudent = $_GET['stud'];

$dataSaver = unserialize($_GET['dt']);

class Student
{
    public $name;
    public $note;
}

$students = $dataSaver->loadStudents();

echo "<table>
        <tr>
            <th>Nom de l'étudiant</th>
            <th>Moyenne</th>
        </tr>";

foreach ($students as $student) {
    $studName = $student->name;
    $isTheCurrentStudent = $studName === $currentStudent;
    $studNote = $student->note;
    if ($isTheCurrentStudent)
        echo
        "<tr>
            <td style='color: mediumblue'>${studName}</td>
            <td style='color: mediumblue'>${studNote}</td>
        </tr>";
    else
        echo
        "<tr>
            <td>${studName}</td>
            <td>${studNote}</td>
        </tr>";
}

echo "</table>";
?>
<section>
    <h2>Information</h2>
    <p>
        Votre prénom et votre moyenne se colorie en bleu pour vous aider a vous identifier dans le tableau lorsque vous avez entrer votre prénom.
    </p>
</section>
</body>
</html>