<div class="box">

    <div class="inner container-fluid">
        <div class="row loading" style="display:none;">
            <div class="alert alert-info" role="alert">Loading, please wait....</div>
        </div>

        <div class="row setup">
            <select class="select form-control">
                <option selected disabled>Choose RSS</option>

                <?php foreach($sources as $item): ?>

                <option value="<?=$item->id;?>"><?=$item->name;?></option>

                <?php endforeach; ?>
            </select>
        </div>

        <div class="content container-fluid"></div>
    </div>
</div>






<!--



    </div>
</div>
-->
