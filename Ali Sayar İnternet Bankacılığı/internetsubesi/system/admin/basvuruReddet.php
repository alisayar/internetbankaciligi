<?php
include "../class.database.php";
$db=new Database();



$basvuru_id=$_GET["id"];

$tablo='basvurular';
$sorgu_alan='basvuru_id';
$sorgu_deger=$basvuru_id;

$alanlar=array("durum") ;
$degerler=array("1") ;

$db->KayitGuncelle($tablo, $alanlar, $degerler, $sorgu_alan, $sorgu_deger);


header("Location: ../../admin/basvuru-islemleri.php");
exit();