<h1>Animes </h1>
<?php while ($serie = $series->fetch_object()) : ?>

<div class="product">
    <a  href="<?=baseUrl?>serie/ver&id=<?=$serie->id?>">
    <?php if($serie->imagen != null):?>
    <img src="<?=baseUrl?>uploads/images/<?=$serie->imagen?>" alt="Anime Logo" />
    <?php else: ?>
    <img src="<?=baseUrl?>assets/img/anime.png?>" alt="Anime Logo" />

    <?php endif ?>

    <h2 class="enlace"><?=$serie->nombre?></h2>
    <p><?=$serie->titulo?></p>
    <a href="<?=baseUrl?>serie/ver&id=<?=$serie->id?>" class="button">Ver</a>
    </a>
</div>
<?php endwhile ?>
