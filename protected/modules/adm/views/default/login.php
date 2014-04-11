<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	//'id'=>'login-form',
	'action'=>CController::createUrl('default/login'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'form-signin')
)); 

?>
 <h2 class="form-signin-heading"><?php echo Yii::t(Yii::app()->language,'Please sign in'); ?></h2>
 
 <div class="row">
		<?php echo $form->textField($model,'username', array('class'=>'input-block-level', 'placeholder'=>Yii::t(Yii::app()->language,'Email address'))); ?>
		<?php echo $form->error($model,'username'); ?>
</div>
<div class="row">
		<?php echo $form->passwordField($model,'password', array('class'=>'input-block-level', 'placeholder'=>Yii::t(Yii::app()->language,'Password'))); ?>
		<?php echo $form->error($model,'password'); ?>
</div>
	<div class="">
		<?php echo CHtml::submitButton(Yii::t(Yii::app()->language,'Sign In'), array('class'=>'btn btn-medium btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->