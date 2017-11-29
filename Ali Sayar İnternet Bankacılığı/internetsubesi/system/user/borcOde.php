<?php
include "../../config.php";
include "../class.database.php";
$db=new Database();


$hesap_id=$_POST["hesap_id"];
$borc_id=$_POST["borc_id"];

$bulunacakID = $borc_id;
$sql = "SELECT borc FROM borclar WHERE borc_id=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$satir = $db->TekCek();

$borc= $satir["borc"];

$bulunacakID = $hesap_id;
$sql = "SELECT bakiye FROM bakiyeler WHERE hesap_id=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$satir = $db->TekCek();

$bakiye=$satir["bakiye"];


if($bakiye<$borc){
    header("Location: ../../user/borc-islemleri.php?hata=Bakiye yetersiz!");
    exit();
}else{

    $bakiye=$bakiye-$borc;
    $tablo='bakiyeler';
    $sorgu_alan='hesap_id';
    $sorgu_deger=$hesap_id;
    $alanlar=array("bakiye") ;
    $degerler=array($bakiye) ;
    $db->KayitGuncelle($tablo, $alanlar, $degerler, $sorgu_alan, $sorgu_deger);

    $tablo='borclar';
    $sorgu_alan='borc_id';
    $sorgu_deger=$borc_id;
    $alanlar=array("borc") ;
    $degerler=array("0") ;
    $db->KayitGuncelle($tablo, $alanlar, $degerler, $sorgu_alan, $sorgu_deger);


    header("Location: ../../user/borc-islemleri.php?basari=true");
    exit();
}







