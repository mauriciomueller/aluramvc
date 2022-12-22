<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alura MVC - <?= $titulo; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="fluid-container">

        <nav class="navbar navbar-dark bg-dark mb-3 nav-fill w-100">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active navbar-brand" href="/listar-cursos">Home</a>
                </li>
            </ul>
            <?php if ($_SESSION['logado'] === true) { ?>
                <a href="/logout" class="btn btn-primary">Logout</a>
            <?php } ?>
        </nav>

    </div>
    <div class="container">
        <h1 class="mt-4 mb-4"><?= $titulo; ?></h1>

        <?php if ($_SESSION['mensagem']) { ?>
        <div class="alert alert-<?= $_SESSION['tipo_mensagem'] ?>" role="alert">
            <?= $_SESSION['mensagem'] ?>
        </div>
        <?php
            unset($_SESSION['mensagem']);
            unset($_SESSION['tipo-mensagem']);
        }
        ?>