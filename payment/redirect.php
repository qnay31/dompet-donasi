<?php
require '../function.php';
$query  = mysqli_query($conn, "SELECT * FROM donasi ORDER BY id DESC LIMIT 1");

$data   = mysqli_fetch_assoc($query);
$key    = $data["id"];
$kode_unik    = $data["kode_unik"];

echo 
"<script>               
    document.location.href = 'select-option.php?id_key=$key&id_unik=$kode_unik';
</script>";
?>