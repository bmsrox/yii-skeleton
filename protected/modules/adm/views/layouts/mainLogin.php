<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, max-scale=-1, user-scalable=no">
 	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login.css" />
	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<div class="container" id="page">

    <?php echo $content; ?>

</div><!-- page -->

</body>
</html>