<?php
 session_start();
$count=count($_SESSION['array_product_name']);
$to = $_POST['email'];         // 邮件接收者
$subject = "Grocery Store";           // 邮件标题
$message = "Hello, ".
$_POST['name'].".".
"<p>".
"Your older of Grocery Store has been confirmed!". "<p>".
"Your shopping delivery details are shown below:". "<p>".
"<table border='3'>".
"<tr>".
		"<td>Name</td>".
		 "<td>Address</td>".
		 "<td>Suburb</td>".
		 "<td>State</td>".
		 "<td>Country</td>".
"</tr>".
	"
		 <tr>
		 <td>".$_POST['name']."</td>
		 <td>".$_POST['address']."</td>
		 <td>".$_POST['suburb']."</td>
		 <td>".$_POST['state']."</td>
		 <td>".$_POST['country']."</td>
		 </tr>
		".
"</table>".
"Your shopping cart details are shown below:". "<p>".
"<table border='3'>".
"<tr>".
		"<td>Product name</td>".
		 "<td>Unit price</td>".
		 "<td>Unit quantity</td>".
		 "<td>Required quantity</td>".
		 "<td>Total Cost</td>".
"</tr>";
for($i=0;$i<$count;$i++){
	$message .=
	"
		 <tr>
		 <td>".$_SESSION['array_product_name'][$i]."</td>
		 <td>".$_SESSION['array_unit_price'][$i]."</td>
		 <td>".$_SESSION['array_unit_quantity'][$i]."</td>
		 <td>".$_SESSION['array_quantity'][$i]."</td>
		 <td>".$_SESSION['array_total_cost'][$i]."</td>
		 </tr>
		";
}
$message .=
"<tr>
<td>Number of products</td><td>".$count."</td><td></td><td>Shopping cart total</td><td>".$_SESSION['total_cost_for_details']."</td></tr>".
"</table>".
"<p>"."Hope you enjoy shopping with Grocery Shop!".
"<p>".
"Have a nice day!".
"<p>"."Yilun Chen" ; // 邮件正文
$from = "yilunChen@GroceryShop.com";   // 邮件发送者
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";        // 头部信息设置
$headers .= 'From:' .$from. "\r\n";

mail($to,$subject,$message,$headers);
  echo "Thank you for Shopping with Grocery Store!
The confirmation of your order has been sent to ".$_POST['email']."!";
?>