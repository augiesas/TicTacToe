<?php
$conn = new mysqli('localhost', 'root', '', 'project_fsp');

$sql = "SELECT * FROM tic_tac_toe WHERE role='X'";
$res = $conn->query($sql);

while ($baris = $res->fetch_assoc()) {
    $arr[] = $baris['id'];
}

$winningConditions = [
    [11, 21, 31],
    [11, 12, 13],
    [21, 22, 23],
    [31, 32, 33],
    [12, 22, 32],
    [13, 23, 33],
    [11, 22, 33],
    [31, 22, 13]
];

for ($i = 0; $i < count($winningConditions); $i++) {
    if (in_array($arr, $winningConditions[$i])) {
        echo 'menang';
    }
}


$conn->close();
