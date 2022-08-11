<?php

$missing_data = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once './inc/upload.php';

//     var_dump(__LINE__, $_POST);
//     var_dump(__LINE__, $_FILES);

    if (
        !empty($_POST['f_name']) &&
        !empty($_POST['l_name']) &&
        !empty($_POST['city']) &&
        !empty($_POST['lang']) &&
        !empty($_POST['info']) &&
        !empty($_FILES['user-image']['name'])
    ) {
        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $city = $_POST['city'];
        $lang = '';
        foreach ($_POST['lang'] as $value) {
            $lang = $lang . ' ' . $value;
        }
        $info = $_POST['info'];

        $user_image = uploadUserImage($_FILES['user-image']);
    } else {
        $missing_data = true;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registracija į kursus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="./stylesheets/styles.css">

</head>
<body>

<div class="container">
    <div class="row my-5">
        <div class="col-6">


            <h1><a href="/">Registraciija į kursus</a></h1>


            <?php if ($missing_data): ?>

                <div class="alert alert-danger" role="alert">
                    Užpildykite visus laukus
                </div>

            <?php endif; ?>

            <div class="card ">
                <form method="POST" enctype="multipart/form-data">
                    <div class="card-body">


                        <div class="row my-3">
                            <div class="col-3">
                                <label for="f-name" class="form-label">Vardas</label>
                            </div>
                            <div class="col-9">
                                <input id="f-name" name="f_name" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-3">
                                <label for="l-name" class="form-label">Pavardė</label>
                            </div>
                            <div class="col-9">
                                <input id="l-name" name="l_name" class="form-control" type="text">
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-3">
                                <label for="city" class="form-label">Miestas</label>
                            </div>
                            <div class="col-9">
                                <select id="city" class="form-select" name="city">
                                    <!-- empty selection -->
                                    <option disabled selected>pasirinkti miestą</option>
                                    <option value="vilnius">Vilnius</option>
                                    <option value="kaunas">Kaunas</option>
                                    <option value="klaipeda">Klaipėda</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-5">

                            <h2>Programavimo kalba</h2>

                            <div class="col-3"></div>
                            <div class="col-9">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lang[]" value="cpp"
                                           id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        C++
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lang[]" value="php"
                                           id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                        PHP
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="lang[]" value="pyt"
                                           id="defaultCheck3">
                                    <label class="form-check-label" for="defaultCheck3">
                                        Python
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">

                            <h2>Papildoma informacija</h2>

                            <div class="col-3"></div>
                            <div class="col-9">
                <textarea class="form-control" name="info" rows="4" cols="50" maxlength="50"
                          placeholder="pvz.: turiu C++ programavimo patirties"></textarea>
                            </div>
                        </div>

                        <div class="row">

                            <h2>Nuotrauka</h2>

                            <div class="col-3">
                                <label for="formFile" class="form-label">Profilio nuotrauka</label>
                            </div>
                            <div class="col-9">
                                <input class="form-control" type="file" id="formFile" name="user-image">
                            </div>

                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-3">
                                <button class="btn btn-success">Registruotis</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-6">

            <?php
            if (
                $_SERVER['REQUEST_METHOD'] == 'POST' &&
                !empty($fname) &&
                !empty($lname) &&
                !empty($city) &&
                !empty($lang) &&
                !empty($info) &&
                !empty($user_image)
            ): ?>

                <div class="result">


                    <h1>Registracijos rezultatas</h1>


                    <div class="card">
                        <div class="card-body">
                            <h2>Jūsų pateikti duomenys</h2>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Vardas: <?= $fname ?></li>
                            <li class="list-group-item">Pavardė: <?= $lname ?></li>
                            <li class="list-group-item">Miestas: <?= $city ?></li>
                            <li class="list-group-item">Programavimo kalba: <?= $lang ?></li>
                            <li class="list-group-item">Papildoma informacija: <?= $info ?></li>
                            <li class="list-group-item"><img class="img-fluid" src="<?= $user_image ?>"
                                                             alt="user image">
                            </li>
                        </ul>
                    </div>

                </div>

            <?php
            endif; ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>
</html>
