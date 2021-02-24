<?php

require_once ("db.php");
require_once ("component.php");

$con = OpenCon();

//create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['read'])){
    getData();
}

if(isset($_POST['update'])){
    updateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['getCats'])){
    //pass
}

if(isset($_POST['getAllTheDogs'])){
    //pass
}

if(isset($_POST['getAllThePasta'])){
    //pass
}

function createData(){
    $id_animal = returnID();
    $specieAnimal = textboxValue('animal_species');
    $rasaAnimal = textboxValue('animal_race');
    $numeAnimal = textboxValue('animal_name');
    $stagiuAnimal = textboxValue('life_stage');
    $sexAnimal = textboxValue('animal_sex');
    $cuscaAnimal = textboxValue('animal_cage');

    if(isset($_POST['neutered'])){
        $castrat = '1';
    }
    else
    {
        $castrat = '0';
    }

    $dataAnimal = textboxValue('data_input');

    if(!$rasaAnimal){
        $rasaAnimal = 'NULL';
    }
    if(!$numeAnimal){
        $numeAnimal = 'NULL';
    }
    switch ($stagiuAnimal){
        case 1:
            $stagiuAnimal = "Pui";
            break;
        case 2:
            $stagiuAnimal = "Adult";
            break;
        case 3:
            $stagiuAnimal = "Batran";
            break;
        default:
            break;
    }

    switch ($sexAnimal){
        case 1:
            $sexAnimal = "Femela";
            break;
        case 2:
            $sexAnimal = "Mascul";
            break;
        default:
            break;
    }

    if(
        $specieAnimal &&
        $rasaAnimal &&
        $numeAnimal &&
        $stagiuAnimal &&
        $sexAnimal &&
        $dataAnimal &&
        $cuscaAnimal
    ){
        $sql = "INSERT INTO `animale` (specie, rasa, nume, stagiu_viata, sex, castrat, data_inregistrare)
                    VALUES
                            ('$specieAnimal', '$rasaAnimal', '$numeAnimal', '$stagiuAnimal', '$sexAnimal', '$castrat', '$dataAnimal');";

        if(mysqli_query($GLOBALS['con'], $sql)){
            $query="INSERT INTO `ocupare_custi` (id_animal, data_final, nr_cusca)
                        VALUES ('$id_animal', NULL, '$cuscaAnimal');";
            if(mysqli_query($GLOBALS['con'], $query)) {
                textNode("succes", "Record succesfully inserted!");
            }
        }
        else{
            textNode("error", "Eroare la introducerea datelor");
            echo mysqli_error($GLOBALS['con']);
        }
    }
    else{
        textNode("error", "Informatii insuficiente");
    }
}
function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }
    else
    {
        return $textbox;
    }
}

//messages
function textNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//get data from db
function getData(){
    $sql = "SELECT * FROM `animale`";

    //function returns a statement
    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

//update data
function updateData(){
    $id_animal = textboxValue('animal_id');
    $specieAnimal = textboxValue('animal_species');
    $rasaAnimal = textboxValue('animal_race');
    $numeAnimal = textboxValue('animal_name');
    $stagiuAnimal = textboxValue('life_stage');
    $sexAnimal = textboxValue('animal_sex');

    if(isset($_POST['neutered'])){
        $castrat = '1';
    }
    else
    {
        $castrat = '0';
    }

    $dataAnimal = textboxValue('data_input');

    if(!$rasaAnimal){
        $rasaAnimal = 'NULL';
    }
    if(!$numeAnimal){
        $numeAnimal = 'NULL';
    }
    switch ($stagiuAnimal){
        case 1:
            $stagiuAnimal = "Pui";
            break;
        case 2:
            $stagiuAnimal = "Adult";
            break;
        case 3:
            $stagiuAnimal = "Batran";
            break;
        default:
            break;
    }

    switch ($sexAnimal){
        case 1:
            $sexAnimal = "Femela";
            break;
        case 2:
            $sexAnimal = "Mascul";
            break;
        default:
            break;
    }
    $sql = "UPDATE `animale` SET `specie`='$specieAnimal',
                                 `rasa`='$rasaAnimal',
                                 `nume`='$numeAnimal',
                                 `stagiu_viata`='$stagiuAnimal',
                                 `sex`='$sexAnimal',
                                 `castrat`='$castrat',
                                 `data_inregistrare`='$dataAnimal'
                     WHERE `id_animal`='$id_animal';";

    if(mysqli_query($GLOBALS['con'], $sql)){
        textNode("succes", "Inserare actualizata cu succes");
    }
    else{
        textNode("error", "Eroare la actualizarea datelor");
    }
}

function deleteRecord(){
    $animal_id = (int)textboxValue("animal_id");

    $sql = "DELETE FROM `ocupare_custi` WHERE id_animal = '$animal_id';";
    $sql.= "DELETE FROM `adoptii` WHERE id_animal = '$animal_id';";
    $sql.= "DELETE FROM `animale` WHERE id_animal=$animal_id;";

    if(mysqli_multi_query($GLOBALS['con'], $sql)){
        textNode("succes", "Inregistrarea a fost stearsa");
    }
    else{
        textNode("error", "Eroare la stergere");
    }
}

function setID(){
    $getid = getData();
    $id = 1000;
    if($getid){
        while($row = mysqli_fetch_assoc($getid)){
            $id = $row['id_animal'];
        }
    }
    echo $id+1;
}

function returnID(){
    $getid = getData();
    $id = 1000;
    if($getid){
        while($row = mysqli_fetch_assoc($getid)){
            $id = $row['id_animal'];
        }
    }
    return $id+1;
}
