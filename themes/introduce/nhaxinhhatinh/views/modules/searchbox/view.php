    <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="searchform" role="search">
        <div class="search-inputbox">
            <input type="hidden" value="3" name="t" id="t">            <div class="search-input-submit">
                <input type="submit" value="Tìm kiếm" class="submitForm">
            </div>
            <div class="search-input-content">
                <input type="text" class="form-control" name="<?php echo $keyName; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" value="<?php echo $keyWord; ?>">
            </div>
        </div>
    </form>
