<?php 
include 'header.php';
include 'config.php';
include 'Database.php';

$id = $_GET['id'];
$db = new Database();
$query = "SELECT * FROM datatable WHERE ID = $id";
$getData = $db->select($query)->fetch_assoc();


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
		$query = "UPDATE datatable 
		          SET Name = '$uname', Email = '$uemail',Location = '$uloc' 
                  WHERE ID = $id";
		$update = $db->update($query);
	}
}

if (isset($error)) 
{
	echo "<h3 style='color: red;'>".$error."</h3>";
}

?>

<form action="update.php?id=<?= $id;?>" method="POST">
<table>
	<tr>
	   <td>Name :</td>
	   <td><input type="text" name="name" value="<?= $getData['Name']?>"></td>
	</tr>
	<tr>
	   <td>Email :</td>
	   <td><input type="text" name="email" value="<?= $getData['Email']?>"></td>
	</tr>
	<tr>
	   <td>Location :</td>
	   <td><input type="text" name="location" value="<?= $getData['Location']?>"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Submit">
			<input type="reset" name="reset" value="Cancel">
		</td>
	</tr>
</table>
</form>
<br>
<a href="index.php">Go Back</a>
<?php include 'footer.php' ?>