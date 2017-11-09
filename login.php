<?php



readfile("index.html");

$connect=mysql_connect("localhost","root","") or die("cant connect");
mysql_select_db("LCInventory")or die("no such database");

if(isset($_POST))
{
	
	$sql = "SELECT * FROM users WHERE email ='{$_POST['email']}'"; 
    $result = mysql_query($sql);
    $numrows=mysql_num_rows($result);

   	if($numrows>=1)
   	  {		echo('<script>swal("Email already registerd!", "...and use different email id!");;
			</script>');}
else {
	$sql = "INSERT INTO users (email,firstName,lastName,password)
	VALUES ('{$_POST['email']}','{$_POST['firstName']}', '{$_POST['lastName']}',md5('{$_POST['password']}'))";
	print $sql;
	if (mysql_query($sql) === TRUE) {
	   echo('<script>swal("Good job!", "Your are registered!", "success");
			</script>');
	} else {
	    echo "Error: " . $sql . "<br>" . $connect->error;
	}
}
}

/*		
if(isset($_POST['submit']))
{ 
      	
    $fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$age=$_POST['age'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	
	
	$exist1=mysql_query("select * from user where email='$email'");	
	$numrows=mysql_num_rows($exist1);
	if($numrows==0)
	{   
			$countc=0;
		
		if(isset($_POST['check']))
			{
				$t1=implode(',',$_POST['check']);
				$check1=explode(',',$t1);
				
				$countc=count($check1);
				$error=mysql_query("insert into user values(' ','$fname','$lname','$age','$email',md5('$pass'))");
			
			$extract=mysql_query("select * from user where fname='$fname' and lname='$lname' and email='$email'");
			

		while($row=mysql_fetch_assoc($extract))
		{
			$uid=$row['uid'];
		}

           $i=0;
				while($i<$countc)
				{
					mysql_query("insert into likes values('$uid','$check1[$i]')");
					$i++;
				}
				
				
			}
		else
		{
			echo('<script>window.alert("Priorities not specified!!!");
			window.location.href="http://localhost/python35/login2.html";</script>');
			
		}
		
		
			
			
			
			header("Location:login2.html");	
	}
	
	else
	{
		echo('<script>window.alert("Use different emailID");
			window.location.href="http://localhost/python35/login2.html";</script>');
		
		//header("Location:login2.html");
	}
	
//header("Location:login2.html");	
}

if(isset($_POST['submit1']))
{
	session_start();	
	
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	
	
if($email && $pass)
{
	
$query=mysql_query("select * from user where email='$email'");	
$numrows=mysql_num_rows($query);
if($numrows!=0)
{
	
	while($rows=mysql_fetch_assoc($query))
	{
		$uid=$rows['uid'];
		$dbemail=$rows['email'];
		$dbpass=$rows['pass'];
		
	}
	
	if($email==$dbemail && md5($pass)==$dbpass)
	{
	$_SESSION['uid'] = $uid;
	header("Location:b.php");
	}
	else
	{echo('<script>window.alert("Invalid password!!!");
			window.location.href="http://localhost/python35/login2.html";</script>');}
	
}	
else
	{echo('<script>window.alert("Invalid emailID!!!");
			window.location.href="http://localhost/python35/login2.html";</script>');}
}

	


}
*/



?>