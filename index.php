<!doctype html>
<html lang="pl">

<head>
    <title>Oceniarka</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <?php require_once "php/main.php" ?>

    <?php connect('localhost','root',''); ?>

</head>

<body>
    <div class="container-fluid">

        <!-- Navigation -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                        <a class="navbar-brand" href="index.php">Oceniarka</a>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?parametr=wyswietl">Wyświetl
                            <span class="sr-only">(current)</span>
                          </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="form/dodaj.php">Dodaj</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?parametr=usun">Usuń</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?parametr=modyfikuj">Modyfikuj</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?parametr=ocen">Oceń</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?parametr=kontakt">Kontakt</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--  przerwa 20px-->
        <div class="odstep"></div>

        <!--  jumbotron-->
        <div class="container-fluid" style="font-weight: bold;">
            <div class="row">
                <div class="col-12">
                    <div class="jumbotron">
                        <h1 class="display-3">Oceniarka rowerów</h1>

                        <hr class="m-y-md">
                        <!-- -------------------------------------KONTAKT------------------------------ -->
                        <?php if(ISSET($_GET['parametr'])){if($_GET['parametr']=='kontakt'){
                            echo "Autor: Kamil Fitrzyk";
                            echo "<br><p class='font-weight-normal'>Projekt oceniarki rowerów. Na tej stronie możesz dodać swój rower, modyfikować, usuwać i oceniać</p>";}}?>


                            <!-- 2 obrazki na glownej -->
                        <?php if (empty($_GET)):?>
                                <div class="content">
                                    <div class="row">

                                        <div class="card col-lg-3 col-sm-11 offset-1" style="background-color:#ccc;padding-top:10px;">
                                            <img class="card-img-top" src="img/bike1.png" alt="Card image cap">
                                            <div class="card-block">
                                                <h2 class="card-title">Oceniarka</h2>
                                                <p class="card-text" style="font-size:20px;">Na tej stronie możesz oceniać rowery innych użytkowników</p>

                                            </div>
                                        </div>

                                        <div class="card col-lg-6 col-sm-11 offset-1" style="background-color:#ccc;padding-top:10px;">
                                            <img class="card-img-top" src="img/bike2.jpg" alt="Card image cap">
                                            <div class="card-block">
                                                <h2 class="card-title">Oceniaj</h2>
                                                <p class="card-text" style="font-size:20px;">Oceniaj rowery na których jeździłeś</p>

                                            </div>
                                        </div>
                                        <div class="odstep"></div>

                                    </div>
                                </div>
                        <?php endif;?>

                    </div>
                </div>
            </div>
        </div>

        <?php  wyswietl_POST() ?>
        <?php wyswietl_GET() ?>


  <?php if(!isset($_GET['parametr']) || !($_GET['parametr']=="kontakt")): ?>
          <div class="row">
            <div class="col-12" style="height:40px;"></div>
            <div class="col-12" style="height:40px;"></div>
            <div class="col-12 footer" style="background-color:#888;height:40px;text-align:center;position:static;bottom:0;">
                <p style="padding-top:5px;" >&copy;Oceniarka - Autor: Kamil Fitrzyk</p>
            </div>
          </div>
  <?php endif; ?>

    </div>


</body>

</html>
