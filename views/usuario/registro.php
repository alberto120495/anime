<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == "complete"): ?>
  <div class="alert alert-success" >Registro completado correctamente</div>
<?php elseif(isset($_SESSION['register'])  && $_SESSION['register'] == "failed"):?>
  <div class="alert alert-danger" >Registro fallido, introduce bien los datos</div>
<?php endif ?>
<?php Utils::deleteSession('register') ?>

<form action="<?=baseUrl?>usuario/save" method="POST">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre">
  </div>
  <div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control"  name="apellidos" placeholder="Ingrese sus apellidos">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingrese su email">
    <small id="emailHelp" class="form-text text-muted">Nosotros nunca compartiremos tu email con nadie mas.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <input type="submit" class="btn btn-outline-success boton" value="Registrarse">
</form>