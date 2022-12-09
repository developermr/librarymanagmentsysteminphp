<?php
    // include("db.php");

    function connect(){
        $sql = new mysqli('localhost','root','','library_managment');
        return $sql;
    }

    $con = connect();


    $user_id = $_GET['id'];

    $command = "SELECT * FROM `book` WHERE id='$user_id'";
    $list = $con->query($command);
    $info = $list->fetch_assoc();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $author = $_POST['author'];
        $pub = $_POST['pub'];
        $details = $_POST['details'];
        $branch = $_POST['branch'];
        $quantity = $_POST['quantity'];



        $update = "UPDATE `book` SET `bookname`='$name',`bookdetail`='$details',`bookaudor`='$author',`bookpub`='$pub',`branch`='$branch',`bookquantity`='$quantity' WHERE id='$user_id'";

        $con->query($update);

        header('Refresh:0');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit book</title>
    <style>
        body{
            background-color: #68a3ed;
            color: #1a1a1a;
            margin-inline: 15px;
        }
        form{
            margin-top: 20px;
        }
        label{
            font-size: 19px;
            font-weight: bold;
        }
        input{
            margin-block: 5px;
            padding: 5px;
            font-size: 16px;
            color: #212121;
        }
        button{
            margin-top: 10px;
            padding: 10px 25px;
            background-color: #033674;
            color: white;
            border: none;
            letter-spacing: 2px;
            display: block;
            margin-inline: auto;
        }
    </style>
</head>
<body>
    <form method='post'>
        <label>Name of Book:</label>
        <input type="text" name='name' value="<?php echo $info['bookname'] ?>">
        <br><br>
        <label>Name of Author:</label>
        <input type="text" name='author' value="<?php echo $info['bookaudor'] ?>">
        <br><br>
        <label>Date of Published:</label>
        <input type="text" name='pub' value="<?php echo $info['bookpub'] ?>">
        <br><br>
        <label>Book Details:</label>
        <input type="text" name='details' value="<?php echo $info['bookdetail'] ?>">
        <br><br>
        <label>Book Branch:</label>
        <input type="text" name='branch' value="<?php echo $info['branch'] ?>">
        <br><br>
        <label>Book Quantity:</label>
        <input type="text" name='quantity' value="<?php echo $info['bookquantity'] ?>">
        <br><br>
        <button name="submit">SUBMIT</button>
    </form>
    <script>
       
    </script>
</body>
</html>