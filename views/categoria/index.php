<h1>Gestionar Categorias</h1>
<?php if(isset($_SESSION['categoria']) && $_SESSION['categoria'] == "complete"): ?>
  <div class="alert alert-success" >Registro completado correctamente</div>
<?php elseif(isset($_SESSION['categoria'])  && $_SESSION['categoria'] == "failed"):?>
  <div class="alert alert-danger" >Registro fallido, introduce bien los datos</div>
<?php endif ?>
<?php Utils::deleteSession('categoria') ?>
<a class="btn btn-outline-success btn-sm boton" href="<?=baseUrl?>categoria/crear">Crear categoria</a>
<table class="table">
  <thead>
    <tr >
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
    </tr>
  </thead>
  <tbody>
<?php while ($categoria = $categorias->fetch_object()) : ?>
    <tr>
      <td><?= $categoria->id ?></td>
      <td><?= $categoria->nombre ?></td>
    </tr>
<?php endwhile ?>
  </tbody>
</table>

