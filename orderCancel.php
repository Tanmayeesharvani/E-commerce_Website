<?php
include('bd.php');
$oid=$_POST['oid'];
$res=mysqli_query($conn,"delete from orders where 
order_id=$oid");
echo "Order cancelled...";

?>