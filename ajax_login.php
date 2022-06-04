<?php
$conn = new mysqli('localhost', 'root', '', 'project_fsp');

if (isset($_POST['name'])) {
    $changed = 1;
    $name = $_POST['name'];
    $role = $_POST['role'];

    $sql_check = "SELECT nomor, iduser FROM users";
    $res = $conn->query($sql_check);
    $hitung = $res->num_rows;

    if ($hitung == 0) {
        $nomor = 1;
        $turn = 1;
        $sql_input = "INSERT INTO users (nomor, iduser, role, turn) VALUES (?,?,?,?)";
        $hasil = $conn->prepare($sql_input);
        $hasil->bind_param('issi', $nomor, $name, $role, $turn);

        $hasil->execute();
    } else if ($hitung == 1) {
        $turn = 0;
        $nomor = 2;
        $sql_input = "INSERT INTO users (nomor, iduser, role, turn) VALUES (?,?,?,?)";
        $hasil = $conn->prepare($sql_input);
        $hasil->bind_param('issi', $nomor, $name, $role, $turn);

        $hasil->execute();
    }
}

$conn->close();
