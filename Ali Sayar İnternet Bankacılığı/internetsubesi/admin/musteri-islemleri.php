<?php include "header.php"; ?>
<?php include "navbar.php"; ?>


<?php
include "../system/class.database.php";
$db=new Database();


$sql = "SELECT * FROM musteriler";
$db->Sorgula($sql);
$musteriler = $db->TamCek();




?>


<h2>Müşteri İşlemleri</h2>

<button class="btn btn-primary" data-toggle="modal" data-target="#musteriEkle">Müşteri Ekle</button>

<table class="table table-hover">

    <thead>
    <tr>
        <th>Ad Soyad</th>
        <th>Müşteri No</th>
        <th>Email</th>
        <th>Telefon</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($musteriler as $musteri) {?>
    <tr>
        <td><?=$musteri["ad"]?> <?=$musteri["soyad"]?></td>
        <td><?=$musteri["musteri_no"]?></td>
        <td><?=$musteri["email"]?></td>
        <td><?=$musteri["telefon"]?></td>
        <td><button class="btn btn-info" data-toggle="modal" data-target="#detay<?=$musteri["musteri_id"]?>">Detay</button> </td>
    </tr>
        <!-- detay Modal -->
        <div class="modal fade" id="detay<?=$musteri["musteri_id"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Müşteri Detay</h4>
                    </div>
                    <form action="../system/admin/musteriGuncelle.php" method="post">
                        <input type="text" name="id" value="<?=$musteri["musteri_id"]?>" hidden>
                    <div class="modal-body">
                        <div class="row"><br><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ad</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="ad" value="<?=$musteri["ad"]?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Soyad</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="soyad" value="<?=$musteri["soyad"]?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefon</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="telefon" value="<?=$musteri["telefon"]?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="email" value="<?=$musteri["email"]?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Parola</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="parola" value="<?=$musteri["parola"]?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Anne Kızlık Soyadı</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="anne_kizlik_soyad" value="<?=$musteri["anne_kizlik_soyad"]?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Adres</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="adres" value="<?=$musteri["adres"]?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-block btn-success">Güncelle</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="../system/admin/musteriSil.php?id=<?=$musteri["musteri_id"]?>" class="btn btn-block btn-danger">Sil</a>
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




<!-- Ekle Modal -->
<div class="modal fade" id="musteriEkle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Müşteri Ekle</h4>
            </div>
            <form action="../system/admin/musteriEkle.php" method="post">
            <div class="modal-body">
                <div class="row"><br><br>
                    <div class="col-lg-6">
                        <div class="input-group-lg">
      <span class="input-group-btn">
      </span>
                            <input type="text" class="form-control" placeholder="Ad" name="ad">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="input-group-lg">
                            <input type="text" class="form-control" placeholder="Soyad" name="soyad">
                            <span class="input-group-btn">
      </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><br><br><!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group-lg">
                            <input type="text" class="form-control" placeholder="Parola" name="parola">
                            <span class="input-group-btn">
      </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><br><br><!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group-lg">
      <span class="input-group-btn">
      </span>
                            <input type="text" class="form-control" placeholder="Cep Telefonu" name="telefon">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="input-group-lg">
                            <input type="text" class="form-control" placeholder="E-Mail" name="email">
                            <span class="input-group-btn">
      </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><br><br><!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group-lg">
      <span class="input-group-btn">
      </span>
                            <input type="text" class="form-control" placeholder="A.Kızlık Soyadı" name="anne_kizlik_soyad">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="input-group-lg">
                            <input type="text" class="form-control" placeholder="Adres" name="adres">
                            <span class="input-group-btn">
      </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><br><br><!-- /.row -->
                <div class="row">
                </div><br><br><!-- /.row -->
                <div align="center">
                    <button type="submit" class="btn btn-primary btn-lg">Müşteri Ekle</button>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>





<?php include "footer.php"; ?>
