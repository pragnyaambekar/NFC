<?php
$con = mysqli_connect("localhost","root","","books") or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link rel="stylesheet" href="../login.css">
</head>

<body>
<!-- Navbar-->
<nav class="navbar  expand-lg">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../login.php" class="navbar-brand">BookMark</a>
            </div>
            <div id="myNavbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../about/about.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
                    <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="../signup/signup.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
        if(isset($_POST['submit'])){
            $name =mysqli_real_escape_string($con,$_POST['name']);
            $email =mysqli_real_escape_string($con,$_POST['email']);
            $phone =mysqli_real_escape_string($con,$_POST['phone']);
            $password =md5(md5((mysqli_real_escape_string($con,$_POST['password']))));

            $email_check = "select * from signup where email ='$email' ";
            $email_result = mysqli_query($con,$email_check);
            $email_count = mysqli_num_rows($email_result);
            if($email_count>0){
                echo"<center><h4>Email already exists try login <button><a href='../login.php'>Log in</a></button><h4></center>";
            }
            else{
                $insert_query ="insert into signup (name, email, phone, password) values ('$name', '$email', '$phone', '$password')";
                $insert_query_result = mysqli_query($con,$insert_query) or die(mysqli_error($con));
                echo"<center><h4>You have successfully registered,try login <button class='btn signup'><a href='../login.php'>Log in</a></button><h4></center>";
            }

        }

?>
    <!--Panel for signup-->
    <div class=" container form">
        <div class="row1">
            <form method="post" action="../signup/signup.php">
                <div class="panel-group">
                    <div class="panel media panel-primary">
                        <div class="panel-heading">
                            <center>
                                <h2> Sign up </h2>
                            </center>
                        </div>

                        <div class="panel-body">
                            <label for="name" class=" name form-label">Name:</label>

                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"
                                required>
                        </div>
                        <div class="panel-body">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                required>
                        </div>

                        <div class="panel-body">
                            <label for="phone" class="form-label">Phone number:</label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                placeholder="Enter your phone number" required>
                        </div>
                        <div class="panel-body">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password" pattern=".{6,}" required>
                        </div>
                        <center><button type="submit" class="btn" name="submit">Signup</button>
                            <h5>Have an account? <a href="../login.php">Log in</a> </h5>
                        </center>
                    </div>

                  
            </form>
        </div>
    </div>
    </div>
   
</body>

</html>
