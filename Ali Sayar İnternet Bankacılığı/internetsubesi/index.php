<?php include 'header.php'; ?>





<div class="row">
    <div class="col-md-6">
        <br>
        <form action="system/giris.php" method="post">
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
            <input type="text" class="form-control" name="hesapno" placeholder="Müşteri Numarası" aria-describedby="basic-addon1">
        </div>
        <br>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
            <input type="password" class="form-control" name="parola" placeholder="Şifre" aria-describedby="basic-addon1">
        </div>
        <br>
        <div class="" align="end"><button type="submit" class="btn btn-primary btn-lg">Giriş</button></div>
        </form>
        <br>
        <?php if(isset($_GET["hata"])){ ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?=$_GET["hata"]?></strong>
            </div>
        <?php } ?>

    </div>



    <div class="col-md-6">
        <img src="img/ziraat_amblem.png" alt="İnternet Bankacılığı" class="img-rounded" width="50%">

    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="img/136.jpg" />
                </div>
                <div class="item">
                    <img src="img/174.png" />
                </div>
                <div class="item">
                    <img src="img/175.png"/>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Geri</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">İleri</span>
                </a>
            </div>
        </div>
    </div>
</div>




<?php include 'footer.php'; ?>
