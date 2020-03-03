<?php 
include 'config.php';
include 'Database.php';

$id = $_GET['id'];
$db = new Database();
$query = "DELETE FROM `datatable` WHERE ID = $id";
$deleteData = $db->delete($query);


?>