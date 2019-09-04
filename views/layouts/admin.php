<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= Html::encode($this->title) ?></title>
    <link href="<?php echo Url::base('http'); ?>/libs/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo Url::base('http'); ?>/libs/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo Url::base('http'); ?>/libs/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Url::base('http'); ?>/libs/bower_components/jquery-ui/themes/base/all.css" rel="stylesheet">
    <link href="<?php echo Url::base('http'); ?>/libs/dist/css/AdminLTE.min.css" rel="stylesheet">
    <link href="<?php echo Url::base('http'); ?>/libs/dist/css/skins/skin-blue.min.css" rel="stylesheet">
    <link rel="stylesheet/less" type="text/css" href="<?php echo Url::base('http'); ?>/less/styles_admin.less"/>

    <script src="<?php echo Url::base('http'); ?>/libs/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo Url::base('http'); ?>/libs/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo Url::base('http'); ?>/libs/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo Url::base('http'); ?>/libs/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo Url::base('http'); ?>/libs/dist/js/adminlte.min.js"></script>
    <script src="<?php echo Url::base('http'); ?>/libs/less/less.js"></script>
    <script src="<?php echo Url::base('http'); ?>/js/main.js"></script>
    <script>
        $( document ).ready(function() {
            $.Books();
        });
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini admin_page" data-url="<?php echo Url::base('http'); ?>">

<?= $content ?>

</body>
</html>
<?php $this->endPage() ?>
