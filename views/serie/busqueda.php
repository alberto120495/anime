    <h1>Busquedas</h1>
    <?php if (($busquedas->num_rows)>0) : ?>
        <?php while ($ser = $busquedas->fetch_object()) : ?>
            <div class="detalle">
                <div class="serie">
                    <?php if ($ser->imagen != null) : ?>
                        <img src="<?= baseUrl ?>uploads/images/<?= $ser->imagen ?>" alt="Anime Logo" />
                    <?php else : ?>
                        <img src="<?= baseUrl ?>assets/img/anime.png?>" alt="Anime Logo" />
                    <?php endif ?>
                    <h2><?= $ser->nombre ?></h2>
                    <p><?= $ser->descripcion ?></p>
                    <a href="<?= baseUrl ?>serie/ver&id=<?= $ser->id ?>" class="btn btn-primary ver">Ver</a>
                </div>
            </div>
        <?php endwhile ?>
    <?php else : ?>
        <p>No hay series para mostrar</p>
    <?php endif ?>