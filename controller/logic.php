<?php
echo "hell";
if($_POST){
    include "../includes/db_connect.php";

    try{
        $query = 'INSERT INTO products (name, description, price, created) VALUES (:name, :description, :price, :created)';



        $stmt = $con->prepare($query);

        $name=htmlspecialchars(strip_tags($_POST['name']));
        $description=htmlspecialchars(strip_tags($_POST['description']));
        $price=htmlspecialchars(strip_tags($_POST['price']));

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':price', $price);

        $created=date('Y-m-d H:i:s');
        $stmt->bindParam('created', $created);

        if($stmt->execute()){
            echo "<b> Record complete  </b>";
        }else{
            $arr = $stmt->errorInfo();
            print_r($arr);
            die("record failed");
        }
    }
        catch (PDOException $exception){
            die('EROR' . $exception->getMessage());
        }
}