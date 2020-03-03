<?php 
include 'header.php';
include 'config.php';
include 'Database.php';

$db = new Database();
$query = "SELECT * FROM datatable";
$read = $db->select($query);

if (isset($_GET['msg'])) 
{
	echo "<h3 style='color: green;'>".$_GET['msg']."</h3>";
}

?>



<table class="tblone">
	<tr>
		<th width="10%">SL.</th>
		<th width="25%">Name</th>
		<th width="25%">Email</th>
		<th width="15%">Location</th>
		<th width="25%">Action</th>
	</tr>

	<?php if ($read) 
	{
		$i = 1;
		while ($row = $read->fetch_assoc())
		{
			?>
    <tr>
    	<td><?= $i++; ?></td>
		<td><?= $row['Name']; ?></td>
		<td><?= $row['Email']; ?></td>
		<td><?= $row['Location']; ?></td>
		<td>
			<a href="update.php?id=<?= $row['ID']; ?>">Edit</a>
		    <a href="delete.php?id=<?= $row['ID']; ?>" style="color: red;">Delete</a>
		</td>
	</tr>
			<?php
		}
	}
	else 
	{
		?>
        <p>Data is not avaiable!</p>
		<?php
	}
	?>
     
	
</table>

<a href="create.php">Create</a>

<?php include 'footer.php' ?>