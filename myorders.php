<?php
include('bd.php');
$email=$_COOKIE['email'];


$res=mysqli_query($conn,"select  * from orders where 
employee_id='$email' order by order_id desc");
$st="";
$cnt=0;
echo <<<END
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
function cancel(oid)
{
//alert(pid);
var fd=new FormData();
fd.append('oid',oid);
 $.ajax({ 
                    url: 'orderCancel.php', 
                    type: 'post', 
                    data: fd, 
                    contentType: false, 
                    processData: false, 
                    success: function(response){ 
                       alert(response);
                     location.reload();
                      //$("#demo21").load("getConferenceInfo.php");
                      
                    }, 
                });
}


</script>

<table border>
<tr>
<th>Order ID</th>
<th>Product name</th>
<th>Godown Name</th>
<th>Order Date Time</th>

<th>Cancel</th>
</tr>
END;
while($row=mysqli_fetch_array($res))
{
  $order_id=$row['order_id'];
  $product_id=$row['product_id'];
  $res1=mysqli_query($conn,"select  * from products where 
product_id='$product_id'");
  if($row1=mysqli_fetch_array($res1))
  {
     $pname=$row1['productname'];
  }
  $gname=$row['Godown_name'];
  $odt=$row['odt'];
  
 echo <<<END
<tr>
  <td>$order_id</td>
  <td>$pname</td>
  <td>$gname</td>
  <td>$odt</td>
  

  <td><i class="fa fa-trash-o" style="font-size:24px;color:red" onclick=cancel('$order_id')></i></td>
</tr>
END;
}

?>