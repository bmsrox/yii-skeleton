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
	'brand'=>Yii::app()->name,
	'brandUrl'=>Yii::app()->getModule('adm')->user->returnUrl,
	'collapse'=>true,
	'type'=>'inverse',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array( 
            	array('label'=>ucfirst(Yii::app()->user->name), 'icon'=>'user white', 'items'=>array(
            		array('label'=>$this->translate('Profile'), 'icon'=>'wrench', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest),
            		array('label'=>$this->translate('Logout'), 'icon'=>'off', 'url'=>array('/adm/default/logout'), 'visible'=>!Yii::app()->user->isGuest)
            	) , 'visible'=>!Yii::app()->user->isGuest)      
				
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link($this->translate('Home'), array('/adm/default/index'))
		)); ?><!-- breadcrumbs -->
	<?php endif?>

    <?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<?php echo $this->translate('Copyright');?> &copy; <?php echo date('Y'); ?> <?php echo $this->translate('by');?> My Company.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
