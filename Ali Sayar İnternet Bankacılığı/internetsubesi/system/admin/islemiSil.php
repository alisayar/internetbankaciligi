<?php

include "../class.database.php";
$db=new Database();






$db->TekKayitSil('islemler','islem_id',$_GET["id"]);


header("Location: ../../admin/islem-kontrolleri.php");
exit();