<ul>
    <li role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"> <span class="tk"></span> </a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="<?php echo $keyName; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" value="<?php echo $keyWord; ?>">
                    </div>
                </form>
            </li>
        </ul>
    </li>
</ul>