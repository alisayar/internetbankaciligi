<?php
include "../class.database.php";
$db=new Database();
include "../../config.php";



$musterino=$_POST["musterino"];
$para_birimi=$_POST["parabirimi"];
$hesap_turu=$_POST["hesaptur"];
$bakiye=$_POST["bakiye"];


$hesap_no=time();

$tablo='hesaplar';
$alanlar = array("hesap_no","musteri_no","acilis_tarihi","para_birimi_id","hesap_turu_id","banka_id");
$degerler = array($hesap_no,$musterino,date("Y-m-d H:i:s"),$para_birimi,$hesap_turu,"1");
$eklenenId=$db->KayitEkle($tablo, $alanlar, $degerler);

$tablo='bakiyeler';
$alanlar = array("hesap_id","bakiye");
$degerler = array($eklenenId,$bakiye);
$eklenenId=$db->KayitEkle($tablo, $alanlar, $degerler);

if($eklenenId>0){
    header("Location: ".URL_ADMIN."hesap-islemleri.php");
    exit();
}else{
    header("Location: ".URL_ADMIN."hesap-islemleri.php?hata=hata");
    exit();
}
