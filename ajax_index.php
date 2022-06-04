<?php
$conn = new mysqli('localhost', 'root', '', 'project_fsp');

$sql_turn = "SELECT nomor, iduser, turn FROM users";
$hasil = $conn->query($sql_turn);
$arr = [];

while ($baris = $hasil->fetch_assoc()) {
    $urutan = $baris['nomor'];
    $is_turn = $baris['turn'];
    $nama = $baris['iduser'];

    // IF PLAYER 1 TURN
    if ($urutan == 1 && $is_turn == 1) {
        // echo "<p>$nama's turn</p>";

        if (isset($_POST['pilihan'])) {
            $pasang = $_POST['pilihan'];
            $role = 'X';

            //CHECK IF THIS ID TABLE HAVE VALUE
            $sql_check = "SELECT * FROM tic_tac_toe WHERE id LIKE $pasang";
            $hasil_check = $conn->query($sql_check);
            if ($hasil_check->fetch_assoc()) {
                $arr = ["result" => "fail", "Sudah ada value"];
            } else {
                // INSERT CHOOSEN TABLE
                $sql_pasang = "INSERT INTO tic_tac_toe VALUES (?,?)";
                $stmt = $conn->prepare($sql_pasang);
                $stmt->bind_param("is", $pasang, $role);

                // IF SUCCESS EXECUTE INSERT CHOOSEN TABLE
                // CHANGE THIS PLAYER TURN TO FALSE
                if ($stmt->execute()) {
                    // UPDATE PLAYER TURN
                    $sql_update_turn = "UPDATE users SET turn='0' WHERE nomor = '1';";
                    $sql_update_turn .= "UPDATE users SET turn='1' WHERE nomor = '2';";

                    if (mysqli_multi_query($conn, $sql_update_turn)) {
                        $arr = ["result" => "success", "turn" => "Player 2 Turn"];
                    } else {
                        $arr = ["result" => "fail", "error" => $conn->error];
                    }
                }
            }
        }
    }
    // IF PLAYER 2 TURN
    else if ($urutan == 2 && $is_turn == 1) {
        echo "<p>$nama's turn</p>";

        if (isset($_POST['pilihan'])) {
            $pasang = $_POST['pilihan'];
            $role = 'O';

            $sql_check = "SELECT * FROM tic_tac_toe WHERE id LIKE $pasang";
            $hasil_check = $conn->query($sql_check);
            if ($hasil_check->fetch_assoc()) {
                $arr = ["result" => "fail", "Sudah ada value"];
            } else {

                // INSERT CHOOSEN TABLE
                $sql_pasang = "INSERT INTO tic_tac_toe VALUES (?,?)";
                $stmt = $conn->prepare($sql_pasang);
                $stmt->bind_param("is", $pasang, $role);

                // IF SUCCESS EXECUTE INSERT CHOOSEN TABLE
                // CHANGE THIS PLAYER TURN TO FALSE
                if ($stmt->execute()) {
                    // UPDATE PLAYER TURN
                    $sql_update_turn = "UPDATE users SET turn='1' WHERE nomor = '1';";
                    $sql_update_turn .= "UPDATE users SET turn='0' WHERE nomor = '2';";

                    if (mysqli_multi_query($conn, $sql_update_turn)) {
                        $arr = ["result" => "success", "turn" => "Player 1 Turn"];
                    } else {
                        $arr = ["result" => "fail", "error" => $conn->error];
                    }
                }
            }
        }
    }
}

echo json_encode($arr);

$conn->close();
