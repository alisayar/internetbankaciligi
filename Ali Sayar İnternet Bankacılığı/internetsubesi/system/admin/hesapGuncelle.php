<?php
include "../class.database.php";
$db=new Database();



$bakiye=$_POST["bakiye"];

$tablo='bakiyeler';
$sorgu_alan='hesap_id';
$sorgu_deger=$_POST["hesap_id"];

$alanlar=array("bakiye") ;
$degerler=array($bakiye) ;

$db->KayitGuncelle($tablo, $alanlar, $degerler, $sorgu_alan, $sorgu_deger);

header("Location: ../../admin/hesap-islemleri.php");
exit();