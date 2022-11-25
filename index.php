<?php
if (isset($_POST['btn'])){
session_start();
//This is the global variables in the code
$_SESSION['name'] = $_POST['name'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['company'] = $_POST['company'];
$_SESSION['otp'] = rand(1111, 9999);
//This is the local variable in the code
$name = $_SESSION['name'];
$nm = $_SESSION['phone'];
$city = $_SESSION['city'];
$company = $_SESSION['company'];
$otp = $_SESSION['otp'];
$phone = "91".$nm;
//Database credentials to mysql
$servername = "localhost";
$username = "root";
$password = "root";
$db = "otp";
//Database connection
$conn = new mysqli($servername, $username, $password, $db);
//Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM otp WHERE phone_num = '$phone'";

$result = $conn->query($query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<script>
        window.location.href = 'https://firebasestorage.googleapis.com/v0/b/connect-karnataka.appspot.com/o/test.pdf?alt=media&token=f03d82a4-3456-4406-b886-335aafef8b63';
        </script>";
    } else {
        //This is the sms api
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.koreroplatforms.com/v1/sms/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n  \"sender_id\": \"CNTKAR\",\n  \"type\": \"text\",\n  \"message\": \"[%OTP%] is the OTP for login/download to Connect Karnataka - By IND Whales. Do not share it with anybody.\",\n  \"recipient\": [\n    {\n      \"to\": [\n        \"$phone\"\n      ],\n      \"variables\": {\n        \"OTP\": \"$otp\"\n      }\n    }\n  ],\n  \"country_specific\": [\n    {\n      \"country\": \"91\",\n      \"entity_id\": \"1201166540617449751\",\n      \"template_id\": \"1207166678377936202\"\n    }\n  ]\n}",
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "apikey: eyJ4NXQiOiJOVGRtWmpNNFpEazNOalkwWXpjNU1tWm1PRGd3TVRFM01XWXdOREU1TVdSbFpEZzROemM0WkE9PSIsImtpZCI6ImdhdGV3YXlfY2VydGlmaWNhdGVfYWxpYXMiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJhcGltX3B1YkBjYXJib24uc3VwZXIiLCJhcHBsaWNhdGlvbiI6eyJvd25lciI6ImFwaW1fcHViIiwidGllclF1b3RhVHlwZSI6bnVsbCwidGllciI6IlVubGltaXRlZCIsIm5hbWUiOiJzcmliaGFneWFsYWtzaG1pLWFwcG9uZSIsImlkIjo5MSwidXVpZCI6Ijk4ZGM5OWQxLWYzNTItNDAzNy05YWU3LTFkMjAyYzRhYTIwNiJ9LCJpc3MiOiJodHRwczpcL1wvMTAuMC4xLjIyMjo5NDQzXC9vYXV0aDJcL3Rva2VuIiwidGllckluZm8iOnsiVW5saW1pdGVkIjp7InRpZXJRdW90YVR5cGUiOiJyZXF1ZXN0Q291bnQiLCJncmFwaFFMTWF4Q29tcGxleGl0eSI6MCwiZ3JhcGhRTE1heERlcHRoIjowLCJzdG9wT25RdW90YVJlYWNoIjp0cnVlLCJzcGlrZUFycmVzdExpbWl0IjowLCJzcGlrZUFycmVzdFVuaXQiOm51bGx9fSwia2V5dHlwZSI6IlBST0RVQ1RJT04iLCJwZXJtaXR0ZWRSZWZlcmVyIjoiIiwic3Vic2NyaWJlZEFQSXMiOlt7InN1YnNjcmliZXJUZW5hbnREb21haW4iOiJjYXJib24uc3VwZXIiLCJuYW1lIjoic21zIiwiY29udGV4dCI6IlwvdjFcL3NtcyIsInB1Ymxpc2hlciI6ImFwaW1fcHViIiwidmVyc2lvbiI6InYxIiwic3Vic2NyaXB0aW9uVGllciI6IlVubGltaXRlZCJ9XSwicGVybWl0dGVkSVAiOiIiLCJpYXQiOjE2NTcyNjA2OTEsImp0aSI6ImQyNTkwNzNhLWI0NjUtNDRmNy04NmYyLTc1NjQyZjM0NmVkMCJ9.h8pRN_KRq8VRlfr-DL-2Dn4gLiKxm3XxYqb_GUJ_SqlQY0k-IMVyxLrVA_XHCziJPzwM5vy2-_ZycghxBUeAIWSuRAC6gktJUW-5WPEFlaXgeuTEzzv_bhuiYqb3w0nZR_4fmHQcTs6DsR9ka96xAdDt0xxuLZ5oJN7RrsO_JypkyKP26jlubFgj2cmHRkgQlAciwiafj6ASxkjwW0l8rzAzUepxEixoOEQm0NdQHmArs4vv-RuQPLR2LCB9J_Je5oOYhWrkBusp5EuB4jKh7sDHiCKNCNL_Qn2U13F3JJzBHMUfKe9JLyuDvjgY6wYlIlsyQV5e0VdpXsQWNU_osA=="
        ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            header("Location: verification.php");
        }
        //redirection to verification page
    }
} else {
    echo 'Error: ' . mysqli_error();
}

// close connection
mysqli_close($conn);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connect Karntaka</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <img src="Exhibitor_Details.jpg" width="100%">
    <div class="mt-5">
        <div class="container">
            <form method="post" class="mt-5">
                <input type="text" name="name" placeholder="Name" required class="form-control">  <br>
                <input type="text" name="phone" placeholder="Phone Number" required class="form-control"> <br>
                <input type="text" name="city" placeholder="City" required class="form-control"> <br>
                <input type="text" name="company" placeholder="Compnany" required class="form-control"> <br>
                <input type="submit" name="btn" value="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>