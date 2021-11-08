<div class="timkiem">
    <div class="search search1 ">
        <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="form-horizontal clearfix" role="search">
            <input type="hidden" value="3" name="t" id="t">            
            <input type="submit" value="Tìm kiếm" class="btn btn-default">
            <input type="text" class="form-control" name="<?php echo $keyName; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" value="<?php echo $keyWord; ?>">
        </form>
    </div>
</div>