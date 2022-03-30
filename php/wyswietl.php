<?php

            $query = "SELECT * FROM rower";
            $result = $connect->query($query);

            echo<<<END
            <div class="container-fluid">
                <div class="row">
                    <div class="table-responsive">
                    <style>th {vertical-align: text-top;}</style>
                        <table class="table table-hover">

                        <thead style="background-color: #c5c5c5;" id="thead">
                            <tr>
                                <th>#<br />&nbsp;</th>
                                <th>Zdjecie<br />&nbsp;</th>
                                <th>Nazwa<br />&nbsp;</th>
                                <th>Producent<br />&nbsp;</th>
                                <th>Przerzutki <br />przód</th>
                                <th>Przerzutki <br />tył</th>
                                <th>Rama<br />&nbsp;</th>
                                <th>Koła<br />&nbsp;</th>
                                <th>Ocena<br /> pozytywna</th>
                                <th>Ocena <br / />negatywna</th>
                            </tr>
                        </thead>


                            <tbody id="myTable">

END;

            while($row=$result->fetch_assoc())
            {
                         $id = $row['id'];
        		      $nazwa = $row['nazwa'];
        		  $producent = $row['producent'];
        		$przerzutkiP = $row['przerzutki_przod'];
        		$przerzutkiT = $row['przerzutki_tyl'];
        		       $rama = $row['rama'];
        		       $kola = $row['kola'];
                    $ocena_p = $row['ocena_pozytywna'];
                    $ocena_n = $row['ocena_negatywna'];
        		    $sciezka = $row['gfx'];

            echo<<<END
            	<tr>
                <td>$id</td>
                <td style="max-width:450px;">

                        <img src="$sciezka" class="img-fluid rounded maxWidth" >

                </td>
            	<td>$nazwa</td>
            	<td>$producent</td>
            	<td>$przerzutkiP</td>
            	<td>$przerzutkiT</td>
                <td>$rama</td>
            	<td>$kola</td>
                <td>$ocena_p</td>
                <td>$ocena_n</td>

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
