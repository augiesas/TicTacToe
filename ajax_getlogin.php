<?php
$conn = new mysqli('localhost', 'root', '', 'project_fsp');

$sql_check = "SELECT nomor, iduser, role, turn FROM users";
$res = $conn->query($sql_check);
while ($baris = $res->fetch_assoc()) {
    $array[] = $baris;
}
echo json_encode($array);
$conn->close();
