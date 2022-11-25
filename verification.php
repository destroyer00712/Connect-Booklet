<?php
    if (isset($_POST['btn'])){
        session_start();
        //This is the global variable in the code
        $name = $_SESSION['name'];
        $nm = $_SESSION['phone'];
        $city = $_SESSION['city'];
        $company = $_SESSION['company'];
        $otp = $_SESSION['otp'];
        $phone = "91".$nm;
        //This is the local variable in the code
        $code = $_POST['code'];
        //Database credentials to mysql
        $servername = "localhost";
        $username = "xstrepfx_naman";
        $password = "Ashagana2014";
        $db = "booklet";
        //Database connection
        $conn = new mysqli($servername, $username, $password, $db);
        //Check connection
        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        if ($otp = $code) {
            //This is the sms api
            echo "<script>
            window.location.href = 'https://firebasestorage.googleapis.com/v0/b/connect-karnataka.appspot.com/o/test.pdf?alt=media&token=f03d82a4-3456-4406-b886-335aafef8b63';
            </script>";
            
            //saving the user detailes to the database

            $sql = "INSERT INTO `booklet`(`phone_num`, `name`, `city`, `company`) VALUES ('$phone','$name','$city','$company')";

            if ($conn->query($sql) === TRUE) {
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } else {
            echo"<script>
            alert('please enter the correct OTP')
            </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <title>Connect Karnataka</title>
</head>
<body>
<img src="Exhibitor_Details.jpg" width="100%">
    <div class="mt-5">
        <div class="container">
            <form method="post" class="mt-5">
                <input type="text" name="code" placeholder="Enter the OTP" required class="form-control"> <br>
                <input type="submit" name="btn" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>