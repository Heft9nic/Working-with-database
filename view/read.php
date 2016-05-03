<?php

include "../includes/db_connect.php";

$query = "SELECT id, name, description, price FROM products";
$stmt = $con->prepare($query);
$stmt->execute();


$num = $stmt->rowCount();


echo "<div>";
    echo "<a href='main.php'>Create New Record</a>";
echo "</div>";


if($num>0){

    echo "<table>";


    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Description</th>";
    echo "<th>Price</th>";
    echo "<th>Action</th>";
    echo "</tr>";


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);


        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$name}</td>";
        echo "<td>{$description}</td>";
        echo "<td>&#36;{$price}</td>";
        echo "<td>";

        echo "<a href='update.php?id={$id}'>Edit</a>";
        echo " / ";

        echo "<a href='#' onclick='delete_user({$id});'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }


    echo "</table>";

}

else{
    echo "<div>No records found.</div>";
}
?>