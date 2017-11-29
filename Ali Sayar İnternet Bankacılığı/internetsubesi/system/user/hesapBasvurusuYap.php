<?php
include "../../config.php";
include "../class.database.php";
$db=new Database();

$tur=$_POST["tur"];

$tablo='basvurular';

session_start();
$alanlar = array("basvuru_not","limit","musteri_id","durum","tarih","tur");
$degerler = array("sistem notu: hesap başvurusudur!","0",$_SESSION["user"]["musteri_id"],"0",date("Y-m-d H:i:s"),$tur);
$eklenenId=$db->KayitEkle($tablo, $alanlar, $degerler);
