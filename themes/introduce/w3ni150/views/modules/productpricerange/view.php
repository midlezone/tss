<div class="panel panel-default categorybox">
    <div class="panel-heading">
        <h3><?php echo $summaryText; ?></h3>
    </div>
    <div class="panel-body">
        <ul class="menu menu-list">
            <?php foreach ($range as $ra) { ?>
                <li class="<?php if ($ra['active']) echo 'active'; ?>">
                    <a href="<?php echo $ra['link']; ?>" title="<?php echo $ra['priceText']; ?>">
                        <?php echo $ra['priceText']; ?>
                    </a>
                </li>
            <?php } ?>
            <li class="">
                <a href="<?php echo $linkAll; ?>">
                    <?php echo Yii::t('common', 'all'); ?>
                </a>
            </li>
        </ul>
    </div>
</div>