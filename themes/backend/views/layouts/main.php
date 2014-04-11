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
	'brand'=>Yii::app()->name,
	'brandUrl'=>Yii::app()->getModule('adm')->user->returnUrl,
		'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>Yii::t(Yii::app()->language,'Home'), 'url'=>array('/adm/default/index')),
				array('label'=>Yii::t(Yii::app()->language,'Logout').'('.Yii::app()->user->name.')', 'url'=>array('/adm/default/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link(Yii::t(Yii::app()->language,'Dashboard'), array('/adm/default/index'))
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div class="row">
    
     <div class="span3">
        <div id="sidebar">
        <?php

            $this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'tabs',
				'stacked'=>true,
                'items'=>array(
					array('label'=>Yii::t(Yii::app()->language,'Home'), 'icon'=>'home', 'url'=>array('/adm/default/index')),
				),
            ));
           
        ?>
        </div><!-- sidebar -->
    </div>
    
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
 
	</div>

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
