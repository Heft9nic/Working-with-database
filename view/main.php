<!DOCTYPE HTML>
<html>
<head>
    <title>PDO Create New Record</title>

</head>
<body>
<h1> PDO</h1>
<form action="controller/logic.php" method="POST">
    <table border='0'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description'></textarea></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type='text' name='price' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' />
               <a href="read.php">Back to read records</a>
            </td>
        </tr>
    </table>
</form>



</body>
</html>
