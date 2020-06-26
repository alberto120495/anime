<?php if (isset($ser)) : ?>
    <h1><?= $ser->nombre; ?></h1>
    <div class="detalle">
        <div class="serie">
            <?php if ($ser->imagen != null) : ?>
                <img src="<?= baseUrl ?>uploads/images/<?= $ser->imagen ?>" alt="Anime Logo" />
            <?php else : ?>
                <img src="<?= baseUrl ?>assets/img/anime.png?>" alt="Anime Logo" />
            <?php endif ?>
            <h2><?= $ser->nombre ?></h2>
            <p><?= $ser->descripcion ?></p>
        </div>
    </div>
    <div class="lista">
        <h2>Lista de episodios</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Episodio</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($cap = $capitulos->fetch_object()) : ?>
                    <tr>
                        <td><?= $cap->nombre ?></td>
                        <td>
                            <a class="btn btn-sm alert-primary" href="<?= baseUrl ?>capitulo/index&id_rel=<?= $cap->id_rel ?>&cap=<?= $cap->capitulo ?>">Ver</a>
                        </td>
                    </tr>
                <?php endwhile ?>

            </tbody>
        </table>
    </div>
<?php else : ?>
    <h1>La serie no existe</h1>
<?php endif ?>