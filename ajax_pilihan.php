<?php
$conn = new mysqli('localhost', 'root', '', 'project_fsp');

$sql = "SELECT * FROM tic_tac_toe";
$res = $conn->query($sql);

while($baris = $res->fetch_assoc()){
    $arr[] = $baris;
}

echo json_encode(array('result' => 'OK', 'data' => $arr));

$conn->close();