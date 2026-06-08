<?php
include "../security.php";
include "../../koneksi.php";

$id = $_GET['id'] ?? '';
if ($id == '') {
    header("Location: index.php");
    exit;
}
$sql = "delete from products where id='$id'";
$query = mysqli_query($koneksi, $sql);
header("Location: index.php");
exit;
