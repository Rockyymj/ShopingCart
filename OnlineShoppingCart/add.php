    <?php
     session_start();
 ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$count=1;
     ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- Designed by Jinson Zhang -->

<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
	  <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping cart</title>

<script language="javascript">
function blockShoppingCart(){
console.log("gg");
parent.document.getElementById("Left").src="Right_bottom.html";
}

function decideIfZero(){
if (document.getElementById("tbody").innerHTML==""){
return true;
}
else{
	return false;
}
}

function clearTest()
{
	document.getElementById("total_cost").innerHTML="";
	document.getElementById("quantity").innerHTML="";
	document.getElementById("tbody").innerHTML="";
	var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.open("GET","clear.php",true);
xmlhttp.send();
	}


function checkout()
{
	if (decideIfZero()==true)
	{
               window.alert("Your shopping cart is empty, please select something!");
                return false;        
	}
	else
	{ 
		return true;

	}
}
</script>
<style>
table  {
	background: #99f;
	color:#fff;
	text-align:left;
	font-size:12px;
	border-spacing: 4px;
	position: relative;
	
}
table a, table, tbody, tfoot, tr, th, td {
	font-family: Verdana, arial, helvetica, sans-serif;
}
table, {
	border-left:3px solid #567;
	border-right:3px solid #000;
	padding: 3px;
}
table a {
	text-decoration: none;
	background: inherit;
	color: #ccf;
	font-weight: bold;
}
table a:link {
	text-decoration: none;
}
table a:visited {
	background: inherit;
	color: #66c;
	text-decoration: line-through;
}
table a:hover {
	background: inherit;
	color: #eef;
	position: relative;
	top: 1px;
	left: 1px;
	text-decoration: none;
}
table caption {
	border-top:1px solid #ddf;
	border-left:1px solid #ddf;
	border-right:1px solid #669;
	border-bottom:1px solid #669;
	text-align: left;
	padding: 3px;
	color: #ccf;
	background: #99f;
	font-family: georgia, "times new roman", serif;
	font-size:20px;
	font-weight:bold;
}
table, td, th {
	margin:0px;
	padding:3px;
	border-left:1px solid #ddf;
	border-right:1px solid #669;
	border-bottom:1px solid #669;
}
td, th {
	border-top:1px solid #ddf;
	border-left:1px solid #ddf;
	border-right:1px solid #669;
	border-bottom:1px solid #669;
}
tr.odd {
	color: inherit;
	background: #88e;
}
ht:bold;
		color:#592C16;
		padding: 16px 9px;
		
	}
</style>
  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
</head>
<body>
<center>
  <h1 style="display: inline-block;height: 50px;width: 300px;line-height: 50px; background-color: #f3561e;color: #fff; font-style: italic;
    font-weight: bold;text-align: center; position: relative;  margin-left: 200px;margin-right: 200px; border-radius: 15px;" class="animated tada">
    Shopping Cart
  </h1>
<table width=90% class="animated bounceInDown">
	<thead><tr><td><b>Product name</b></td><td><b>Unit price</b></td><td><b>Unit quantity</b></td><td><b>Required quantity</b></td><td><b>Total cost</b></td></tr></thead><tbody id="tbody">
