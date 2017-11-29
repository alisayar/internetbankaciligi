<?php include "header.php"; ?>
<?php include "navbar.php"; ?>


<?php
include "../system/class.database.php";
$db=new Database();


if(isset($_POST["durum"])){
    if($_POST["durum"]>=0 && $_POST["durum"]<=1){
        $durum=1-$_POST["durum"];
        $tablo='banka';
        $sorgu_alan='banka_id';
        $sorgu_deger='1';

        $alanlar=array("sistem") ;
        $degerler=array($durum) ;

        $db->KayitGuncelle($tablo, $alanlar, $degerler, $sorgu_alan, $sorgu_deger);
    }
}

$bulunacakID = 1;
$sql = "SELECT sistem FROM banka WHERE banka_id=:aranankisi";
$db->Sorgula($sql);
$db->bind('aranankisi',$bulunacakID);
$satir = $db->TekCek();

$sistem_durumu="Sistem Çalışıyor!";
if($satir["sistem"]==0 || $satir["sistem"]!=1){
    $sistem_durumu="Sistem Durduruldu!";
}


?>


<h2>Sistem Ayarlari</h2>





<h4>Şuanki sistem durumu : <?=$sistem_durumu?></h4>
<div align="center">
    <form method="post" action="sistem-ayarlari.php">
    <input type="text" name="durum" value="<?=$satir["sistem"]?>" hidden>
    <button type="submit" class="btn btn-primary btn-lg">Sistemi Durdur<br>/Başlat</button>
    </form>
</div>





<!-- detay Modal -->
<div class="modal fade" id="detay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Müşteri Detay</h4>
            </div>
            <div class="modal-body">
                <div class="row"><br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ad</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Soyad</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefon</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parola</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Anne Kızlık Soyadı</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Adres</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Müşteri No</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ünvanı</label>
                                <input type="email" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-md-8">
                            <button class="btn btn-block btn-success">Güncelle</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bs-example" data-example-id="bordered-table"><br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Hesap No
                        </th>
                        <th>Açılış Tarihi
                        </th>
                        <th>Tür
                        </th>
                        <th>Bakiye
                        </th>
                        <th>
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    <tr>
                        <td>567890
                        </td>
                        <td>224

                        </td>
                        <td>
                            hdgg
                        </td>
                        <td>
                            <button class="btn btn-md btn-danger">Sil</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>




<?php include "footer.php"; ?>
