<div class="tools row">
    <div class="col-xs-2">
        <a href="#" class="reload"><img src="<?=base_url();?>img/refresh.png" height="15" alt="reload" /></a>
    </div>

    <div class="col-xs-2 col-xs-offset-8">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
</div>

<div class="row">

    <h2 class="source-title"><?=$xml->title;?></h2>

</div>


<?php foreach($xml->item as $item): ?>


<div class="row">
    <div class="thumbnail">

<!--
    <?php if (isset($item->enclosure)) : ?>
    <img src="<?=$item->enclosure->attributes()->url;?>" alt="<?=$item->title;?>">
    <?php endif; ?>
-->
      <div class="caption">
        <h3><a href="<?=$item->link;?>" target="_blank"><?=$item->title;?></a></h3>
        <p> <?=$item->pubDate;?> </p>
        <p class="text"><?=$item->description;?></p>
      </div>
    </div>
</div>

<?php endforeach; ?>
