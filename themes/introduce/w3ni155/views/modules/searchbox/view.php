<div class="search-form">
    <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="searchform">
        <div class="clearfix">
            <?php
            if ($this->type) {
                echo CHtml::hiddenField(ClaSite::SEARCH_TYPE, $type);
            }
            ?>
            <input type="text" class="inputSearch svalue box-search" name="<?php echo $keyName; ?>" value="<?php echo $keyWord; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" />
            <input type="submit" value="" class="btnsearch"/>
        </div>
    </form>
</div>