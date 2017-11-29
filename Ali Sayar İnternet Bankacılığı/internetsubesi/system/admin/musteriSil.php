<?php
include "../class.database.php";
$db=new Database();


$musteri_id=$_GET["id"];

$bulunacakID = $musteri_id;
$sql = "SELECT musteri_no FROM musteriler WHERE musteri_id=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$satir = $db->TekCek();
$musteri_no=$satir["musteri_no"];

$db->TekKayitSil('musteriler','musteri_id',$musteri_id);
$db->TekKayitSil('hesaplar','musteri_no',$musteri_no);


header("Location: ../../admin/musteri-islemleri.php");
exit();