<?php
include 'connect.php';
session_start();
 if($_POST)
    {
 $name=$_POST["name"];
$email = $_POST["email"];
$number = $_POST["tel"];
$pass = $_POST["password"];
$cpass = $_POST["cpassword"];
$or = $_POST["orgn"];
$sq="insert into register(uname,tel,email,password,cpassword,org)values('$name','$number','$email','$pass','$cpass','$or')";
$e=mysqli_query($con,$sq);
}
if($sq)
{
    $type='user';
    $uname = $_POST["name"];
    $password=$_POST["password"];
    $q="insert into login(usertype,username,password)values('$type','$uname','$password')";
    mysqli_query($con,$q);

        }

    ?>
<script>
    alert("Successfully Registered");
    window.location="signin.html";
</script>
