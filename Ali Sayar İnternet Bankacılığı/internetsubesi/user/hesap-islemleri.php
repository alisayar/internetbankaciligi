<?php include "header.php"; ?>
<?php include "navbar.php"; ?>

<?php



// TamCek metodu örneği.

$bulunacakID = $_SESSION["user"]["musteri_no"];
$sql = "SELECT m.ad,m.soyad,h.hesap_id,h.hesap_no,h.musteri_no,h.acilis_tarihi, b.bakiye, ht.hesap_tur_isim, pb.para_birim_kisaltma FROM hesaplar h left JOIN bakiyeler b on b.hesap_id=h.hesap_id left JOIN hesap_turleri ht on ht.hesap_tur_id=h.hesap_turu_id left JOIN para_birimleri pb on pb.para_birim_id=h.para_birimi_id left join musteriler m on m.musteri_no=:aranankisi where h.musteri_no=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$satirlar = $db->TamCek();




?>


<h2>Hesap İşlemleri</h2>


<div class="row">
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">

                <thead>
                <tr>
                    <th>Hesap No</th>
                    <th>Açılış Tarih</th>
                    <th>Bakiye</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($satirlar as $satir) {?>
                <tr>
                    <td><?=$satir["hesap_no"]?></td>
                    <td><?=$satir["acilis_tarihi"]?></td>
                    <td><?=$satir["bakiye"]?></td>
                    <td><button class="btn btn-info" data-toggle="modal" data-target="#detay">Detay</button> </td>
                </tr>
                    <!-- detay Modal -->
                    <div class="modal fade" id="detay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Hesap Detay</h4>
                                </div>
                                <div class="modal-body">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Ad: <?=$satir["ad"]?></h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Soyad: <?=$satir["soyad"]?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Hesap Numarası: <?=$satir["hesap_no"]?></h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Müşteri Numarası: <?=$satir["musteri_no"]?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Açılış Tarihi: <?=$satir["acilis_tarihi"]?></h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Para Birimi: <?=$satir["para_birim_kisaltma"]?></h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Hesap Türü: <?=$satir["hesap_tur_isim"]?></h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Bakiye: <?=$satir["bakiye"]?></h4>
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
</div>






<?php include "footer.php"; ?>
