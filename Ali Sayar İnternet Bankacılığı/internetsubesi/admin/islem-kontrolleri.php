<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php


include "../system/class.database.php";
$db=new Database();


$sql = "SELECT i.islem_id,i.alici_hesap_no,i.verici_hesap_no,i.islem_tarihi,i.islem_miktari,it.islem_tur_isim,m_alici.ad as alici_ad,m_alici.soyad as alici_soyad,m_alici.musteri_no as alici_musteri_no,m_verici.ad as verici_ad,m_verici.soyad as verici_soyad,m_verici.musteri_no as verici_musteri_no FROM islemler i LEFT JOIN musteriler m_alici on m_alici.musteri_no=(SELECT h.musteri_no from hesaplar h where h.hesap_no=i.alici_hesap_no) LEFT JOIN musteriler m_verici on m_verici.musteri_no=(SELECT h.musteri_no from hesaplar h where h.hesap_no=i.verici_hesap_no) left JOIN islem_turleri it on it.islem_tur_id=i.islem_tur_id";
$db->Sorgula($sql);
$islemler = $db->TamCek();


?>



<h2>İşlem Kontrolleri</h2>


<table class="table table-hover">

    <thead>
    <tr>
        <th>Alıcı Ad Soyad</th>
        <th>Verici Ad Soyad</th>
        <th>Alıcı Hesap No</th>
        <th>Verici Hesap No</th>
        <th>İşlem Miktarı</th>
        <th>İşlem Türü</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($islemler as $islem) {?>
    <tr>
        <td><?=$islem["alici_ad"]?> <?=$islem["alici_soyad"]?></td>
        <td><?=$islem["verici_ad"]?> <?=$islem["verici_soyad"]?></td>
        <td><?=$islem["alici_hesap_no"]?></td>
        <td><?=$islem["verici_hesap_no"]?></td>
        <td><?=$islem["islem_miktari"]?></td>
        <td><?=$islem["islem_tur_isim"]?></td>
        <td><button class="btn btn-info" data-toggle="modal" data-target="#islemDetay<?=$islem["islem_id"]?>">Detay</button> </td>
    </tr>
        <!-- İşlem Detay Modal -->
        <div class="modal fade" id="islemDetay<?=$islem["islem_id"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">İşlem Detay</h4>
                    </div>
                    Alıcı Müşteri No :<?=$islem["alici_musteri_no"]?> |
                    Verici Müşteri No:<?=$islem["verici_musteri_no"]?> |
                    İşlem Tarihi:<?=$islem["islem_tarihi"]?> |
                    <div class="modal-body">
                        <div class="row"><br>
                            <div class="col-md-8">
                                <a href="../system/admin/islemiSil.php?id=<?=$islem["islem_id"]?>" class="btn btn-block btn-danger">İşlemi Sil</a>
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








<?php include "footer.php"; ?>
