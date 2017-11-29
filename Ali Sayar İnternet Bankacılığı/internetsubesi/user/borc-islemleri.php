<?php include "header.php"; ?>
<?php include "navbar.php"; ?>

<?php


$satirlar=array();

if(isset($_GET["search"])){
    $bulunacakID = $_SESSION["user"]["musteri_id"];
    $sql = "SELECT b.borc_id,b.borc,b.tarih,b.aciklama,m.ad,m.soyad,h.hesap_no FROM borclar b left join hesaplar h on h.hesap_id=b.hesap_id left JOIN musteriler m on m.musteri_id=b.musteri_id where b.musteri_id=:aranankisi and h.hesap_no=:hesapnoara";
    $db->Sorgula($sql);
    $db->bind('aranankisi',$bulunacakID);
    $db->bind('hesapnoara',$_GET["search"]);
    $satirlar = $db->TamCek();
}else{
    $bulunacakID = $_SESSION["user"]["musteri_id"];
    $sql = "SELECT b.borc_id,b.borc,b.tarih,b.aciklama,m.ad,m.soyad,h.hesap_no FROM borclar b left join hesaplar h on h.hesap_id=b.hesap_id left JOIN musteriler m on m.musteri_id=b.musteri_id where b.musteri_id=:aranankisi";
    $db->Sorgula($sql);
    $db->bind('aranankisi',$bulunacakID);
    $satirlar = $db->TamCek();
}




$bulunacakID = $_SESSION["user"]["musteri_no"];
$sql = "select h.hesap_id,h.hesap_no,b.bakiye from hesaplar h left join bakiyeler b on b.hesap_id=h.hesap_id where h.musteri_no=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$hesaplar = $db->TamCek();





?>


<h2>Borç İşlemleri</h2>

<div class="row">
    <br>
    <div class="col-md-12">
        <div class="input-group">
            <form method="get" action="borc-islemleri.php">
            <input type="text" class="form-control" placeholder="Hesap Numarası" name="search">
            <span class="input-group-btn">
                <button class="btn btn-info" type="submit" >Listele</button>
            </span>
            </form>
        </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
</div>
<br>
<div class="row">
    <div class="col-md-12">
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
        <table class="table table-hover">

            <thead>
            <tr>
                <th>Hesap No</th>
                <th>Ad Soyad</th>
                <th>Tarih</th>
                <th>Borç</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($satirlar as $satir) {?>
            <tr>
                <td><?=$satir["hesap_no"]?></td>
                <td><?=$satir["ad"]?> <?=$satir["soyad"]?></td>
                <td><?=$satir["tarih"]?></td>
                <td><?=$satir["borc"]?></td>
                <td><button class="btn btn-info" data-toggle="modal" data-target="#ode">Öde</button> <button class="btn btn-info" data-toggle="modal" data-target="#detay">Detay</button> </td>
            </tr>
                <!-- detay Modal -->
                <div class="modal fade" id="detay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Borç Detay</h4>
                            </div>
                            <div class="modal-body">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Tarih: <?=$satir["tarih"]?></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Borç: <?=$satir["borc"]?></h4>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Hesap Numarası: <?=$satir["hesap_no"]?></h4>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Açıklama: <?=$satir["aciklama"]?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ode Modal -->
                <div class="modal fade" id="ode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Borç Öde</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        Tarih : <?= $satir["tarih"]?> | Borç : <?=$satir["borc"]?>
                                    </div>
                                    <form method="post" action="../system/user/borcOde.php">
                                        <input type="text" value="<?=$satir["borc_id"]?>" name="borc_id" hidden>
                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Hesaplar</label>
                                            <select class="form-control" id="exampleInputPassword1" name="hesap_id">
                                                <?php foreach ($hesaplar as $hesap) {?>
                                                    <option value="<?=$hesap["hesap_id"]?>">Hesap no:<?=$hesap["hesap_no"]?> Bakiye:<?=$hesap["bakiye"]?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info ">Öde</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                            </div>
                        </div>
                    </div>
                </div>


            <?php } ?>
            </tbody>
        </table>
    </div>
</div>













<?php include "footer.php"; ?>
