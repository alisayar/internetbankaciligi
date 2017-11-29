<?php

include "../class.database.php";
$db=new Database();

$id=$_POST["id"];
$adres=$_POST["email"];


$tablo='musteriler';
$sorgu_alan='musteri_id';
$sorgu_deger=$id;

$alanlar=array("email") ;
$degerler=array($adres) ;

$db->KayitGuncelle($tablo, $alanlar, $degerler, $sorgu_alan, $sorgu_deger);

header("Location: ../../admin/profil.php");
exit();