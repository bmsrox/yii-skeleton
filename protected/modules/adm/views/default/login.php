<?php
$this->pageTitle=Yii::app()->name . ' - Login';
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array('class'=>'main form-signin')
)); 

?>
<h2 class="form-signin-heading"><?php echo $this->translate('Please sign in'); ?></h2>
 
<?php echo $form->textField($model, 'username', array('class'=>'form-control input-block-level','placeholder'=>$this->translate('Username'))); ?>
<?php echo $form->passwordField($model, 'password', array('class'=>'form-control input-block-level', 'placeholder'=>$this->translate('Password'))); ?>

<div class="form-btn">
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit',
	'type'=>'success', 
	'label'=>$this->translate('Login'),
	'htmlOptions'=>array('class'=>'btn')
	  )); 
?>
</div>

<?php $this->endWidget(); ?>