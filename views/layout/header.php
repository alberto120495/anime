<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  <link rel="stylesheet" href="<?= baseUrl ?>assets/styles.css" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <title>AnimeForYou</title>
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0" nonce="y6m1Bt4h"></script>
  <div class="container">
    <?php $categorias = Utils::showCategorias(); ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark aqua">
      <a class="navbar-brand logo" href="<?= baseUrl ?>">AnimeForYou</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php while ($categoria = $categorias->fetch_object()) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=baseUrl?>categoria/ver&id=<?=$categoria->id?>"><?= $categoria->nombre ?></a>
            </li>
          <?php endwhile ?>
        </ul>
        <form class="form-inline my-2 my-lg-0"  method="POST" action="<?=baseUrl?>serie/busqueda" >
          <input name="busqueda" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" />
          <input class="btn btn-outline-success buscar my-2 my-sm-0" type="submit" value="Buscar">
        </form>
      </div>
    </nav>

    <div id="content">