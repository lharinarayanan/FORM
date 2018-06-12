 <?php 
   // define variables and set to empty values
  $name = $email = $sex = $address = $tel = $pass=$city="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
          $name = test_input($_POST["NAME"]);
          $pass = test_input($_POST["pass"]);
          $email = test_input($_POST["email"]);
          $tel = test_input($_POST["quantity"]);
          $city = test_input($_POST["City"]);
          $sex = test_input($_POST["gender"]);
          $address = test_input($_POST["address"]);

 /*if(!empty($_POST['hobies'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['check_list']);
//echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected) {
echo "<p>".$selected ."</p>";
}
 $hobby = test_input($_POST["hobies"]);
*/                                            }

          function test_input($data) {
               $data = trim($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
                          }
                          if(!empty($_POST['hobies'])) {
// Counting number of checked checkboxes.
                                                  //$checked_count = sizeof($_POST['hobies']);
                                                 // echo "You have selected following "." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
                                                  $box= $_POST['hobies']; 
                                                 $check=" ";
                                                 $hobby=" ";
                                                 $h=0;
                                           foreach ($box as $check) {
                                             $hobby.=$check.",";
                                              if(strcmp($check,"Playing Cricket")==0)
                                                $h=10*$h+1;
                                              if(strcmp($check,"Reading books")==0)
                                                $h=10*$h+2;
                                              if(strcmp($check,"Coding")==0)
                                                $h=10*$h+3;
                                              if(strcmp($check,"Watching series and movies")==0)
                                                $h=10*$h+4;
                                         }
                                       }
                                       $hobby= trim($hobby);
               $hobby = stripslashes($hobby);
               $hobby = htmlspecialchars($hobby);
         /*                            
echo "Your input is received as "."<br>"."Name : ".$name;
echo "<br>"."Password is : ".$pass;
echo "<br>"."Email is : ".$email;
echo "<br>"."Telephone nnumber is : ".$tel;
echo "<br>"."Address is : ".$address;
echo "<br>"."Gender is : ".$sex;
echo "<br>"."City is : ".$city;
echo "<br>Your details as stored in database will be";
*/
    $dbhost='localhost';
    $dbuser='root';
    $conn= mysqli_connect($dbhost,$dbuser);
     if(!$conn)
    {
	    die('could not connect'.mysql_error());
    }
     mysqli_select_db($conn,'hari_db');
       /*if(!$dbsel)
     {
	      die('could not select db'.mysql_error());
      }*/
      $hashed_password = hash('sha512', $pass);
        $sql="INSERT INTO student(user,password,phone,email,city,hobby) VALUES ('$name','$hashed_password','$tel','$email','$city','$h')";
          $retval=mysqli_query($conn,$sql);
          if(!$retval)
         {
	         die("<br>could not insert data".mysqli_error($conn));
         }
            mysqli_close($conn);
          ?>
              <!doctype html>
               <html lang="en">
	                <head>
                      <meta charset="utf-8" content="ThinksynQ Form" description="Basic form">
                      <title>ThinksynQ Registration</title>
   
                   <style>
                       .content {
                                  max-width: 1500px;
    clear: both;
    margin: auto;
}
input[type=submit] {
    width: 20%;
    background-color: rgb(10,10,190);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=reset] {
    width: 20%;
    color: purple;
    padding: 10px 10px;
    margin: 5px 0;
    border: none;
    border-radius: 2px;
    cursor: pointer;
}
input[type=text] {
    width: 20%;
    color: black;
    padding: 10px 10px 10px 10px;
    margin: 10px 0;
    border: none;
    height: 
}
input[type=password]{
	width: 20%;
	height: 16px;
	color:black;
	padding: 10px 10px;
	margin: 7px 0;
	border:none;
	border-radius: 2px; 
}
input[type=list]{
	width: 20%;
	height: 15px;
	color:black;
	padding: 10px 10px;
	margin: 8px 0;
	border:none;
	border-radius: 3px; 
}
input[type=email]{
	width: 20%;
	height: 16px;
	color:black;
	padding: 10px 10px;
	margin: 7px 0;
	border:none;
	border-radius: 2px; 
}
input[type=tel]{
  width: 20%;
  height: 12px;
  color:black;
  padding: 10px 10px;
  margin: 7px 0;
  border:none;
  border-radius: 2px; 
}
body
{
background-color: rgba(10,50,145);
}
h1
{
text-align: center;
color: rgb(170,10,60); 
text-shadow: 2px 2px 8px;
}
p.line{
	border-style: ridge;
border-width: 2px;
border-color: rgb(180,180,180);
}
h2
{
text-align: left;
color: rgb(160,10,20); 
text-shadow: 2px 2px 8px;
}
h3{
color: pink;
text-shadow: 2px 2px 8px;	
}

</style>
<!--
<script>
	function validateForm() {
    var x = document.forms["myForm"]["NAME"].value;
    var y = document.forms["myForm"]["pass"].value;
    var z = document.forms["myForm"]["conpass"].value;
    var a = document.forms["myForm"]["quantity"].value;
   // var r=/^[A-Za-z0-9]+$/;
    //var r=/[^0-9]/;  
    //ar q=/^[a-zA-Z\s]+$/;
    //var w=/[^0-9|^a-z|^A-Z]/;
    var i=0;
    var j=x.length;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
   for( ;i<j;i++)
    {
        if((x.charAt(x[i])>="A"&&x.charAt(x[i])<="Z")||(x.charAt(x[i])>="a"&&x.charAt(x[i])<="z"))
        {
          continue;
        }
        else
        {
        alert("your name can have only alphabets");
           return false;}
    }

    if(y==""||z=="")
    {
    	alert("Password can't be empty");
    	return false;
    }
   if(y!=z)
   {
   	alert("Password should be equal");
    	return false;
   }
   var i=0;
   var j=y.length;
   for( ;i<j;i++)
    {
        if((y.charAt(x[i])>="A"&&y.charAt(x[i])<="Z")||(y.charAt(x[i])>="a"&&y.charAt(x[i])<="z")||(y.charAt(x[i])>="0"&&y.charAt(x[i])<="9"))
        {
          continue;
        }
        else
        {
        alert("your password can have only alphabets or numbers");
           return false;}
    }

  // if(!(y.value.match(w)))
//{
//alert('your password can have only alphanumeric characters');
//return false;
//}
var i=0;
   var j=a.length;
   for( ;i<j;i++)
    {
        if((a.charAt(x[i])>="0"&&a.charAt(x[i])<="9"))
        {
          continue;
        }
        else
        {
        alert("Enter telephone number only");
           return false;}
    }


   if(a="")
   {
   	alert("phone number cannot be empty");
   	return false;
   }
  //if(!(a.value.match(r)))
//{
//alert('Your telephone number can have numbers alone');
//return false;
//}   

   else 
   {
   	alert("details accepted");
   	return true;
   }


}

	</script>
-->
</head>
<body>
  <div align="center">
  <div class="content">
	<a href="https://thinksynq.in/">
  <img src="logo-thinksynq-1.png" align="left">
 <img src="logo-thinksynq-1.png" align="right">
</a>
 <h1>ThinksynQ Registration </h1>
 <h2>The best place to learn and advance forward<br><br><div id="abc" style="text-align: center;"   >Your details have been received as follows </div></h2>
 <?echo $name;
 ?>
<!--<p id="line"></p>-->
<!--
<form name="myForm"  id="likr"  autocomplete="off" >
	<label for="name" id="usrid" style="font-size: 25px "  ><strong>Your Name :</strong></label>
<input type="text" name="NAME" required placeholder="Your Name" style="align-content: center; ">
<br><br>
<label for="pass" style="font-size: 25px"><strong>Password :<br></strong></label>
<input type="password" name="pass"  required placeholder="Password">
<br><br>
<label for="conpass" style="font-size: 25px"><strong>Confirm Password :<br></strong></label>
<input type="password" name="conpass" required placeholder="Confirm Password">
<br><br>
<label for="email" style="font-size: 25px"><strong>Email :<br></strong></label>
<input type="email" name="email" required placeholder="Write your mail id">
<br><br>
<label for="sex" style="font-size: 25px"><strong>Phone number :<br></strong>
<input type="tel" style="height: 20px "  name="quantity"  maxlength=10 placeholder="Write your phone number" required>
<br><br>
<label for="address" style="font-size: 30px" ><strong>Address :<br></strong></label>
<input type="address" name="address" height="20px" width="30px" required="" >
<textarea name="address" rows="10" cols="35" required placeholder="address" style="vertical-align: middle;">
</textarea>
<br><br>
<label for="city" style="font-size: 25px text-color:rgb(128,0,0);"><strong>City :<br></strong> </label>
<input  type="list" list="City" name="City" required placeholder="city" style="width: 20%">
<datalist id="City" >
    <option value="Chennai">
    <option value="Tiruchirapalli">
    <option value="Coimbatore">
    <option value="Madurai">
    <option value="Salem">
    <option value="Dindigul">
    <option value="Tanjore">
    <option value="Mayiladuthurai">
    <option value="Erode">
    <option value="Kumbakkonam">
    <option value="Villupuram">
    <option value="Tenkasi">
    <option value="Tirunelveli">
    <option value="Thoothukoodi">
    <option value="Vellore">
    <option value="Cuddalore">
    <option value="Pondicherry">
    <option value="Pollachi">
    <option value="Chidambaram">
    <option value="Sirkazhi">
    <option value="Kanyakumari">
    <option value="Nagercoil">
    <option value="Nagapattinam">
    <option value="Kaaraikkal">
    <option value="Mannargudi">
    <option value="other">	
  </datalist>
  <br><br>
  <label for="sex" style="font-size: 25px"><strong>Sex :<br></strong></label>
<input type="radio" name="gender" value="male" >&nbsp;&nbsp;&nbsp;Male<br>
<input type="radio" name="gender" value="female">Female<br><br>
<label for="sex" style="font-size: 25px"><strong>Hobbies :<br></strong></label>
<input type="checkbox" name="hobies" value="Playing">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Playing<br><br>
<input type="checkbox" name="hobies" value="Reading">Reading books<br><br>
<input type="checkbox" name="hobies" value="Talking">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Coding<br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="hobies" value="other">&nbsp;Watching series and movies<br><br>
<input type="text" naame="others" placeholder="If any other hobby please specify here"><br><br>
<br><br>
<input type="reset"><br><br>
</form>
	
	<h3>For further details contact <strong>Mr.NS Kiran Kumar</strong> Assistant Manager Development ThinksynQ at<strong> 9003213292</strong> or mail to support@thinksynq.in</h3>
	<h4 align="right">ThinksynQ Pvt. Limited</h4>-->
  <table>
    <col width="200">
    <col width="50">
    <col width="600">
    <tr>
     <td><label for="name" id="usrid" style="font-size: 25px "  ><strong>Your Name</strong></label></td>
    <td><strong>:</strong></td>
    <td><strong style="font-size: 22px">
      <?php echo $name;?></strong></td>
   </tr>
    <tr>
     <td><label for="pass" style="font-size: 25px"><strong>Password<br></strong></label></td>
     <td><strong>:</strong></td>
     <td><strong style="font-size: 22px"><?php echo $pass;?></strong></td>
    </tr>
    <tr>
    <tr>
    <td><label for="email" style="font-size: 25px"><strong>Email<br></strong></label></td>
    <td><strong>:</strong></td> 
     <td><strong style="font-size: 22px"><?php echo $email;?></strong></td>
    </tr>
     <tr>
     <td><label for="tel" style="font-size: 25px"><strong>Phone number<br></strong></label></td>
     <td><strong>:</strong></td>
     <td><strong style="font-size: 22px"><?php echo $tel;?></strong></td>
    </tr>
     <tr>
     <td><label for="address" style="font-size: 30px" ><strong>Address<br></strong></label></td>
<!--<input type="address" name="address" height="20px" width="30px" required="" >-->
     <td><strong>:</strong></td>
      <td><strong style="font-size: 22px"><?php echo $address;?></strong> </td>
      </tr>
     <tr>
      <td><label for="city" style=" text-color:rgb(128,0,0);"><strong style="font-size: 25px">City<br></strong> </label></td>
      <td><strong>:</strong></td>
      <td><strong style="font-size: 22px"><?php echo $city;?></strong>
            </td></tr>
  <tr>
  <td><label for="sex" style="font-size: 25px"><strong>Sex<br></strong></label></td>
  <td><strong>:</strong></td>
  <td><strong style="font-size: 22px"><?php echo $sex;?></strong></td></tr><br><br>
  <tr>
  <td><label for="hobbies" style="font-size: 25px"  style="vertical-align: middle;" ><strong>Hobbies<br></strong></label></td>
  <td><strong>:</strong></td><br><br>
  <td><strong style="font-size: 22px"><?php 
                                           if(!empty($_POST['hobies'])) {
// Counting number of checked checkboxes.
                                                  //$checked_count = sizeof($_POST['hobies']);
                                                 // echo "You have selected following "." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
                                                  $box= $_POST['hobies']; 
                                                 $check=" ";
                                           foreach ($box as $check) {
                                              echo $check.",";

                                         }
                                        /* foreach($hobby as $selected) {
                                          echo "<p>".$selected ."</p>";
                                           }*/}
                                      ?>
                                        
</strong></td>
  </tr>
</table>
<!--
<input type="reset"><br><br>
 <input type="submit"  value="View">
 
 <button type="Submit" form="myForm" value="Submit" onclick="return validateForm()" style="width: 20%;
    background-color: rgb(10,180,90);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;">Submit</button>
  -->
<button onclick="document.location.href='finaldisplay.php'" style="width: 20%;
    background-color: rgba(200,10,20,0.4);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer">View all records</button>


  
  <h3>For further details contact <strong>Mr.NS Kiran Kumar</strong> Assistant Manager Development ThinksynQ at<strong> 9003213292</strong> or mail to support@thinksynq.in</h3>
  <h4 align="right">ThinksynQ Pvt. Limited</h4>
</div>
</div>
</body>
</html>