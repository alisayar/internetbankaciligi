<?php
include "../class.database.php";
$db=new Database();



$basvuru_id=$_GET["id"];


$db->TekKayitSil('basvurular','basvuru_id',$basvuru_id);


header("Location: ../../admin/basvuru-islemleri.php");
exit();