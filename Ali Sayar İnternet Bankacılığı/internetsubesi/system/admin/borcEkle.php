<?php
include "../class.database.php";
$db=new Database();



$hesapno=$_POST["hesapno"];
$musterino=$_POST["musterino"];
$borc=$_POST["borc"];
$aciklama=$_POST["aciklama"];


$bulunacakID = $hesapno;
$sql = "SELECT hesap_id FROM hesaplar WHERE hesap_no=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$satir = $db->TekCek();

$hesap_id=$satir["hesap_id"];

$bulunacakID = $musterino;
$sql = "SELECT musteri_id FROM musteriler WHERE musteri_no=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$satir = $db->TekCek();

$musteri_id=$satir["musteri_id"];


$tablo='borclar';
$alanlar = array("hesap_id","musteri_id","borc","tarih","aciklama");
$degerler = array($hesap_id,$musteri_id,$borc,date("Y-m-d H:i:s"),$aciklama);
$eklenenId=$db->KayitEkle($tablo, $alanlar, $degerler);

if($eklenenId>0){
    header("Location: ../../admin/borc-islemleri.php?basari=");
    exit();
}else{
    header("Location: ../../admin/borc-islemleri.php?hata=");
    exit();
}

