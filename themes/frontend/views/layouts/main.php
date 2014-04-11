<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>Yii::t(Yii::app()->language,'Home'), 'url'=>array('/site/index')),
                array('label'=>Yii::t(Yii::app()->language,'About'), 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>Yii::t(Yii::app()->language,'Contact'), 'url'=>array('/site/contact')),
                array('label'=>Yii::t(Yii::app()->language,'Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::t(Yii::app()->language,'Logout') . ' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<?php echo Yii::t(Yii::app()->language,'Copyright');?> &copy; <?php echo date('Y'); ?> <?php echo Yii::t(Yii::app()->language,'by');?> My Company.<br/>
		<?php echo Yii::t(Yii::app()->language, 'All Rights Reserved.');?>
		<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
