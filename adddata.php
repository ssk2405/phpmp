<?php
    require_once "conn.php";
    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $room = $_POST['room'];
        $phoneno = $_POST['phone_no'];

        if($name != "" && $room != "" && $phoneno != "" ){
            // Using prepared statements to prevent SQL injection
            $sql = "INSERT INTO results (`name`, `room`, `Phone_no`) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $room, $phoneno);
            if ($stmt->execute()) {
                header("location: index.php");
                exit(); // Terminate script after redirect
            } else {
                echo "Something went wrong. Please try again later.";
            }
        } else {
            echo "Name, Room, and Phone no. cannot be empty!";
        }
    }
?>
