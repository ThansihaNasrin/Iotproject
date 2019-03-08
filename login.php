<?php
include "connect.php";
session_start();
if($con)
{
    if($_POST)
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $strQuery="select usertype from login where username='$username' and password='$password'";
        $res1=mysqli_query($con,$strQuery);


         if(mysqli_num_rows($res1)>0)
        {
            $row=mysqli_fetch_array($res1);
             $_SESSION['id']=$username;
            $type=$row['usertype'];
            $email=$row['username'];
        
            $lid=$row['id'];
            $_SESSION['id']=$lid;
            $_SESSION['usertype']=$type;
            $_SESSION['username']=$email;
        
            if($type=='user')
            {
                $_SESSION['id']=$username;
                header("location:customerhome.html");
            }
            
            elseif($type=='admin')
             {
                  $_SESSION['id']=$username;
                 header("location:adminhome.html");                     
           
             }
             

        }
    }
        else
        {

            ?>
        <script type="text/javascript">
            alert("Your username or password doesn't exist");
            window.location="login.html";
        </script>
       <?php
    }
}
?>