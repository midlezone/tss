<div class="search-form">
    <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="searchform">
        <div class="clearfix">
            <input type="text" class="inputSearch svalue box-search" name="<?php echo $keyName; ?>" value="<?php echo $keyWord; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" />
            <input type="hidden" name="<?php echo ClaSite::SEARCH_TYPE ?>" value="<?php echo ClaSite::SITE_TYPE_B2B ?>" />
            <input type="submit" value="" class="btnsearch"/>
        </div>
    </form>
</div>