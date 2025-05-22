<?php
include "conection.php";

$id = $_GET['id'];
$conn->query("DELETE FROM tablon WHERE id = $id");
header("Location: OtroIndex.php");

?>