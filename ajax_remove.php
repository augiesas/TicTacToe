<?php
$conn = new mysqli('localhost', 'root', '', 'project_fsp');

if (isset($_POST['pilihan'])) {
    $pilihan = $_POST['pilihan'];

    if ($pilihan == 'reset') {
        $sql_check = "DELETE FROM `tic_tac_toe`";
        if ($conn->query($sql_check)) {
            $arr = array(
                "result" => "OK",
                "message" => "Successfully reset table"
            );
        }
    } elseif ($pilihan == 'logout') {
        $sql_check = "DELETE FROM `users` ";
        if ($conn->query($sql_check)) {
            $arr = array(
                "result" => "OK",
                "message" => "Successfully Out"
            );
        }
    }
}
echo json_encode($arr);
$conn->close();
