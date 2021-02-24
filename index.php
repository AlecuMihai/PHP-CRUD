<?php
require_once("php/component.php");
require_once("php/db.php");
require_once("php/operation.php");

OpenCon();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adapost pentru animale</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0cd324ccff.js" crossorigin="anonymous"></script>
    <!-- custom stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded">
            <i class="fas fa-dog"></i>
            Adapost pentru animale
            <i class="fas fa-cat"></i>
        </h1>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="index.php" method="post" class="w-50">
                <div class="py-2">

                    <div class="input-group mb-2">
                        <div class="form-group">
                            <span class="input-group-text bg-warning" id="basic-addon1"><i
                                        class="fas fa-id-badge fa-2x"></i></span>
                        </div>
                        <input type="number" class="form-control" name='animal_id' value='<?php setID() ?>'
                               aria-label="id_animal" aria-describedby="basic-addon1">
                        <small id="animalHelp" class="form-text text-muted">ID-ul animalului este folosit in
                            identificarea acestuia. Nu este obligatorie introducerea unei valori.</small>
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text bg-warning">Specia si rasa animalului</span>
                        <input type="text" aria-label="Specia" class="form-control" placeholder="Specia"
                               name="animal_species">
                        <input type="text" aria-label="Rasa" class="form-control" placeholder="Rasa" name="animal_race">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-warning" id="basic-addon1"><i class="fas fa-paw fa-2x"></i></span>
                        </div>
                        <input type="text" class="form-control" name='animal_name' placeholder="Numele animalului"
                               aria-label="" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-warning" for="inputGroupSelect01">Stagiu de viata</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="life_stage">
                            <option value="1">Pui</option>
                            <option value="2">Adult</option>
                            <option value="3">Batran</option>
                        </select>
                    </div>

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-warning" for="inputGroupSelect01">Sex</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="animal_sex">
                            <option value="1">Femela</option>
                            <option value="2">Mascul</option>
                        </select>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="neutered" value='1' id="checkbox1">
                        <label class="form-check-label " for="checkbox1">
                            Animalul este castrat?
                        </label>
                    </div>

                    <div class="form-group row py-1">
                        <label for="example-date-input" class="col-2 col-form-label">Data</label>
                        <div class="col-10">
                            <input class="form-control" type="date" value="2020-12-31" id="example-date-input"
                                   name="data_input">
                        </div>
                    </div>

                    <div class="form-group py-2">
                        <label for="animal_cage">Cusca in care va fi introdus animalul:</label>
                        <select multiple class="form-control" id="animal_cage" name="animal_cage">
                            <option>1000</option>
                            <option>1001</option>
                            <option>1002</option>
                            <option>1003</option>
                            <option>1004</option>
                            <option>1005</option>
                            <option>1006</option>
                            <option>1007</option>
                            <option>1008</option>
                            <option>1009</option>
                            <option>1010</option>
                            <option>1011</option>
                            <option>1012</option>
                            <option>1013</option>
                            <option>1014</option>
                            <option>1015</option>
                            <option>1016</option>
                            <option>1017</option>
                            <option>1018</option>
                            <option>1019</option>
                            <option>1020</option>
                            <option>1021</option>
                            <option>1022</option>
                            <option>1023</option>
                            <option>1024</option>
                            <option>1025</option>
                            <option>1026</option>
                            <option>1027</option>
                            <option>1028</option>
                            <option>1029</option>
                            <option>1030</option>
                            <option>1031</option>
                            <option>1032</option>
                        </select>
                    </div>

                </div>
                <div class="d-flex justify-content-center">
                    <?php
                    buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus 2x'></i>", "create", "data-toggle='tooltip' data-placement='bottom' title='Create'");
                    buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync 2x'></i>", "read", "data-toggle='tooltip' data-placement='bottom' title='Read'");
                    buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "data-toggle='tooltip' data-placement='bottom' title='Update'");
                    buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt 2x'></i>", "delete", "data-toggle='tooltip' data-placement='bottom' title='Delete'");
                    ?>
                </div>
            </form>
        </div>
        <form action="index.php" method="post">
            <div class="d-flex">
                <?php
                buttonElement("btn-getCats", "btn btn-info", "<i class='fas fa-cat 2x'></i>", "getCats", "data-toggle='tooltip' data-placement=bottom title='Afiseaza toate pisicile'");
                buttonElement("btn-getDogs", "btn btn-info", "<i class='fas fa-dog 2x'></i>", "getDogs", "data-toggle='tooltip' data-placement=bottom title='Afiseaza toti cainii'");
                buttonElement("btn-getPasta", "btn btn-info", "<i class='fas fa-pastafarianism 2x'></i>", "getPasta", "data-toggle='tooltip' data-placement=bottom title='Alte specii'");
                ?>
            </div>
        </form>
        <!-- Boostrap table -->
        <div class="container text-center"
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Specia</th>
                    <th>Rasa</th>
                    <th>Numele</th>
                    <th>Stagiul de viata</th>
                    <th>Sexul</th>
                    <th>Castrat</th>
                    <th>Data inregistrarii</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody id="tbody">
                <?php

                if (isset($_POST['read'])) {
                    $result = getData();

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['id_animal']; ?></td>
                                <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['specie']; ?></td>
                                <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['rasa']; ?></td>
                                <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['nume']; ?></td>
                                <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['stagiu_viata']; ?></td>
                                <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['sex']; ?></td>
                                <td data-id="<?php echo $row['id_animal'] ?>"><?php if ($row['castrat']) {
                                        echo "Da";
                                    } else {
                                        echo "Nu";
                                    }; ?></td>
                                <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['data_inregistrare']; ?></td>
                                <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id_animal']; ?>"></i></td>
                            </tr>
                            <?php
                        }
                    }
                } else if (isset($_POST['getCats'])) {
                    $result = getData();

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (strtolower($row['specie']) == "pisica") {
                                ?>
                                <tr>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['id_animal']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['specie']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['rasa']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['nume']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['stagiu_viata']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['sex']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php if ($row['castrat']) {
                                            echo "Da";
                                        } else {
                                            echo "Nu";
                                        } ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['data_inregistrare']; ?></td>
                                    <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id_animal']; ?>"></i>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                } else if (isset($_POST['getDogs'])) {
                    $result = getData();

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (strtolower($row['specie']) == "caine") {
                                ?>
                                <tr>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['id_animal']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['specie']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['rasa']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['nume']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['stagiu_viata']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['sex']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php if ($row['castrat']) {
                                            echo "Da";
                                        } else {
                                            echo "Nu";
                                        }; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['data_inregistrare']; ?></td>
                                    <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id_animal']; ?>"></i>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                } else if (isset($_POST['getPasta'])) {
                    $result = getData();

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (strtolower($row['specie']) != "pisica" && strtolower($row['specie']) != "caine") {
                                ?>
                                <tr>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['id_animal']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['specie']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['rasa']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['nume']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['stagiu_viata']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['sex']; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php if ($row['castrat']) {
                                            echo "Da";
                                        } else {
                                            echo "Nu";
                                        }; ?></td>
                                    <td data-id="<?php echo $row['id_animal'] ?>"><?php echo $row['data_inregistrare']; ?></td>
                                    <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id_animal']; ?>"></i>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

<script src="php/main.js"></script>

</body>
</html>