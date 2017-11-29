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

$alanlar = array("ad","soyad","telefon","email","parola","anne_kizlik_soyad","adres","musteri_no","banka_id");
$degerler = array($ad,$soyad,$telefon,$email,$parola,$anne_kizlik_soyad,$adres,strrev(time()),"1");
$eklenenId=$db->KayitEkle($tablo, $alanlar, $degerler);

if($eklenenId>0){
    header("Location: ../../admin/musteri-islemleri.php");
    exit();
}else{
    header("Location: ../../admin/musteri-islemleri.php?hata=eklenirken hata oluştu");
    exit();
}






