<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
 	\$this->translate('$label')=>array('index'),
	\$this->translate('Manage'),
);\n";
?>

$this->menu=array(
	//array('label'=>$this->translate('List'), 'url'=>array('index')),
	array('label'=>$this->translate('Create'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo "<?php echo \$this->translate('Manage'); ?>"; ?> <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<div class="search-form">
<?php echo "<?php  

\$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
		'stacked'=>false, // whether this is a stacked menu
		'items'=>array(
				array('label'=>\$this->translate('Create'), 'url'=>array('create'),'active'=>true),
		),
));
				
\$this->renderPartial('_search',array(
	'model'=>\$model,
));  ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
