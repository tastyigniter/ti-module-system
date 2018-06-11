<?php if (isset($items) AND count($items)) { ?>
    <div class="row select-box">
        <?php foreach ($items['data'] as $item) { ?>
            <div class="col col-sm-6">
                <?= $this->makePartial('updates/browse/'.$itemType, ['item' => $item]); ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>
