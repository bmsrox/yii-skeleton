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
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	Yii::t(Yii::app()->language,'Update'),
);\n";
?>

$this->menu=array(
	//array('label'=>Yii::t(Yii::app()->language,'List'), 'url'=>array('index')),
	array('label'=>Yii::t(Yii::app()->language,'Create'), 'url'=>array('create')),
	array('label'=>Yii::t(Yii::app()->language,'View'), 'url'=>array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>Yii::t(Yii::app()->language,'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php echo Yii::t(Yii::app()->language,'Update'); ?>"; ?> <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>