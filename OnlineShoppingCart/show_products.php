    <?php
     session_start();
     $servername = "rerun.it.uts.edu.au";
$username = "potiro";
$password = "pcXZb(kL";
$dname = "poti";
 
// 创建连接
$conn = mysqli_connect($servername,$username,$password,$dname);
 
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query=$_SERVER["QUERY_STRING"];
$product_id_array=str_split($query,11);
$product_id=$product_id_array[1];
$query_string="SELECT * FROM products where product_id = $product_id";
$result = mysqli_query($conn,$query_string);
  $row = mysqli_fetch_assoc($result);
    $_SESSION['product_id']=$row[product_id];
     $_SESSION['product_name']=$row[product_name];
     $_SESSION['unit_price']=$row[unit_price];
     $_SESSION['unit_quantity']=$row[unit_quantity];
     $_SESSION['in_stock']=$row[in_stock];
     ?>
<html>
<head>
<title>show products</title>
<style>
table  {
    background: #99f;
    color:#fff;
    text-align:left;
    font-size:12px;
    border-spacing: 4px;
    position: relative;
    top: 50px;
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
<script type="text/javascript">
function check_quatity(quantity)
{
    qua_num=document.quantityform.quantity.value;
    if (qua_num == "" || qua_num == 0)
      {
          window.alert("Please enter the required quantity");
          return false;
          
      }
    if (qua_num > quantity)
      {
          window.alert("The required quantity is unavaliable");
          return false;
          
      }
    if (isNaN(qua_num))
      {
          window.alert("Please enter a valid quantity");
          return false;
          
      }

     return true;
}
</script>
  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
</head>
<body>
<center>
  <h1 style="display: inline-block;height: 50px;width: 300px;line-height: 50px; background-color: #f3561e;color: #fff; font-style: italic;
    font-weight: bold;text-align: center; position: relative; top: 40px; margin-left: 200px;margin-right: 200px; border-radius: 15px;" class="animated tada">
    Product Details
  </h1>
<table  width=90% class="animated rollIn"><tr>
<td>Product id</td>
<td>Product name</td>
<td>Unit price</td>
<td>Unit quantity</td>
<td>In stock</td>
<td>Quantity</td>
</tr>
<tr>
    <?php
    echo "<td>$row[product_id]</td>";
    echo "<td>$row[product_name]</td>";
    echo "<td>$row[unit_price]</td>";
    echo "<td>$row[unit_quantity]</td>";
    echo "<td>$row[in_stock]</td>";
    if (isset($_SESSION['product_name'])){
    }
    else{
      echo "no session";
    };
mysqli_close($conn);
?>
<td align="center"><form action="add.php" method="post" name="quantityform" target="bottom_right" onsubmit="return check_quatity(
<?php
echo $row[in_stock];
?>
)"><input name="quantity" type="text" size="3" ><input type="submit" name="add" value="add" ></form></td>
</tr>
</table>
</center>
</body>

</html> 

