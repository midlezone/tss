<div class="searchbox clearfix">
    <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="searchform">
        <div class="search-inputbox">
            <?php
            if ($this->type) {
                echo CHtml::hiddenField(ClaSite::SEARCH_TYPE, $type);
            }
            ?>
            <div class="search-input-submit">
                <input type="submit" value="" class="submitForm"/>
            </div>
            <div class="search-input-content">
                <input type="text" class="form-control inputSearch keyword" name="<?php echo $keyName; ?>" value="<?php echo $keyWord; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" />
            </div>
        </div>
    </form>
</div>