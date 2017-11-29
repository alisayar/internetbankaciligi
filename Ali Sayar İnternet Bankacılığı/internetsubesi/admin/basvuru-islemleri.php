<?php include "header.php"; ?>
<?php include "navbar.php"; ?>

<?php


include "../system/class.database.php";
$db=new Database();


$sql = "SELECT b.basvuru_id,b.basvuru_not,b.basvuru_limit,b.durum,b.tarih,b.tur,m.ad,m.soyad,m.musteri_no from basvurular b left join musteriler m on m.musteri_id=b.musteri_id ";
$db->Sorgula($sql);
$satirlar = $db->TamCek();


?>


<h2>Başvuru İşlemleri</h2>

<table class="table table-hover">

    <thead>
    <tr>
        <th>Ad Soyad</th>
        <th>Müşteri No</th>
        <th>Tur</th>
        <th>Durum</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($satirlar as $satir) {?>
        <?php
        $durum ="";
        if($satir["durum"]==0) $durum="Beklemede";
        elseif($satir["durum"]==1) $durum="Reddedildi";
        elseif($satir["durum"]==2) $durum="Kabul Edildi";
        ?>
    <tr>
        <td><?=$satir["ad"]?> <?=$satir["soyad"]?></td>
        <td><?=$satir["musteri_no"]?></td>
        <td><?=$satir["tur"]?></td>
        <td><?=$durum?></td>
        <td><button class="btn btn-info" type="submit" data-toggle="modal" data-target="#detay<?=$satir["basvuru_id"]?>">Detay</button> </td>
    </tr>
        <!-- Ode Modal -->
        <div class="modal fade" id="detay<?=$satir["basvuru_id"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Borç Öde</h4>
                    </div>
                    <div class="modal-body">

                        Başvuru Id : <?=$satir["basvuru_id"]?><br>
                        Başvuru Not : <?=$satir["basvuru_not"]?><br>
                        Başvuru Limit : <?=$satir["basvuru_limit"]?><br>
                        Durum : <?=$durum?><br>
                        Tarih : <?=$satir["tarih"]?><br>
                        Tür : <?=$satir["tur"]?><br>
                        Ad : <?=$satir["ad"]?><br>
                        Soyad : <?=$satir["soyad"]?><br>
                        Müşteri No:  <?=$satir["musteri_no"]?><br>
                        <br>
                        <a href="../system/admin/basvuruOnayla.php?id=<?=$satir["basvuru_id"]?>" class="btn btn-info">Onayla</a><br><br>
                        <a href="../system/admin/basvuruReddet.php?id=<?=$satir["basvuru_id"]?>" class="btn btn-info">Reddet</a><br><br>
                        <a href="../system/admin/basvuruSil.php?id=<?=$satir["basvuru_id"]?>" class="btn btn-info">Sil</a><br>

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
