

<?php include "header.php"; ?>
<?php include "navbar.php"; ?>

<?php




$bulunacakID = $user["musteri_no"];
$sql = "SELECT b.bakiye FROM hesaplar h  LEFT join bakiyeler b on b.hesap_id=h.hesap_id WHERE musteri_no=:arananmusteri";
$db->Sorgula($sql);
$db->bind('arananmusteri',$bulunacakID);
$satir = $db->TekCek();


$bakiye="";
if($satir["bakiye"]==null){
    $bakiye="Hesabınız yok.";
}else{
    $bakiye=$satir["bakiye"];
}


?>



    <div class="row" align="center">
        <div class="col-md-3">
            <h1>Hesap Bakiyesi:</h1>
        </div>
        <div class="col-md-2">
            <h1><?=$bakiye?></h1>
        </div>
    </div>

    <div class="row">
        <table class="table"> <caption><h3>Güncel Borsa</h3></caption>
            <thead>
            <tr>
                <th></th>
                <th>Para Birimi</th>
                <th>Alış Fiyatı</th>
                <th>Satış Fiyatı</th>
            </tr>
            </thead>
            <tbody> <tr> <th scope="row">1</th>
                <td>Euro</td> <td>3.825</td>
                <td>3.875</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Dolar</td>
                <td>3.579</td>
                <td>3.601</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Pound</td>
                <td>3.911</td>
                <td>3.987</td>
            </tr>
            </tbody>
        </table>
    </div>



<?php include "footer.php"; ?>