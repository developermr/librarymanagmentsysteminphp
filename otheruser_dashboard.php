<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
// echo $_SESSION["userid"];


?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link rel="stylesheet" href="css/otheruser_dashboard.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <img src="images/bg_otheruser.png" alt="bg" class='bg'> 
    <?php
        include("data_class.php");
        $u=new data;
                $u->setconnection();
                $u->userdetail($userloginid);
                $recordset=$u->userdetail($userloginid);
                foreach($recordset as $row){

                $id= $row[0];
                $name= $row[1];
                $grade= $row[2];
                $email= $row[3];
                $pass= $row[4];
                $type= $row[5];
                $gender= $row[6];
                $pic= $row[7];
                } 
    ?>
        <div class="container">
        <div class="innerdiv">
        <div class="row">
            <h1>OLLC WEB BASED LIBRARY APPLICATION</h1>
        </div>
        <div class='logoutBtn'>
            <a href="index.php"><Button> LOGOUT</Button></a>
        </div>
        <div class="leftinnerdiv">
            <Button class="greenbtn btnNav" onclick="openpart('myaccount')"> My Account</Button>
            <Button class="greenbtn btnNav" onclick="openpart('requestbook')"> Request Book</Button>
            <Button class="greenbtn btnNav" onclick="openpart('issuereport')"> Book Report</Button>
        </div>


        <div class="rightinnerdiv">   
            <div id="myaccount" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
                <h1 class='table_head'>My account</h1>
                <div class='info_other_acc'>
                    <div>
                        <div>
                            <p>Person Name: <u><?php echo $name ?></p></u>
                            <p>Person Grade: <u><?php echo $grade ?></p></u>
                            <p>Person Email: <u><?php echo $email ?></u></p>
                            <p>Person Password: <u><?php echo $pass ?></u></p>
                            <p>Account Type: <u><?php echo $type ?></u></p>
                            <p>Gender: <u><?php echo $gender ?></u></p>
                        </div>
                    </div>
                    <div>
                        <img src="<?php echo $pic ?>" alt="<?php echo $pic ?>">
                    </div>
                    
                </div>
            </div>
        </div>


        <div class="rightinnerdiv">   
        <div id="issuereport" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
        <h1 class='table_head'>Issue record</h1>

        <?php

        $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
        $u=new data;
        $u->setconnection();
        $u->getissuebook($userloginid);
        $recordset=$u->getissuebook($userloginid);

        $table="<table><tr><th>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

        foreach($recordset as $row){
            $table.="<tr>";
            "<td>$row[0]</td>";
            $table.="<td>$row[2]</td>";
            $table.="<td>$row[3]</td>";
            $table.="<td>$row[6]</td>";
            $table.="<td>$row[7]</td>";
            $table.="<td>$row[8]</td>";
            $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-primary'>Return</button></a></td>";
            $table.="</tr>";
            // $table.=$row[0];
        }
        $table.="</table>";

        echo $table;
        ?>

        </div>
        </div>


        <div class="rightinnerdiv">   
        <div id="return" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];} else {echo "display:none"; }?>">
        <Button class="greenbtn" >Return Book</Button>

        <?php

        $u=new data;
        $u->setconnection();
        $u->returnbook($returnid);
        $recordset=$u->returnbook($returnid);
            ?>

        </div>
        </div>


        <div class="rightinnerdiv">   
        <div id="requestbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ $returnid=$_REQUEST['returnid'];echo "display:none";} else {echo "display:none"; }?>">
        <h1 class='table_head'>Request Book</h1>
        

        <?php
        $u=new data;
        $u->setconnection();
        $u->getbookissue();
        $recordset=$u->getbookissue();

        $table="<table><tr>
        <th>Image</th><th>Book Name</th><th>Book Authour</th><th>branch</th><th>Quantity</th></th><th>View Book</th><th>Request Book</th></tr>";

        foreach($recordset as $row){
            $table.="<tr>";
            "<td>$row[0]</td>";
            $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
            $table.="<td>$row[2]</td>";
            $table.="<td>$row[4]</td>";
            $table.="<td>$row[6]</td>";
            $table.="<td>$row[7]</td>";
            $table.="<td><a id='view_book_details_btn' href='view_book_other_user.php?id=$row[0]' target='iframe_view'>VIEW</a></td>";
            $table.="<td><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-primary'>Request Book</button></a></td>";
        
            $table.="</tr>";
            // $table.=$row[0];
        }
        $table.="</table>";

        echo $table;


            ?>

        </div>
        </div>

    </div>
    </div>
    <div  class="view_details_book_wrapper">
        <div><span id='closeBtn_book_details'>X</span></div>
        <iframe style="width: 300px; height: 350px" name='iframe_view' class="iframe_view_book_details"></iframe>
    </div>


    <script>
    function openpart(portion) {
    var i;
    var x = document.getElementsByClassName("portion");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    document.getElementById(portion).style.display = "block";  
    }

    const viewBookBtn = document.querySelectorAll('#view_book_details_btn');
    const iframeWrapper = document.querySelector('.view_details_book_wrapper');

    const closeIframe = document.querySelector('#closeBtn_book_details');

    viewBookBtn.forEach(btn=>{
        btn.addEventListener('click',function(){
            iframeWrapper.style.display = 'block';
        })
    })

    closeIframe.addEventListener('click',function(){
        iframeWrapper.style.display = 'none';
    })




    
    </script>
</body>
</html>