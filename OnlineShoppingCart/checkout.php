     <?php
     session_start();
     ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
 <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 <style>
  .horizonal{padding-top: 20px}
  .span{display: inline-block ;width: 100px; text-align: right; padding-right: 10px;font-weight: bold;font-style: italic}
  input{width: 200px;}
 </style>
   <script >
    function checkIfValid(){
      var inputsValue=document.getElementsByClassName("check");
      for(i=0;i<inputsValue.length;i++){
        if(inputsValue[i].value==""){
          alert("Some Information Missing!");
          return false;
        }
      }
      return true;
    }
  </script>
</head>
<body>
<div id="div" style="position: relative; text-align: center">
 <form method="post" action="email.php" target="top_right">
 <div class="horizonal">
   <h2 style="font-style: italic;font-weight: bold;position: relative;bottom: 25px; left: 20px;">Delivery details</h2>

  <span class="span">
   Name:
  </span>
  <input class="check" name="name" type="text" placeholder="Please input your Name"><span style="color: red;margin-left: 4px;">*</span>
 </div>
  <div class="horizonal">
  <span class="span">
   Address:
  </span>
   <input class="check" name="address" type="text" placeholder="Please input your address"><span style="color: red;margin-left: 4px;">*</span>
  </div>
  <div class="horizonal">
  <span class="span">
   Suburb:
  </span>
   <input class="check" name="suburb" type="text" placeholder="Please input your suburb"><span style="color: red;margin-left: 4px;">*</span>
  </div>
  <div class="horizonal">
  <span class="span">
   State:
  </span>
   <input class="check" name="state" type="text" placeholder="Please input your state"><span style="color: red;margin-left: 4px;">*</span>
  </div>
  <div class="horizonal">
  <span class="span">
   Country:
  </span>
   <input class="check" name="country" type="text" placeholder="Please input your country "><span style="color: red;margin-left: 4px;">*</span>
  </div>
  <div class="horizonal">
  <span class="span">
   E-mail:
  </span>
   <input class="check" name="email" type="email" placeholder="Please input your E-mail"><span style="color: red;margin-left: 4px;">*</span>
  </div>
  <div class="horizonal" style="position: relative;left: 30px;bottom:10px;">
     <button type="submit" onclick="return checkIfValid(); console.log('this',this,'window',window)" id="purchase" class="btn btn-danger">Purchase</button>
  </div>
 </form>

</div>
</body>
</html>
