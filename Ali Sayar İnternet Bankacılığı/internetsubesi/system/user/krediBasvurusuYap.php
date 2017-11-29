<?php
session_start();
include "../../config.php";
include "../class.database.php";
$db=new Database();

$not=$_POST["not"];
$tur=$_POST["tur"];
$limit=$_POST["limit"];
$musteri_id=$_SESSION["user"]["musteri_id"];


$hatalar=array();
if($tur==null || $not==null || $limit==null){
    $hatalar[]="Lütfen hiçbir alanı boş bırakmayınız!";
}

if(count($hatalar)>0){
    $hata="";
    for($i=0;$i<count($hatalar);$i++){
        $hata.=$hatalar[$i]."<br>";
    }
    header("Location: ".URL_USER."basvuru-islemleri.php?hata=".$hata);
    exit();
}else{

    $tablo='basvurular';

    $tarih=date("Y-m-d H:i:s");

    $alanlar = array("basvuru_not","basvuru_limit","musteri_id","tarih","tur");
    $degerler = array($not,$limit,$musteri_id,$tarih,$tur);
    $eklenenId=$db->KayitEkle($tablo, $alanlar, $degerler);


    if($eklenenId>0){
        header("Location: ".URL_USER."basvuru-islemleri.php");
        exit();
    }else{
        header("Location: ".URL_USER."basvuru-islemleri.php?hata=Veri eklenemedi!");
        exit();
    }

}