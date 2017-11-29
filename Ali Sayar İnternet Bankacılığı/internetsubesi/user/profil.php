
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>



<?php




$sql = "SELECT * FROM musteriler where musteri_no=".$_SESSION["user"]["musteri_no"]." ";
$db->Sorgula($sql);
$profil = $db->TekCek();


?>


<h2>Profil</h2>

<div class="row">
    <br>
    <div class="row">
        <div class="col-md-6"><h4>Ad: <?=$profil["ad"]?></h4></div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-6"><h4>Soyad: <?=$profil["soyad"]?></h4></div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-6"><h4>Müşteri Numarası: <?=$profil["musteri_no"]?></h4></div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <form action="../system/user/profilCepTelGuncelle.php" method="post">
            <input type="text" name="id" value="<?=$profil["musteri_id"]?>" hidden />
            <div class="col-md-6"><h4>Cep Telefonu: </h4>
                <input type="text" name="telefon" value="<?=$profil["telefon"]?>">
            </div>
            <div class="col-md-6"><button type="submit" class="btn btn-info ">Güncelle</button></div>
        </form>
    </div>
    <div class="row">
        <form action="../system/user/profilEmailGuncelle.php" method="post">
            <input type="text" name="id" value="<?=$profil["musteri_id"]?>" hidden />
            <div class="col-md-6"><h4>E-mail: </h4>
                <input type="text" name="email" value="<?=$profil["email"]?>">
            </div>
            <div class="col-md-6"><button type="submit" class="btn btn-info ">Güncelle</button></div>
        </form>
    </div>
    <div class="row">
        <form action="../system/user/profilAdresGuncelle.php" method="post">
            <input type="text" name="id" value="<?=$profil["musteri_id"]?>" hidden />
            <div class="col-md-6"><h4>Adres: </h4>
                <input type="text" name="adres" value="<?=$profil["adres"]?>">
            </div>
            <div class="col-md-6"><button type="submit" class="btn btn-info ">Güncelle</button></div>
        </form>
    </div>


<?php include "footer.php"; ?>