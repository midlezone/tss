<?php if (count($attribute['options'])) { ?>
    <div class="menu-lever2 trademark search-size">
        <div class="panel panel-default categorybox">
            <div class="panel-heading">
                <h3><?php echo $attribute['att']['name'] ?></h3>
            </div>
            <div class="panel-body">
                <ul class="menu menu-list">
                    <?php
                    foreach ($attribute['options'] as $att) {
                        ?>
                        <li>
                            <a id="fi_<?php echo $key; ?>_<?php echo $att['index_key']; ?>" class="op-ft <?php if ($att['checked']) { ?>active<?php } ?>" href="<?php echo $att['checked'] ? 'javascript:void(0)' : $att['link']; ?>" rel="nofollow">
                                <?php echo $att['text']; ?>
                            </a>
                            <?php if ($att['checked']) { ?>
                                <a class="op-ft-del" href="<?php echo $att['link']; ?>" rel="nofollow">x</a>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>