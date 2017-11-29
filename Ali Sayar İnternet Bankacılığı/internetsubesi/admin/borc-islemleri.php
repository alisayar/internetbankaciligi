<?php include "header.php"; ?>
<?php include "navbar.php"; ?>

<?php

include "../system/class.database.php";
$db=new Database();



$borclar=array();

if(isset($_GET["search"])){
    $bulunacakID = $_GET["search"];
    $sql = "SELECT m.ad,m.soyad,m.musteri_no,b.borc_id,b.borc,b.tarih,b.aciklama,h.hesap_no from borclar b LEFT JOIN musteriler m on m.musteri_id=b.musteri_id LEFT JOIN hesaplar h on h.hesap_id=b.hesap_id where h.hesap_no=:aranankisi";
    $db->Sorgula($sql);
    $db->bind('aranankisi',$bulunacakID);
    $borclar = $db->TamCek();
}else{
    $bulunacakID = 0;
    $sql = "SELECT m.ad,m.soyad,m.musteri_no,b.borc_id,b.borc,b.tarih,b.aciklama,h.hesap_no from borclar b LEFT JOIN musteriler m on m.musteri_id=b.musteri_id LEFT JOIN hesaplar h on h.hesap_id=b.hesap_id";
    $db->Sorgula($sql);
    $db->bind('aranankisi',$bulunacakID);
    $borclar = $db->TamCek();
}









?>



<h2>Borç İşlemleri</h2>

<div class="row">
    <br>
    <div class="col-md-6">
        <form action="borc-islemleri.php" method="get">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Hesap Numarası">
            <span class="input-group-btn">
        <button class="btn btn-info" type="submit" >Listele</button>
        </form>
      </span>
        </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
    <div class="col-md-2">
        <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#borcEkle">Borç Ekle</button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">

            <thead>
            <tr>
                <th>Ad Soyad</th>
                <th>Musteri No</th>
                <th>Tarih</th>
                <th>Borç</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($borclar as $borc) {?>
            <tr>
                <td><?=$borc["ad"]?> <?=$borc["soyad"]?></td>
                <td><?=$borc["musteri_no"]?></td>
                <td><?=$borc["tarih"]?></td>
                <td><?=$borc["borc"]?></td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#detay<?=$borc["borc_id"]?>">Detay</button>

                </td>
            </tr>
                <!-- detay Modal -->
                <div class="modal fade" id="detay<?=$borc["borc_id"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                        <h4>Tarih: <?=$borc["tarih"]?></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Borç: <?=$borc["borc"]?></h4>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Hesap Numarası: <?=$borc["hesap_no"]?></h4>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Açıklama: <?=$borc["aciklama"]?></h4>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="../system/admin/borcSil.php?id=<?=$borc["borc_id"]?>" class="btn btn-danger">Borcu Sil</a>
                                    </div>

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









<!-- borç ekle Modal -->
<div class="modal fade" id="borcEkle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Borç Ekle</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="../system/admin/borcEkle.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hesap No</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Hesap No" name="hesapno">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Müşteri No</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Müşteri No" name="musterino">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Borç</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Borç" name="borc">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Açıklama</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Açıklama" name="aciklama">
                    </div>
                    <button type="submit" class="btn btn-danger">Borç Ekle</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>


<?php include "footer.php"; ?>
