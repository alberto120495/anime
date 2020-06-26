<?php if (isset($categoria)) : ?>
    <h1><?= $categoria->nombre; ?></h1>
    <?php if ($series->num_rows == 0) : ?>
        <p>Aun no hay series para mostrar en esta categoria</p>
    <?php else : ?>
        <?php while ($serie = $series->fetch_object()) : ?>
            <div class="product">
                <?php if ($serie->imagen != null) : ?>
                    <img src="<?= baseUrl ?>uploads/images/<?= $serie->imagen ?>" alt="Anime Logo" />
                <?php else : ?>
                    <img src="<?= baseUrl ?>assets/img/anime.png?>" alt="Anime Logo" />

                <?php endif ?>

                <h2><?= $serie->nombre ?></h2>
                <p><?= $serie->titulo ?></p>
                <a href="<?=baseUrl?>serie/ver&id=<?=$serie->id?>" class="button">Ver</a>
            </div>
        <?php endwhile ?>
    <?php endif ?>
<?php else : ?>
    <h1>La categoria no existe</h1>
<?php endif ?>