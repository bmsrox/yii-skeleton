<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl(\$this->route),
	'method'=>'get',
	'id'=>'searchForm',
    'type'=>'search'
)); ?>\n"; ?>

<?php 
foreach($this->tableSchema->columns as $column): 
	break;
endforeach; 
?>
<?php echo "<?php echo \$form->textFieldRow(\$model, '{$column->name}', array('class'=>'input-xlarge', 'prepend'=>'<i class=\"icon-search\"></i>')); ?>\n"; ?>
	
		<?php echo "<?php \$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'label'=>Yii::t(Yii::app()->language,'Search'),
		)); ?>\n"; ?>


<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
