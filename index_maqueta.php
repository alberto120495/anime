<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/styles.css" />
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    <title>AnimeForYou</title>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark aqua">
        <a class="navbar-brand logo" href="#">AnimeForYou</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Categoria 1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Categoria 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Categoria 3</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Categoria 4</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input
              class="form-control mr-sm-2"
              type="search"
              placeholder="Buscar"
              aria-label="Search"
            />
            <button
              class="btn btn-outline-success boton my-2 my-sm-0"
              type="submit"
            >
              Buscar
            </button>
          </form>
        </div>
      </nav>

      <div id="content">
        <!--BARRA LATERAL-->
        <aside id="lateral">
          <div id="login" class="bloack_aside">
            <h3>Entrar a la web</h3>
            <form action="#" method="post">
              <label for="email">Email</label>
              <input class="form-control" type="email" name="email" id="" />

              <label for="password">Contraseña</label>
              <input
                class="form-control"
                type="password"
                name="password"
                id=""
              />

              <input
                class="btn btn-outline-success boton"
                type="submit"
                value="Enviar"
              />
            </form>
            <ul>
              <li>
                <a href="">Mis pedidos</a>
              </li>
              <li>
                <a href="">Gestionar pedidos</a>
              </li>
              <li>
                <a href="">Gestionar categorias</a>
              </li>
            </ul>
          </div>
        </aside>

        <!--CONTENIDO CENTRAL-->
        <div id="central">
          <h1>Animes destacados</h1>
          <div class="product">
            <img src="assets/img/anime.png" alt="Anime Logo" />
            <h2>High School of the Dead</h2>
            <p>Anime de accion</p>
            <a href="" class="button">Ver</a>
          </div>

          <div class="product">
            <img src="assets/img/anime.png" alt="Anime Logo" />
            <h2>High School of the Dead</h2>
            <p>Anime de accion</p>
            <a href="" class="button">Ver</a>
          </div>

          <div class="product">
            <img src="assets/img/anime.png" alt="Anime Logo" />
            <h2>High School of the Dead</h2>
            <p>Anime de accion</p>
            <a href="" class="button">Ver</a>
          </div>
        </div>
      </div>

      <!--PIE DE PAGINA-->
      <footer id="footer">
        <p>
          Desarrollador por Alberto Pimentel &copy;
          <?= date('Y') ?>
        </p>
      </footer>
    </div>

    <!--Scripts bootstrap-->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
