<?php
    include('bd.php');
    $uname=$_POST['email'];
    $password=$_POST['password'];
    //echo "$uname,$password";
    
    $sql="SELECT * FROM employee WHERE email='$uname' and password='$password'";
    
   // echo $sql;
   $res=mysqli_query($conn,$sql);
   if($row=mysqli_fetch_array($res))
    {
      setcookie("email", $uname, time() + (86400 * 30), "/"); // 86400 = 1 day
      echo "<script>alert('Login Successfull');</script>";
      header("refresh:1;url=productlist.php");
    }
    else
    {
      echo "<script>alert('Login Unsuccessfull');</script>";
      header("refresh:1;url=login.html");
    }
  ?>