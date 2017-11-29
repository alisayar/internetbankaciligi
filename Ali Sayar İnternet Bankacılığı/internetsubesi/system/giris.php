<?php
include "class.database.php";
$db=new Database();
include "../config.php";


$hesapno=$_POST["hesapno"];
$parola=$_POST["parola"];


$hatalar=array();
if($hesapno==null || $parola==null)
{
    $hatalar[]="Lütfen boş alan bırakmayın!";
}


$sql = "SELECT * FROM musteriler WHERE musteri_no='".$hesapno."' and parola='".$parola."' ";
$db->Sorgula($sql);
$satir = $db->TekCek();


if($satir!=null){
    session_start();
    $_SESSION['user']=$satir;
}else{
    $hatalar[]="Hatalı giriş bilgileri verdiniz!";
}

if(count($hatalar)>0){
    $hata="";
    for($i=0;$i<count($hatalar);$i++){
        $hata.=$hatalar[$i]."<br>";
    }
	echo "<script type='text/javascript'>window.top.location='".URL."index.php?hata=".$hata."';</script>";
    //header("Location: ".URL."index.php?hata=".$hata);
    exit();
}

if($_SESSION["user"]["yonetici"]==0){
	echo "<script type='text/javascript'>window.top.location='".URL."user';</script>";
   // header("Location: ".URL."user/");
    exit();
}elseif ($_SESSION["user"]["yonetici"]==1){
	echo "<script type='text/javascript'>window.top.location='".URL."admin';</script>";
  //  header("Location: ".URL."admin/");
    exit();
}else{
    die("Sistem kısa süreli bakım aşamasında lütfen daha sonra tekrar deneyiniz!");
}
?>
