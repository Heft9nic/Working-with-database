<html>
<head>
    <title>Update CRUD</title>
</head>
<body>

<?php

include "../includes/db_connect.php";

$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');


try {

    $query = "SELECT id, name, description, price FROM products WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
}

// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>

<form action='update.php?id=<?php echo htmlspecialchars($id); ?>' method='post' border='0'>
    <table>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value="<?php echo htmlspecialchars($name, ENT_QUOTES);  ?>" /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description'><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price'  value="<?php echo htmlspecialchars($price, ENT_QUOTES);  ?>" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save Changes' />
                <a href='read.php'>Back to read records</a>
            </td>
        </tr>
    </table>
</form

<?php

$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');



if($_POST){

    try{


        $query = "UPDATE products
                    SET name=:name, description=:description, price=:price
                    WHERE id = :id";


        $stmt = $con->prepare($query);


        $name=htmlspecialchars(strip_tags($_POST['name']));
        $description=htmlspecialchars(strip_tags($_POST['description']));
        $price=htmlspecialchars(strip_tags($_POST['price']));


        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);


        if($stmt->execute()){
            echo "Record was updated.";
        }else{
            echo 'Unable to update record. Please try again.';
        }

    }


    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
</body>
</html>