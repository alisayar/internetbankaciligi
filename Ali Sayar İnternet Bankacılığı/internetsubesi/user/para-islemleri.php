<?php include "header.php"; ?>
<?php include "navbar.php"; ?>

<?php


$bulunacakID = $_SESSION["user"]["musteri_no"];
$sql = "select h.hesap_id,h.hesap_no,b.bakiye from hesaplar h left join bakiyeler b on b.hesap_id=h.hesap_id where h.musteri_no=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$hesaplar = $db->TamCek();


?>


<h2>Para İşlemleri</h2>

<?php if(isset($_GET["hata"])){ ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong><?=$_GET["hata"]?></strong>
    </div>
<?php } ?>
<?php if(isset($_GET["basari"])){ ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>İşlem başarılı!</strong>
    </div>
<?php } ?>

    <div class="row">
        <br>
        <form method="post" action="../system/user/paraTransferEt.php">
        <div class="form-group">
            <label for="exampleInputPassword1">Hesaplar</label>
            <select class="form-control" id="exampleInputPassword1" name="verici_hesap_no">
                <?php foreach ($hesaplar as $hesap) {?>
                    <option value="<?=$hesap["hesap_no"]?>">Hesap no:<?=$hesap["hesap_no"]?> Bakiye:<?=$hesap["bakiye"]?> </option>
                <?php } ?>
            </select>
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-resize-horizontal" aria-hidden="true"></span></span>
            <input type="text" class="form-control" placeholder="Aktarılacak Hesap" aria-describedby="basic-addon1" name="alici_hesap_no">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span></span>
            <input type="text" class="form-control" placeholder="Para Miktarı" aria-describedby="basic-addon1" name="miktar">
        </div>
        <br>
        <br>
        <div class="" align="end"><button type="submit" class="btn btn-primary btn-lg">Transfer Et</button></div>
        </form>
    </div>



<?php include "footer.php"; ?>