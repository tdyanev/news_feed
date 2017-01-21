<div class="source-title"><?=$xml->title;?></div>

<?php foreach($xml->item as $item): ?>


<div class="row">
    <div class="thumbnail">

    <?php if (isset($item->enclosure)) : ?>
    <img src="<?=$item->enclosure->attributes()->url;?>" alt="<?=$item->title;?>">
    <?php endif; ?>

      <div class="caption">
        <h3><a href="<?=$item->link;?>" target="_blank"><?=$item->title;?></a></h3>
        <p>
            <?php print_r($item->enclosure['@attributes']);?>
        </p>
        <p> <?=$item->description;?> </p>
        <p> <?=$item->pubDate;?> </p>
      </div>
    </div>
</div>

<?php endforeach; ?>
