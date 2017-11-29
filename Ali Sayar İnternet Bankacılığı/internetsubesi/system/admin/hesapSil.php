<?php

include "../class.database.php";
$db=new Database();


$hesap_id=$_GET["id"];



$db->TekKayitSil('hesaplar','hesap_id',$hesap_id);
$db->TekKayitSil('bakiyeler','hesap_id',$hesap_id);

header("Location: ../../admin/hesap-islemleri.php");
exit();