<?php
if(!isset($_SESSION['array_product_name'])){
echo "<tr>";
echo "<td>";
echo $_SESSION['product_name'];
echo "</td>";
echo "<td>";
echo "$".$_SESSION['unit_price'];
echo "</td>";
echo "<td>";
echo $_SESSION['unit_quantity'];
echo "</td>";
echo "<td>";
echo $_POST['quantity'];
echo "</td>";
echo "<td>";
echo "$".$_SESSION['unit_price']*$_POST['quantity'];
echo "</td>";
echo "</tr>";

$array_product_id=array();
$array_product_name=array();
$array_unit_price=array();
$array_unit_quantity=array();
$array_quantity=array();
$array_total_cost=array();


$array_product_id[]=$_SESSION['product_id'];
$array_product_name[]=$_SESSION['product_name'];
$array_unit_price[]=$_SESSION['unit_price'];
$array_unit_quantity[]=$_SESSION['unit_quantity'];
$array_quantity[]=$_POST['quantity'];
$array_total_cost[]=$_SESSION['unit_price']*$_POST['quantity'];

$_SESSION['array_product_id']=$array_product_id;
$_SESSION['array_product_name']=$array_product_name;
$_SESSION['array_unit_price']=$array_unit_price;
$_SESSION['array_unit_quantity']=$array_unit_quantity;
$_SESSION['array_quantity']=$array_quantity;
$_SESSION['array_total_cost']=$array_total_cost;


}
else if(isset($_SESSION['array_product_name'])){
	if(end($_SESSION['array_product_id'])!=$_SESSION['product_id']){
	$_SESSION['array_product_id'][]=$_SESSION['product_id'];
	$_SESSION['array_product_name'][]=$_SESSION['product_name'];
	$_SESSION['array_unit_price'][]=$_SESSION['unit_price'];
	$_SESSION['array_unit_quantity'][]=$_SESSION['unit_quantity'];
	$_SESSION['array_quantity'][]=$_POST['quantity'];
	$_SESSION['array_total_cost'][]=$_SESSION['unit_price']*$_POST['quantity'];
	$count = count($_SESSION['array_product_name']);

	for($i=0;$i<$count;$i++){
		echo "<tr>";
		echo "<td>".$_SESSION['array_product_name'][$i]."</td>";
		echo "<td>".$_SESSION['array_unit_price'][$i]."</td>";
		echo "<td>".$_SESSION['array_unit_quantity'][$i]."</td>";
		echo "<td>".$_SESSION['array_quantity'][$i]."</td>";
		echo "<td>".$_SESSION['array_total_cost'][$i]."</td>"."</tr>";
	}
	}
	else if(end($_SESSION['array_product_id'])==$_SESSION['product_id']){
		$count = count($_SESSION['array_product_name']);
		$now_quantity=end($_SESSION['array_quantity'])+$_POST['quantity'];
		$now_total_cost=$now_quantity*$_SESSION['unit_price'];
		array_pop($_SESSION['array_quantity']);
		array_pop($_SESSION['array_total_cost']);
		$_SESSION['array_quantity'][]=$now_quantity;
		$_SESSION['array_total_cost'][]=$now_total_cost;
	for($i=0;$i<$count;$i++){
		echo "<tr>";
		echo "<td>".$_SESSION['array_product_name'][$i]."</td>";
		echo "<td>".$_SESSION['array_unit_price'][$i]."</td>";
		echo "<td>".$_SESSION['array_unit_quantity'][$i]."</td>";
		echo "<td>".$_SESSION['array_quantity'][$i]."</td>";
		echo "<td>".$_SESSION['array_total_cost'][$i]."</td>"."</tr>";
	}
}
}
?>
</tbody>
<tr><td style="color: #fff; font-style: italic; font-weight: bold " colspan = "3">Number of products</td><td style="color: #fff; font-style: italic; font-weight: bold; " id="quantity" align = "left" colspan = "3">
	<?php
	echo $count;
	?>
</td></tr><tr><td colspan = "3" style="color: #fff; font-style: italic; font-weight: bold ">Shopping cart total</td><td id="total_cost"  align = "left" colspan = "3" style="color: #fff; font-style: italic; font-weight: bold;">
		<?php
	$number=0;
	for($i=0;$i<count($_SESSION['array_quantity']);$i++){
		$number=$number+$_SESSION['array_total_cost'][$i];
	}
		$_SESSION['total_cost_for_details']=$number;
	echo $number;

	?>
</td></tr></tfoot></table>
<table class="animated bounceInDown" style="background-color: transparent; border-spacing: 0; padding: 0; " border="0">
	<tr>
		<td>
		<input value="Clear" type="submit" onClick="console.log('this', this, 'window', window  ); clearTest();"></input>
		</td>
		<td>
			<form action="checkout.php"  method="post" target="top_right" >
			<input type="submit" name="submit" value="Checkout" onClick="blockShoppingCart() ;return checkout()">
			</form>
		</td>
</tr>
</table>
</center>
</body>
</html> 