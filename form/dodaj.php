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
    function czyNaPewno() {
        return confirm('Czy na pewno chcesz opuścić tę stronę?');
    }

    </script>
</head>

<body>
    <div class="container">


        <div class="row bg-info rounded">
            <div class="col-8 offset-2" style="margin-bottom:10px;">
                <span class="display-4"><b>Dodaj rower do ocenienia</b></span>
            </div>
        </div>
        <div class="row">

            <!--  Formularz dodawania do tabeli-->
            <div class="col-8 offset-2">

                <form action="../index.php" method="POST" enctype="multipart/form-data">
                    <fieldset class="form-group">
                        <label>Nazwa</label>
                        <input type="text" name="name" class="form-control" placeholder="np. Rower3000">
                    </fieldset>

                    <fieldset class="form-group">
                        <label>Producent</label>
                        <input type="text" name="producent" class="form-control" placeholder="np. Zumbi">
                    </fieldset>

                    <fieldset class="form-group">
                        <label>Ilość przerzutek z przodu</label>
                        <input type="number" name="przerzutkiP" class="form-control" placeholder="np. 3" min="1" max="20" pattern="[1-2]{1}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label>Ilość przerzutek z tyłu</label>
                        <input type="number" name="przerzutkiT" class="form-control" placeholder="np. 7" min="1" max="20">
                    </fieldset>

                    <fieldset class="form-group">
                        <label>Jaką posiada rame?</label>
                        <input type="text" name="rama" class="form-control" placeholder="np. aluminiowa">
                    </fieldset>

                    <fieldset class="form-group">
                        <label>Jakiej wielkość ma koła? (w calach)</label>
                        <input type="number" name="kola" class="form-control" placeholder="np. 26">
                    </fieldset>

                    <div class="row">
                        <div class="col-6">
                            <fieldset>
                                <label>Dodaj zdjęcie</label>
                                <input type="file" name="file" class="form-control-file"/>


                            </fieldset>
                        </div>
                        <div class="col-6 text-right">
                            <br>
                            <input type="hidden" name="parametr" class="btn btn-primary" value="form">
                            <input type="submit" class="btn btn-primary" value="Dodaj">
                            <a href="oceniarka/index.php"><input type="button" class="btn btn-warning" onclick="return czyNaPewno()" value="Wstecz"></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
