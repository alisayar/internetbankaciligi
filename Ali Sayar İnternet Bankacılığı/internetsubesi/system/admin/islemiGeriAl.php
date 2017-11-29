<?php
if(!isset($_SESSION['is_admin'])){
    if($_SESSION['is_admin']!=1){
        return "Bu sayfaya erisim yetkiniz yok!";
    }
}
include "../class.database.php";
$db=new Database();