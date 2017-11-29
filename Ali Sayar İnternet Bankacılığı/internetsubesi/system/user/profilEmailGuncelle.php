<?php

include "../class.database.php";
$db=new Database();

include "../../config.php";

$id=$_POST["id"];
$adres=$_POST["email"];


$tablo='musteriler';
$sorgu_alan='musteri_id';
$sorgu_deger=$id;

$alanlar=array("email") ;
$degerler=array($adres) ;

$db->KayitGuncelle($tablo, $alanlar, $degerler, $sorgu_alan, $sorgu_deger);

echo "<script type='text/javascript'>window.top.location='".API."user';</script>";
//header("Location: ../../user/profil.php");
exit();