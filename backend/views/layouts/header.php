<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
Yii::$app->name="SiMitra";
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">' . Html::img(Url::to("@web/img/icon.png")) . '</span><span class="logo-lg">' . Html::img(Url::to("@web/img/icon.png")) . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php
                        echo Url::to('@web/img/User_Avatar.jpg');
                        ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo Yii::$app->user->identity->username; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php
                            echo Url::to('@web/img/User_Avatar.jpg');
                            ?>" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?php echo Yii::$app->user->identity->username; ?>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="pull-right">
                                <?=
                                Html::a(
                                        'Keluar', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                )
                                ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->

            </ul>
        </div>
    </nav>
</header>
