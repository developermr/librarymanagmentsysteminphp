<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="css/create_acc.css">
</head>
<body>
    <div class="container">
        <h1>Create account</h1>
        <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
            <input type="text" name="addname" placeholder="Full Name"/>

            <br>

            <input  type="text" name="addgrade" placeholder="Grade level and Section"/>

            <br>

            <input type="email" name="addemail" placeholder="Email"/>
            
            <br>
            
            <input type="password" name="addpass" placeholder="Password"/>
        
            <br>

            <label for="gender">Gender:</label>
            
            <select name="gender" >
                <option value="MALE">MALE</option>
                <option value="FEMALE">FEMALE</option>
            </select>


            <label for="type">Choose type:</label>
        
            <select name="type" >
                <option value="STUDENT">STUDENT</option>
                <option value="TEACHER">TEACHER</option>
            </select>


            <br>
            <input class="signinBtn" type="submit" value="Sign Up"/>
        </form>
        <p>Have an account? <a href="index.php">Login Here</a>
        </p>
    </div>
</body>
</html>