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
                        <th># <br />&nbsp; </th>
                        <th>Zdjecie <br />&nbsp; </th>
                        <th>Nazwa <br />&nbsp; </th>
                        <th>Producent <br />&nbsp;</th>
                        <th>Przerzutki <br /> przód</th>
                        <th>Przerzutki <br /> tył</th>
                        <th>Rama <br />&nbsp; </th>
                        <th>Koła <br />&nbsp; </th>
                        <th>Ocena <br /> pozytywna</th>
                        <th>Ocena <br /> negatywna</th>
                        <th>w % <br />&nbsp; </th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody id="myTable">
END;
while($row=$result->fetch_assoc())
{
    $id = $row['id'];
    $nazwa = $row['nazwa'];
    $producent = $row['producent'];
    $sciezka = $row['gfx'];
    $ocena_pozytywna = $row['ocena_pozytywna'];
    $ocena_negatywna = $row['ocena_negatywna'];
    $p_przod = $row['przerzutki_przod'];
    $p_tyl = $row['przerzutki_tyl'];
    $rama = $row['rama'];
    $kola = $row['kola'];

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
    <td>$ocena_pozytywna</td>
    <td>$ocena_negatywna</td>

    <td>
        <div class="odstep1"></div>

        <div style="background-color:black;width:100px;height:10px;border-radius:30px;">
            <div id="div$id" style="background-color:#2196f3;<script></script>px;height:10px;border-radius:10px;"></div>
        </div>
        <script>
            var ocena$id = ($ocena_pozytywna/($ocena_pozytywna+$ocena_negatywna))*100;
                if(ocena$id<0){ocena$id=0}
            var d$id = document.getElementById("div$id");
            d$id.style.width = ocena$id+"%";
        </script>

    </td>
    <td>
        <form action='' method='POST'>
        <input type='hidden' name='parametr' value='ocena' />
        <input type='hidden' name='id' value='$id' />
        <input type='hidden' name='like' value='like' />
        <button type="submit" class="btn-success btn"><img src="img/Iconsmind-Outline-Like-2.ico" alt="łapka w góre" width="50px"></button>
        </form>
    </td>
    <td>
        <form action='' method='POST'>
        <input type='hidden' name='parametr' value='ocena' />
        <input type='hidden' name='id' value='$id' />
        <input type='hidden' name='like' value='unlike' />
        <button type="submit" class="btn-danger btn"><img src="img/Iconsmind-Outline-UnLike-2.ico" alt="łapka w dół" width="50px"></button>
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
