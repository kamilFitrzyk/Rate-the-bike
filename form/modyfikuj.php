<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oceniarka - dodaj</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript">
    function opuscic() {
        return confirm('Czy na pewno chcesz opuścić tę stronę?');
    }
    function modyfikuj()
    {
        return confirm('Czy na pewno chcesz modyfikować?');
    }

    </script>
</head>

<body>
    <div class="container">



            <div class="card text-center col-12 display-4 bg-info" style="margin-top:10px;margin-bottom:10px;">
              <p class="card-text" style="margin-bottom:10px;">Zmień to co chcesz i kliknij Modyfikuj</p>

            </div>

        <div class="row">

            <!--  Formularz dodawania do tabeli-->
            <div class="col-10 offset-1">
<?php

if(ISSET($_GET['id']))
{
    $connect = new mysqli('localhost','root','','oceniarka');
    $number = $_GET['id'];
    $query = "SELECT * FROM rower WHERE id='$number'";
    $result = $connect->query($query);

    while($row=$result->fetch_assoc())
    {


                $id = $row['id'];
             $nazwa = $row['nazwa'];
         $producent = $row['producent'];
        $przerzutkiP = $row['przerzutki_przod'];
        $przerzutkiT = $row['przerzutki_tyl'];
              $rama = $row['rama'];
              $kola = $row['kola'];
           $sciezka = $row['gfx'];
        echo<<<END

        <form action="../index.php" method="POST" enctype="multipart/form-data">
            <fieldset class="form-group">
                <label>Nazwa</label>
                <input type="text" name="name" class="form-control" value="$nazwa">
            </fieldset>

            <fieldset class="form-group">
                <label>Producent</label>
                <input type="text" name="producent" class="form-control" value="$producent">
            </fieldset>

            <fieldset class="form-group">
                <label>Ilość przerzutek z przodu</label>
                <input type="number" name="przerzutkiP" class="form-control" value="$przerzutkiP" min="1" max="20" pattern="[1-2]{1}">
            </fieldset>

            <fieldset class="form-group">
                <label>Ilość przerzutek z tyłu</label>
                <input type="number" name="przerzutkiT" class="form-control" value="$przerzutkiT" min="1" max="20">
            </fieldset>

            <fieldset class="form-group">
                <label>Jaką posiada rame?</label>
                <input type="text" name="rama" class="form-control" value="$rama">
            </fieldset>

            <fieldset class="form-group">
                <label>Jakiej wielkość ma koła? (w calach)</label>
                <input type="number" name="kola" class="form-control" value="$kola">
            </fieldset>

            <img src="../$sciezka" class="img-fluid rounded maxWidth" ><br /><br>
            <div class="row">
                <div class="col-6">
                    <fieldset>

                        <label>Dodaj nowe zdjęcie</label>
                        <input type="file" name="file" class="form-control-file" />
                    </fieldset>
                </div>
                <div class="col-6 text-right">
                    <br>
                    <input type="hidden" name="parametr" class="btn btn-primary" value="formMod">
                    <input type="hidden" name="id" value="$id">

                    <input type="submit" class="btn btn-primary" value="Modyfikuj" onclick="return modyfikuj()">
                    <a href="../index.php"><input type="button" class="btn btn-warning" onclick="return opuscic()" value="Wstecz"></a>
                </div>
            </div>
        </form>
        <div class="odstep"></div>
        <div class="odstep"></div>
END;

    }

}

?>





            </div>
        </div>
    </div>

</body>

</html>
