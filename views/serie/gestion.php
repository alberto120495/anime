<h1>Gestion de series</h1>
<?php if (isset($_SESSION['serie']) && $_SESSION['serie'] == "complete") : ?>
  <div class="alert alert-success">Serie registrada correctamente</div>
<?php elseif (isset($_SESSION['serie'])  && $_SESSION['serie'] == "failed") : ?>
  <div class="alert alert-danger">Registro fallido, introduce bien los datos</div>
<?php endif ?>
<?php Utils::deleteSession('serie') ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == "complete") : ?>
  <div class="alert alert-success">Serie eliminada correctamente</div>
<?php elseif (isset($_SESSION['delete'])  && $_SESSION['delete'] == "failed") : ?>
  <div class="alert alert-danger">Eliminacion fallida</div>
<?php endif ?>
<?php Utils::deleteSession('delete') ?>

<a class="btn btn-outline-success btn-sm boton" href="<?= baseUrl ?>serie/crear">Nueva serie</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($serie = $series->fetch_object()) : ?>
      <tr>
        <td><?= $serie->id ?></td>
        <td><?= $serie->nombre ?></td>
        <td>
          <a class="btn btn-sm alert-primary edit" href="<?= baseUrl ?>serie/editar&id=<?= $serie->id ?>">Editar</a>

        <a class="btn btn-sm alert-danger" href="<?= baseUrl ?>serie/eliminar&id=<?= $serie->id ?>">Eliminar</a>
  
        </td>
      </tr>
    <?php endwhile ?>
  </tbody>
</table>