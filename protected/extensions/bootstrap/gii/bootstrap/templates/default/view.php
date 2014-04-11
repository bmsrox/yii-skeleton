<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	Yii::t(Yii::app()->language,'$label')=>array('admin'),
	\$model->{$nameColumn},
);\n";
?>

$this->menu=array(
	//array('label'=>Yii::t(Yii::app()->language,'List'), 'url'=>array('index')),
	array('label'=>Yii::t(Yii::app()->language,'Create'), 'url'=>array('create')),
	array('label'=>Yii::t(Yii::app()->language,'Update'), 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>Yii::t(Yii::app()->language,'Delete'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>Yii::t(Yii::app()->language,'Are you sure you want to delete this item?'))),
	array('label'=>Yii::t(Yii::app()->language,'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php echo Yii::t(Yii::app()->language,'View'); ?>"; ?> <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped bordered condensed',
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
