<?php
include "../class.database.php";
$db=new Database();



$id=$_GET["id"];



$db->TekKayitSil('borclar','borc_id',$id);


header("Location: ../../admin/borc-islemleri.php");
exit();