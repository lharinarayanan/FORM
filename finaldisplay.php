    <?php
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
     
        $sql='SELECT id,user,password,phone,email,city,hobby from student';
        $retval=mysqli_query($conn,$sql);
          if(!$retval)
         {
	         die("<br>could not get data".mysqli_error($conn));
         }
                  $i=0;        
                  $user=$id=$email=$phone=$city=array();
                  while($row=mysql_fetch_assoc($retval))
                    {
                      $user[i]=$row['user'];
                      $id[i]=$row['id'];
                      $email[i]=$row['email'];
                      $phone[i]=$row['phone'];
                      $city[i]=$row['city'];
                      $hobby[i]=$row['hobby'];
                      $i=$i+1;
                    }

            mysqli_close($conn);
      ?>

          <!DOCTYPE html>
            <html lang="en">
                  <head>
                       <meta charset="utf-8" content="display page" description="details">
                       <title>The Database Display Page</title>
                  </head>
                  <body style="background-color: rgba(120,120,120,0.6);">
                  	<h1 style="color: rgba(80,10,30); text-align: center;font-size: 25px;font-weight: bold;">Display the data stored in Database</h1>
                        <table border="1.5px" align="center">
                        	<tr>
                                 <th style="width: 50px"><strong>Id</strong></th>
                                 <th style="width: 150px"><strong>User</strong></th>
                                 <th style="width: 180px"><strong>Email</strong></th>
                                 <th style="width: 150px"><strong>Phone</strong></th>
                                 <th style="width: 180px"><strong>City</strong></th>
                                 <th style="width: 100px"><strong>Hobies</strong></th>
                                 <th style="width: 80px"><strong>Edit</strong></th>
                            </tr>
                            <tr>
                            	<td><?php echo $id[0]; ?></td>






                            </tr>



                  	
                         </table>











                  </body>     
            </html>