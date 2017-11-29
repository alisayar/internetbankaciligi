<?php

include "../class.database.php";
$db=new Database();


$ad=$_POST["ad"];
$soyad=$_POST["soyad"];
$telefon=$_POST["telefon"];
$email=$_POST["email"];
$parola=$_POST["parola"];
$anne_kizlik_soyad=$_POST["anne_kizlik_soyad"];
$adres=$_POST["adres"];



$tablo='musteriler';
$sorgu_alan='musteri_id';
$sorgu_deger=$_POST["id"];

$alanlar = array("ad","soyad","telefon","email","parola","anne_kizlik_soyad","adres");
$degerler = array($ad,$soyad,$telefon,$email,$parola,$anne_kizlik_soyad,$adres);

$db->KayitGuncelle($tablo, $alanlar, $degerler, $sorgu_alan, $sorgu_deger);


header("Location: ../../admin/musteri-islemleri.php");
exit();