<h1>Crear nueva categoria</h1>
<form action="<?=baseUrl?>categoria/save" method="POST">
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" placeholder="Ingrese la categoria" required>
  </div>
 
  <input type="submit" class="btn btn-outline-success boton" value="Guardar">
</form>