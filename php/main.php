<?php
error_reporting(0);
function connect($host,$user,$password) {
    $connect = new mysqli($host,$user,$password);

        $query_create_db = "CREATE DATABASE IF NOT EXISTS `oceniarka` CHARACTER SET utf8 COLLATE utf8_polish_ci";

        $connect->query($query_create_db);
        $connect-> select_db('oceniarka');

        $query_create_table = "CREATE TABLE IF NOT EXISTS `rower` (
                            id INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                   nazwa varchar(255) NOT NULL,
               producent varchar(255) NOT NULL,
              przerzutki_przod INT(1) NOT NULL,
                przerzutki_tyl INT(1) NOT NULL,
                    rama varchar(255) NOT NULL,
                    kola varchar(255) NOT NULL,
               ocena_pozytywna INT(6) NOT NULL,
               ocena_negatywna INT(6) NOT NULL,
                     gfx varchar(255) NOT NULL
        )";

        $connect->query($query_create_table);


        // //sprawdza ile jest rekordow w tabeli
        $query_ile = "SELECT COUNT('id') AS a FROM rower";
        $result =$connect->query($query_ile);
        $result=$result->fetch_assoc();

        if($result['a']=="0")
        {
          $query_example = "INSERT INTO `rower` (`nazwa`,`producent`,`przerzutki_przod`,`przerzutki_tyl`,`rama`,`kola`,`ocena_pozytywna`,`ocena_negatywna`,`gfx`)
          VALUES ('Przyklad','Cross','3','7','stalowa','26','8','3','gfx/rower.jpg')";
          $connect->query($query_example);
        }

        if($connect->connect_errno){
            echo $mysqli->connect_errno;
            echo $mysqli->connect_error;
        }

        $connect->query("SET CHARSET utf8");
            $connect->close();
}



function wyswietl_POST()
{
    $connect = new mysqli('localhost','root','','oceniarka');
    if(ISSET($_POST['parametr']))
    {
    	if($_POST['parametr']=='form'){

    		move_uploaded_file($_FILES['file']['tmp_name'], "gfx/".$_FILES['file']['name']);
            $sciezka= "'"."gfx/".$_FILES['file']['name']."'";

    		$name= "'".$_POST['name']."'";
            $producent= "'".$_POST['producent']."'";
            $przerzutkiP= "'".$_POST['przerzutkiP']."'";
            $przerzutkiT= "'".$_POST['przerzutkiT']."'";
            $rama= "'".$_POST['rama']."'";
            $kola= "'".$_POST['kola']."'";

    		$queryin="INSERT INTO rower(nazwa, producent,przerzutki_przod, przerzutki_tyl, rama, kola, gfx)
    		VALUES ($name, $producent, $przerzutkiP, $przerzutkiT, $rama, $kola,$sciezka)";

    		$connect->query($queryin);
            header("Location: index.php?parametr=wyswietl");
            exit();
    	}
        if($_POST['parametr']=='formMod')
        {
            $id = "'".$_POST['id']."'";
            $name= "'".$_POST['name']."'";
            $producent= "'".$_POST['producent']."'";
            $przerzutkiP= "'".$_POST['przerzutkiP']."'";
            $przerzutkiT= "'".$_POST['przerzutkiT']."'";
            $rama= "'".$_POST['rama']."'";
            $kola= "'".$_POST['kola']."'";


            $query = "UPDATE rower SET nazwa=$name, producent=$producent, przerzutki_przod=$przerzutkiP, przerzutki_tyl=$przerzutkiT, rama=$rama, kola=$kola WHERE id=$id";
            $connect->query($query);

            //jezeli rozmiar jest rozny od zera
            if($_FILES['file']['size']>0)
            {
                move_uploaded_file($_FILES['file']['tmp_name'], "gfx/".$_FILES['file']['name']);
                $sciezka= "'"."gfx/".$_FILES['file']['name']."'";

                $query = "UPDATE rower SET gfx=$sciezka WHERE id=$id";
                $connect->query($query);
            }
            header("Location: index.php?parametr=wyswietl");
            exit();
        }
        if($_POST['parametr']=='ocena')
        {
            $id = $_POST['id'];

            $ilosc = "SELECT ocena_pozytywna,ocena_negatywna FROM rower WHERE id=$id";
            $o = $connect->query($ilosc);
            while($row=$o->fetch_assoc())
            {
                $iloscP = $row['ocena_pozytywna']+1;
                $iloscN = $row['ocena_negatywna']+1;
            }


            if($_POST['like']=='like')
            {
                $query = "UPDATE rower SET ocena_pozytywna=$iloscP WHERE id=$id";
            }else
            if($_POST['like']=='unlike')
            {
                $query = "UPDATE rower SET ocena_negatywna=$iloscN WHERE id=$id";
            }

            $connect->query($query);
            header("Location: index.php?parametr=ocen");
            exit();
        }

    }
        $connect->close();
}







function wyswietl_GET()
{
    if(ISSET($_GET['parametr']))
    {
        $connect = new mysqli('localhost','root','','oceniarka');

//-------------------------------------WYSWIETLANIE------------------------------
    	if($_GET['parametr']=='wyswietl')
        {
            ?><?php require_once "wyswietl.php"?><?php
        }
//-------------------------------------USUN------------------------------
        if($_GET['parametr']=='usun')
        {

            ?><?php require_once "usun.php"?><?php

        }
//-------------------------------------DELETE------------------------------
        if($_GET['parametr']=='delete')
        {
            $id = $_GET['id'];
    		$query = "DELETE FROM `rower` WHERE id IN ('$id')";
    		$result=$connect->query($query);
            header("Location: index.php?parametr=wyswietl");
        }
//-------------------------------------MODYFIKUJ------------------------------
        if($_GET['parametr']=='modyfikuj')
        {

            ?><?php require_once "modyfikuj.php"?><?php

        }
//-------------------------------------OCEN------------------------------

        if($_GET['parametr']=='ocen')
        {
            ?><?php require_once "ocen.php" ?><?php
        }


        $connect->close();
    }


}











 ?>
