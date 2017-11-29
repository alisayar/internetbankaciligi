<?php include "header.php"; ?>
<?php include "navbar.php"; ?>



<?php

include "../system/class.database.php";
$db=new Database();

$sql = "SELECT h.hesap_id,h.hesap_no,h.musteri_no,h.acilis_tarihi, b.bakiye, ht.hesap_tur_isim, pb.para_birim_kisaltma FROM hesaplar h left JOIN bakiyeler b on b.hesap_id=h.hesap_id left JOIN hesap_turleri ht on ht.hesap_tur_id=h.hesap_turu_id left JOIN para_birimleri pb on pb.para_birim_id=h.para_birimi_id";
$db->Sorgula($sql);
$hesaplar = $db->TamCek();




$sql = "SELECT * FROM hesap_turleri";
$db->Sorgula($sql);
$hesap_turleri = $db->TamCek();

$sql = "SELECT * FROM para_birimleri";
$db->Sorgula($sql);
$para_birimleri = $db->TamCek();


?>


<h2>Hesap İşlemleri</h2>

<button class="btn btn-primary" data-toggle="modal" data-target="#hesapAc">Hesap Aç</button>
<table class="table table-hover">

    <thead>
    <tr>
        <th>Hesap No</th>
        <th>Müşteri No</th>
        <th>Acilis Tarihi</th>
        <th>Bakiye</th>
        <th>Hesap Türü</th>
        <th>Para Birimi</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($hesaplar as $hesap) {?>
    <tr>
        <td><?=$hesap["hesap_no"]?></td>
        <td><?=$hesap["musteri_no"]?></td>
        <td><?=$hesap["acilis_tarihi"]?></td>
        <td><?=$hesap["bakiye"]?></td>
        <td><?=$hesap["hesap_tur_isim"]?></td>
        <td><?=$hesap["para_birim_kisaltma"]?></td>
        <td><button class="btn btn-info" data-toggle="modal" data-target="#hesapYonet<?=$hesap["hesap_no"]?>">Yönet</button> </td>
    </tr>
        <!-- Hesap Yönet Modal -->
        <div class="modal fade" id="hesapYonet<?=$hesap["hesap_no"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hesap Yönet</h4>
                    </div>
                    <form action="../system/admin/hesapGuncelle.php" method="post">
                        <input type="text" value="<?=$hesap["hesap_id"]?>" name="hesap_id" hidden />
                    <div class="modal-body">
                        <div class="row"><br><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bakiye</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?=$hesap["bakiye"]?>" name="bakiye">
                                    </div>
                                </div>
                            </div>
                            <div class="row"><br>
                                <div class="col-md-8">
                                    <button  type="submit" class="btn btn-block btn-primary">Güncelle</button>
                                </div>
                            </div>
                            <div class="row"><br>
                                <div class="col-md-8">
                                    <a href="../system/admin/hesapSil.php?id=<?=$hesap["hesap_id"]?>" class="btn btn-block btn-danger">Hesabı Sil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </tbody>
</table>



<!-- Hesap Aç Modal -->
<div class="modal fade" id="hesapAc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Yeni Hesap Aç</h4>
            </div>
            <form action="../system/admin/hesapAc.php" method="post">
            <div class="modal-body">
                <div class="row"><br><br>
                    <div class="col-lg-12">
                        <div class="input-group-lg">
                            <span class="input-group-btn"></span>
                            <input type="text" class="form-control" placeholder="Müşteri No" name="musterino">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div>
                <div class="row"><br><br>
                    <div class="col-lg-12">
                        <div class="input-group-lg">
                            <span class="input-group-btn"></span>
                            <input type="text" class="form-control" placeholder="Hesap Bakiye" name="bakiye">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div>
                <br><br>
                <h4>Hesap Para Birimi</h4>
                <select class="form-control" name="parabirimi">
                    <?php foreach ($para_birimleri as $para) {?>
                        <option value="<?=$para["para_birim_id"]?>"><?=$para["para_birim_kisaltma"]?></option>
                    <?php } ?>
                </select>
                <br><br>
                <h4>Hesap Türü</h4>
                <select class="form-control" name="hesaptur">
                    <?php foreach ($hesap_turleri as $tur) {?>
                        <option value="<?=$tur["hesap_tur_id"]?>"><?=$tur["hesap_tur_isim"]?></option>
                    <?php } ?>
                </select>
                <div align="center"><br><br>
                    <button type="submit" class="btn btn-primary btn-lg">Hesapları Aç</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>

            </div>
            </form>
        </div>
    </div>
</div>


















<?php include "footer.php"; ?>
