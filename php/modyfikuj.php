<?php
$query = "SELECT * FROM `rower`";
$result = $connect->query($query);

echo<<<END
<div class="container-fluid">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead style="background-color: #c5c5c5;" id="thead">
                    <tr>
                        <th>#</th>
                        <th>Zdjecie</th>
                        <th>Nazwa</th>
                        <th>Producent</th>
                        <th>Przerzutki przód</th>
                        <th>Przerzutki tył</th>
                        <th>Rama</th>
                        <th>Koła</th>
                        <th style="width:100px;">Modyfikuj</th>
                    </tr>
                </thead>
                <tbody id="myTable">
END;

while($row=$result->fetch_assoc())
{
    $id = $row['id'];
    $nazwa = $row['nazwa'];
    $producent = $row['producent'];
    $p_przod = $row['przerzutki_przod'];
    $p_tyl = $row['przerzutki_tyl'];
    $rama = $row['rama'];
    $kola = $row['kola'];
    $sciezka = $row['gfx'];

echo<<<END
    <tr>
    <td>$id</td>
    <td style="max-width:450px;">
            <img src="$sciezka" class="img-fluid rounded maxWidth" >
    </td>
    <td>$nazwa</td>
    <td>$producent</td>
    <td>$p_przod</td>
    <td>$p_tyl</td>
    <td>$rama</td>
    <td>$kola</td>
    <td>
    <form action='form/modyfikuj.php' method='GET'>
        <input type='hidden' name='id' value='$id' />
        <button class="btn btn-warning" type="submit" style="margin-top:40px;color:black;font-size:26px;">Modyfikuj</button>
    </form>

    </td>
END;
}
echo<<<END
</tbody>
</table>
</div>
</div>
</div>


END;

?>
