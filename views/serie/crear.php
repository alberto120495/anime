<?php if (isset($edit) && isset($ser) && is_object($ser)) : ?>
  <h1>Editar serie <?= $ser->nombre; ?></h1>
<?php $urlAction = baseUrl."serie/save&id=".$ser->id; ?>

<?php else : ?>
  <h1>Nueva serie</h1>
  <?php $urlAction = baseUrl."serie/save"; ?>
<?php endif ?>


<form action="<?= $urlAction ?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" name="titulo" placeholder="Ingrese el titulo" value="<?= isset($ser) && is_object($ser)? $ser->nombre:""; ?>">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea class="form-control" name="descripcion" > <?= isset($ser) && is_object($ser)? $ser->descripcion:'' ?></textarea>
  </div>
  <div class="form-group">
    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria" id="">
      <?php while ($categoria = $categorias->fetch_object()) : ?>
        <option value="<?= $categoria->id ?>"<?= isset($ser) && is_object($ser) && $categoria->id == $ser->categoria_id ? 'selected':'' ?>><?= $categoria->nombre;?></option>
      <?php endwhile ?>
    </select>
  </div>
  <div class="form-group">
    <label for="imagen">Imagen</label>
    <?php if(isset($ser) && is_object($ser) && !empty($ser->imagen)): ?>
      <img class="imagen" src="<?= baseUrl?>uploads/images/<?=$ser->imagen;?>" alt="" width="100">
      <?php endif; ?>
      <br>
    <input type="file" name="imagen">
  </div>

  <input type="submit" class="btn btn-outline-success boton" value="Guardar">
</form>