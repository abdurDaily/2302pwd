<?php
include '../env/conn.php';
$id = $_REQUEST['id'];
$delete = "DELETE FROM file WHERE id = $id";
$rslt = mysqli_query($conn, $delete);

if($rslt){
    header("Location:../all_post.php");
}

?>