<?php

include "../class.database.php";
$db=new Database();
include "../../config.php";


$musteri_no=$_SESSION["user"]["musteri_no"];
$alici_hesap_no=$_POST["alici_hesap_no"];
$verici_hesap_no=$_POST["verici_hesap_no"];
$miktar=$_POST["miktar"];







$bulunacakID = $verici_hesap_no;
$sql = "SELECT hesap_id FROM hesaplar WHERE hesap_no=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$datir = $db->TekCek();

$verici_hesap_id=$datir["hesap_id"];



$bulunacakID = $alici_hesap_no;
$sql = "SELECT hesap_id FROM hesaplar WHERE hesap_no=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$datir = $db->TekCek();

$alici_hesap_id=$datir["hesap_id"];



if($alici_hesap_id==0 || $alici_hesap_id==null){
    header("Location: ../../user/para-islemleri.php?hata=Alıcı hesap bulunamadı!");
    exit();
}



$bulunacakID = $verici_hesap_id;
$sql = "SELECT bakiye FROM bakiyeler WHERE hesap_id=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$satir = $db->TekCek();

$verici_hesap_bakiye=$satir["bakiye"];

$bulunacakID = $alici_hesap_id;
$sql = "SELECT bakiye FROM bakiyeler WHERE hesap_id=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$satir = $db->TekCek();

$alici_hesap_bakiye=$satir["bakiye"];


if($verici_hesap_bakiye<$miktar){
    header("Location: ../../user/para-islemleri.php?hata=Bakiye yetersiz!");
    exit();
}else{
    $tablo='bakiyeler';
    $sorgu_alan='hesap_id';
    $sorgu_deger=$alici_hesap_id;
    $alici_hesap_bakiye=$alici_hesap_bakiye+$miktar;
    $alanlar=array("bakiye") ;
    $degerler=array($alici_hesap_bakiye) ;
    $db->KayitGuncelle($tablo, $alanlar, $degerler, $sorgu_alan, $sorgu_deger);

    $tablo='bakiyeler';
    $sorgu_alan='hesap_id';
    $sorgu_deger=$verici_hesap_id;
    $verici_hesap_bakiye=$verici_hesap_bakiye-$miktar;
    $alanlar=array("bakiye") ;
    $degerler=array($verici_hesap_bakiye) ;
    $db->KayitGuncelle($tablo, $alanlar, $degerler, $sorgu_alan, $sorgu_deger);

    header("Location: ../../user/para-islemleri.php?basari=true");
    exit();
}
