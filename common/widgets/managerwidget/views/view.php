<div class="admin_panel">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php if (ClaSite::isDemoDomain()) { ?>
                        <li>
                            <a class="btn btn-warning" href="<?php echo Yii::app()->createUrl('site/build/generatesql'); ?>" id="generatetheme">
                                <?php echo Yii::t('theme', 'generatetheme'); ?>
                            </a>
                        </li>
                    <?php } ?>
                    <li><a href="<?php echo $adminLink; ?>"><?php echo Yii::t('common', 'adminpanel'); ?></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $admin['name']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('/login/login/websitelogout'); ?>">
                                    <?php echo Yii::t('common', 'quit'); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<script>
    var baseUrl = "<?php echo Yii::app()->getBaseUrl(true); ?>";
</script>