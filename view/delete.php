<?php


include "../includes/db_connect.php";

try {
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR');

    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);
    if($stmt->execute()){

        header('Location: read.php?action=deleted');
    }else{
        die('Unable to delete record.');
    }
}

catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}