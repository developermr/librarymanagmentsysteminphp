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
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body>

        <?php
    include("data_class.php");

    $msg="";

    if(!empty($_REQUEST['msg'])){
        $msg=$_REQUEST['msg'];
    }

    if($msg=="done"){
        echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
    }
    elseif($msg=="fail"){
        echo "<div class='alert alert-danger' role='alert'>Fail</div>";
    }

    ?>

        <h1 class="heading">OLLC WEB-BASED LIBRARY APPLICATION</h1>
        <div class="wrapper">
            <a href="index.php"><Button class="greenbtn logout"> LOGOUT</Button></a>
            <div class="container">
                <div class="innerdiv">
                    <div class="leftinnerdiv">
                        <Button class="greenbtn"> ADMIN</Button>
                        <Button class="greenbtn" onclick="openpart('addbook')" >ADD BOOK</Button>
                        <Button class="greenbtn" onclick="openpart('bookreport')" > BOOK REPORT</Button>
                        <Button class="greenbtn" onclick="openpart('bookrequestapprove')"> BOOK REQUESTS</Button>
                        <!-- <Button class="greenbtn" onclick="openpart('addperson')"> ADD STUDENT</Button> -->
                        <Button class="greenbtn" onclick="openpart('studentrecord')"> STUDENT REPORT</Button>
                        <Button class="greenbtn"  onclick="openpart('issuebook')"> ISSUE BOOK</Button>
                        <Button class="greenbtn" onclick="openpart('issuebookreport')"> ISSUE REPORT</Button>
                    </div>
                    <div class="rightinnerdiv">
                    <div id="bookrequestapprove" class="innerright portion" style="display:none">
                    <Button class="greenbtn content-title" >BOOK REQUEST APPROVE</Button>
                    <?php
                    $u=new data;
                    $u->setconnection();
                    $u->requestbookdata();
                    $recordset=$u->requestbookdata();
                    $table="<table style='font-family: Arial, Helvetica, sans-serif;width: 100%;'><tr><th style=';
                    padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
                    foreach($recordset as $row){
                        $table.="<tr>";
                    "<td>$row[0]</td>";
                    "<td>$row[1]</td>";
                    "<td>$row[2]</td>";
                        $table.="<td>$row[3]</td>";
                        $table.="<td>$row[4]</td>";
                        $table.="<td>$row[5]</td>";
                        $table.="<td>$row[6]</td>";
                    // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                        $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'>Approved</a></td>";
                        // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                        $table.="</tr>";
                        // $table.=$row[0];
                    }
                    $table.="</table>";
                    echo $table;
                    ?>
                    </div>
                    </div>
                    <div class="rightinnerdiv">
                    <div id="addbook" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
                    <Button class="greenbtn content-title" style="margin-bottom: 40px;">ADD NEW BOOK</Button>
                    <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
                    <label>Name of Book:</label><input class="input1" type="text" name="bookname"/></br>
                    <label>Name of Author:</label><input class="input2" type="text" name="bookaudor"/></br>
                    <label>Publication</label><input class="input3" type="text" name="bookpub"/></br>
                    <label>Detail:</label><input class="textarea"  type="text" name="bookdetail"/></br>
                    <div>Branch:<input type="radio" name="branch" value="other"/>other<input type="radio" name="branch" value="BSIT"/>BSIT<div style="margin-left:80px"><input type="radio" name="branch" value="BSCS"/>BSCS<input type="radio" name="branch" value="BSSE"/>BSSE</div>
                    </div>
                    <label>Price:</label><input class="input4" type="number" name="bookprice"/></br>
                    <label>Quantity:</label><input class="input5" type="number" name="bookquantity"/></br>
                    <label>Book Cover Photo</label><br><input  type="file" name="bookphoto"/></br>
                    </br>
                    <input type="submit" value="SUBMIT"/>
                    </br>
                    </br>
                    </form>
                    </div>
                    </div>
                    <div class="rightinnerdiv">
                    <div id="studentrecord" class="innerright portion" style="display:none">
                    <Button class="greenbtn content-title" >Student RECORD</Button>
                    <?php
                    $u=new data;
                    $u->setconnection();
                    $u->userdata();
                    $recordset=$u->userdata();
                    $table="<table style='font-family: Arial, Helvetica, sans-serif;width: 100%;'><tr><th style=';
                    padding: 8px;'> Name</th><th>Grade</th><th>Email</th><th>Password</th><th>type</th><th>gender</th></tr>";
                    foreach($recordset as $row){
                        $table.="<tr>";
                    "<td>$row[0]</td>";
                        $table.="<td>$row[1]</td>";
                        $table.="<td>$row[2]</td>";
                        $table.="<td>$row[3]</td>";
                        $table.="<td>$row[4]</td>";
                        $table.="<td>$row[5]</td>";
                        $table.="<td>$row[6]</td>";
                        // $table.="<td>$row[7]</td>";
                        // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                        $table.="</tr>";
                        // $table.=$row[0];
                    }
                    $table.="</table>";
                    echo $table;
                    ?>
                    </div>
                    </div>
                    <div class="rightinnerdiv">
                    <div id="issuebookreport" class="innerright portion" style="display:none">
                    <Button class="greenbtn content-title" >Issue Book Record</Button>
                    <?php
                    $u=new data;
                    $u->setconnection();
                    $u->issuereport();
                    $recordset=$u->issuereport();
                    $table="<table style='font-family: Arial, Helvetica, sans-serif;width: 100%;'><tr><th style=';
                    padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";
                    foreach($recordset as $row){
                        $table.="<tr>";
                    "<td>$row[0]</td>";
                        $table.="<td>$row[2]</td>";
                        $table.="<td>$row[3]</td>";
                        $table.="<td>$row[6]</td>";
                        $table.="<td>$row[7]</td>";
                        $table.="<td>$row[8]</td>";
                        $table.="<td>$row[4]</td>";
                        // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                        $table.="</tr>";
                        // $table.=$row[0];
                    }
                    $table.="</table>";
                    echo $table;
                    ?>
                    </div>
            </div>
        </div>

    <!--             

    issue book -->
                <div class="rightinnerdiv">   
                <div id="issuebook" class="innerright portion" style="display:none">
                <Button class="greenbtn content-title" >ISSUE BOOK</Button><br><br>
                <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
                <label for="book">Choose Book:</label>
                <select name="book" >
                <?php
                $u=new data;
                $u->setconnection();
                $u->getbookissue();
                $recordset=$u->getbookissue();
                foreach($recordset as $row){

                    echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
            
                }            
                ?>
                </select>

                <label for="userselect">Select Student:</label>
                <select name="userselect" >
                <?php
                $u=new data;
                $u->setconnection();
                $u->userdata();
                $recordset=$u->userdata();
                foreach($recordset as $row){
                $id= $row[0];
                    echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
                }            
                ?>
                </select>
    <br><br>
                Days<input type="number" name="days"/>
                <br><br>

                <input type="submit" value="SUBMIT"/>
                </form>
                </div>
                </div>

                <div class="rightinnerdiv">   
                <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
                
                <Button class="greenbtn content-title" >BOOK DETAIL</Button>
    </br>
    <?php
                $u=new data;
                $u->setconnection();
                $u->getbookdetail($viewid);
                $recordset=$u->getbookdetail($viewid);
                foreach($recordset as $row){

                $bookid= $row[0];
                $bookimg= $row[1];
                $bookname= $row[2];
                $bookdetail= $row[3];
                $bookauthour= $row[4];
                $bookpub= $row[5];
                $branch= $row[6];
                $bookprice= $row[7];
                $bookquantity= $row[8];
                $bookava= $row[9];
                $bookrent= $row[10];

                }            
    ?>

                <div class="book-detail-container" style="display: flex; justify-content: center; align-items: center; gap: 20px;">
                    <div>
                        <img width='250px' height='auto' src="uploads/<?php echo $bookimg?> "/>
                    </div>
                    <div class="book-details">
                        <p style="color:black"><u>Name of Book:</u> &nbsp&nbsp<?php echo $bookname ?></p>
                        <p style="color:black"><u>Name of Author:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
                        <p style="color:black"><u>Date of Published:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
                        <p style="color:black"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
                        <p style="color:black"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
                        <p style="color:black"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
                        <p style="color:black"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
                        <p style="color:black"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>
                    </div>
                </div>


                </div>
                </div>



                <div class="rightinnerdiv">   
                <div id="bookreport" class="innerright portion" style="display:none">
                <Button class="greenbtn content-title" >BOOK RECORD</Button>
                <?php
                $u=new data;
                $u->setconnection();
                $u->getbook();
                $recordset=$u->getbook();

                $table="<table style=' text-align: center; font-family: Arial, Helvetica, sans-serif;width: 100%;'><tr><th style='padding: 8px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th></tr>";
                foreach($recordset as $row){
                    $table.="<tr>";
                "<td>$row[0]</td>";
                    $table.="<td>$row[2]</td>";
                    $table.="<td>$row[7]</td>";
                    $table.="<td>$row[8]</td>";
                    $table.="<td>$row[9]</td>";
                    $table.="<td>$row[10]</td>";
                    $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View Book</button></a></td>";
                    // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
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
            

        
            <script>
            function openpart(portion) {
            var i;
            var x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            document.getElementById(portion).style.display = "block";  
            }
            </script>
        </body>
</html>