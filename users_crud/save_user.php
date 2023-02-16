<?php

include('db.php');

if(isset($_POST['save_user'])){

    $name = $_POST['NOMBRE'];
    $age = $_POST['EDAD'];
    $gender = $_POST['SEXO'];
    $rolid = $_POST['ROLID'];

    $query = "INSERT INTO usuarios(NOMBRE, EDAD, SEXO, ROLID) VALUES ('$name', '$age', '$gender', '$rolid')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'User Saved Successfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");

}

?>