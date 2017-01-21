<div class="box">

    <div class="inner">
        <div class="top-bar">
            <div class="col-xs-2 col-xs-offset-10">
                <a href="#" class="remove">[x]</a>
            </div>
        </div>

        <div class="setup col-xs-9">
        <select class="select form-control">
            <option selected disabled>Choose one</option>

            <?php foreach($sources as $item): ?>

            <option value="<?=$item->url;?>"><?=$item->name;?></option>

            <?php endforeach; ?>
        </select>

        </div>

        <div class="content"> </div>
    </div>

</div>






<!--



    </div>
</div>
-->
