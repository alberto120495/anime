<h1><?= $cap->nombre ?></h1>
<?php if($_GET['cap'] > 1 ): ?>
<a href="<?=baseUrl?>capitulo/index&id_rel=<?=$cap->id_rel?>&cap=<?=$cap->capitulo -1?>" >Anterior</a>
<?php endif ?>

<?php if($_GET['cap'] < $numCap->total ): ?>
<a href="<?=baseUrl?>capitulo/index&id_rel=<?=$cap->id_rel?>&cap=<?=$cap->capitulo +1?>" >Siguiente</a>
<?php endif ?>


<?php if($cap->opcion1 != ""): ?>
<iframe width="640" height="360" frameborder="0" src="<?= $cap->opcion1 ?>" allowfullscreen ></iframe>
<?php else: ?>
<p>No hay servidores disponibles para este episodio</p>
 <?php endif ?>

 <div class="fb-comments" data-href="http://localhost/php/Anime/capitulo/index&amp;id=<?=$cap->id?>" data-numposts="5" data-width=""></div>