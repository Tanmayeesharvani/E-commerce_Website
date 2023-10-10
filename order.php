<?php
   include("bd.php");
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "DB commands";

   $conn = mysqli_connect($servername,$username,$password,$dbname);

 $id = $_POST['id'];
 $email = $_COOKIE['email'];
 $godown = $_POST['GodownName'];
 
date_default_timezone_set('Asia/Calcutta');
$odt=date('Y-m-d H:i:s');
 $sql = "insert into orders(product_id,employee_id,Godown_name,odt) values('$id','$email','$godown','$odt')";
 echo $sql;
 if(mysqli_query($conn, $sql))
    {
        echo "<script>alert('Order Success')</script>";
        header("refresh:1;url=productlist.php");
    }
    else{
        echo "<script>alert('Order Unsuccesfull')</script>";
        //header("refresh:1;url=login.html");
    }
?>