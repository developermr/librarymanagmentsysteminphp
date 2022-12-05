<?php
    function connect(){
        $sql = new mysqli('localhost','root','','library_managment');
        return $sql;
    }

    $con = connect();

    $user_id = $_GET['id'];
    
    $show = "SELECT * FROM `book` WHERE id='$user_id'";

    $list = $con->query($show);
    $info = $list->fetch_assoc();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View book</title>
    <style>
        body{
            text-align:center
        }
        table{
            border-collapse:collapse;
        }
        td{
            border: 1px solid;
            text-align:center;
            margin:5px;
            padding: 5px
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>Book Name:</td>
            <td><?php echo $info['bookname'] ?></td>
        </tr>
        <tr>
            <td>Book details:</td>
            <td><?php echo $info['bookdetail'] ?></td>
        </tr>
        <tr>
            <td>Author:</td>
            <td><?php echo $info['bookaudor'] ?></td>
        </tr>
        <tr>
            <td>Publish:</td>
            <td><?php echo $info['bookpub'] ?></td>
        </tr>
        <tr>
            <td>Branch:</td>
            <td><?php echo $info['branch'] ?></td>
        </tr>
        <tr>
            <td>Quantity:</td>
            <td><?php echo $info['bookquantity'] ?></td>
        </tr>
        <tr>
            <td>Available</td>
            <td><?php echo $info['bookava'] ?></td>
        </tr>
        <tr>
            <td>Rent:</td>
            <td><?php echo $info['bookrent'] ?></td>
        </tr>
    </table>
    
</body>
</html>