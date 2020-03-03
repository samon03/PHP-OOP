<?php 
include 'header.php';
include 'config.php';
include 'Database.php';

?>

<?php

$db = new Database();
if (isset($_POST['submit'])) 
{
	$uname = mysqli_real_escape_string($db->link, $_POST['name']);
	$uemail = mysqli_real_escape_string($db->link, $_POST['email']);
	$uloc = mysqli_real_escape_string($db->link, $_POST['location']);

	if ($uname == '' || $uemail == '' || $uloc == '') 
	{
		$error = "Field must not be empty";
	}
	else
	{
		$query = "INSERT INTO datatable VALUES ('', '$uname', '$uemail', '$uloc')";
		$create = $db->insert($query);
	}
}

if (isset($error)) 
{
	echo "<h3 style='color: red;'>".$error."</h3>";
}

?>

<form action="create.php" method="POST">
<table>
	<tr>
	   <td>Name :</td>
	   <td><input type="text" name="name"></td>
	</tr>
	<tr>
	   <td>Email :</td>
	   <td><input type="text" name="email"></td>
	</tr>
	<tr>
	   <td>Location :</td>
	   <td><input type="text" name="location"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Submit">
			<!-- <input type="reset" name="reset" value="Cancel"> -->
		</td>
	</tr>
</table>
</form>
<br>
<a href="index.php">Go Back</a>
<?php include 'footer.php' ?>