        <!--BARRA LATERAL-->
        <aside id="lateral">
          <div id="login" class="bloack_aside">
            <?php if (!isset($_SESSION['identity'])) : ?>
              <h3>Entrar a la web</h3>
              <form action="<?= baseUrl ?>usuario/login" method="post">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="" />

                <label for="password">Contraseña</label>
                <input class="form-control" type="password" name="password" id="" />

                <input class="btn btn-outline-success boton " type="submit" value="Enviar" />
                <a class="btn btn-outline-success  boton a" href="<?= baseUrl ?>usuario/registro">Registrarse</a>

              </form>
            <?php else : ?>
              <h3><?= $_SESSION['identity']->nombre . " " . $_SESSION['identity']->apellidos ?></h3>
            <?php endif ?>

            <ul class="aside">
              <?php if (isset($_SESSION['admin'])) : ?>
                <li>
                  <a href="<?= baseUrl ?>categoria/index">Gestionar categorias</a>
                </li>
                <li>
                  <a href="<?= baseUrl ?>serie/gestion">Gestionar Series</a>
                </li>
                <li>
                  <a href="capitulo/gestion">Gestionar Capitulos</a>
                </li>
              <?php endif ?>

              <?php if (isset($_SESSION['identity'])) : ?>
                
                <li>
                  <a href="<?= baseUrl ?>usuario/logout">Cerrar sesion</a>
                </li>
              <?php endif ?>

            </ul>
          </div>
        </aside>
        <!--CONTENIDO CENTRAL-->
        <div id="central">