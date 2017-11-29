<?php include "header.php"; ?>
<?php include "navbar.php"; ?>



<?php



$bulunacakID = $user["musteri_id"];
$sql = "SELECT * FROM basvurular WHERE musteri_id=:musteriid";
$db->Sorgula($sql);
$db->bind('musteriid',$bulunacakID);
$satir = $db->TamCek();



$sql = "SELECT * FROM hesap_turleri";
$db->Sorgula($sql);
$hesap_turleri = $db->TamCek();

$sql = "SELECT * FROM para_birimleri";
$db->Sorgula($sql);
$para_birimleri = $db->TamCek();






?>



<h2>Başvuru İşlemleri</h2>


    <div class="row">
        <div class="col-md-6">
            <br>
            <div class="" ><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#krediBasvuru">Kredi Başvurusu Yap</button></div>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">

                <thead>
                <tr>
                    <th>Başvuru No</th>
                    <th>Not</th>
                    <th>Tür</th>
                    <th>Durum</th>
                    <th>Limit</th>
                    <th>tarih</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($satir as $basvuru)  {?>
                    <?php
                    $durum ="";
                    if($basvuru["durum"]==0) $durum="Beklemede";
                    elseif($basvuru["durum"]==1) $durum="Reddedildi";
                    elseif($basvuru["durum"]==2) $durum="Kabul Edildi";
                    ?>
                <tr>
                    <td><?=$basvuru["basvuru_id"]?></td>
                    <td><?=$basvuru["basvuru_not"]?></td>
                    <td><?=$basvuru["tur"]?></td>
                    <td><?=$durum?></td>
                    <td><?=$basvuru["basvuru_limit"]?></td>
                    <td><?=$basvuru["tarih"]?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



    <!-- kk basvuru Modal -->
    <div class="modal fade" id="krediBasvuru" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <form action="<?=API_USER?>krediBasvurusuYap.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <h3>Açıklama</h3>
                        <textarea class="form-control" rows="3" name="not"></textarea>

                            <br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kredi Türü</label>
                                <select class="form-control" id="exampleInputEmail1" name="tur">
                                    <option value="Ev Kredisi">Ev Kredisi</option>
                                    <option value="İhtiyaç Kredisi">İhtiyaç Kredisi</option>
                                    <option value="Araba Kredisi">Araba Kredisi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Limit</label>
                                <select class="form-control" id="exampleInputPassword1" name="limit">
                                    <?php for ($i=1000;$i<=20000;$i+=500) { ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info ">Başvuru Yap</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>








<?php include "footer.php"; ?>