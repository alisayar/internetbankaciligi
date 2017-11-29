<?php


session_start();
session_destroy();
include "../config.php";


echo "<script type='text/javascript'>window.top.location='".URL."index.php';</script>";


?>