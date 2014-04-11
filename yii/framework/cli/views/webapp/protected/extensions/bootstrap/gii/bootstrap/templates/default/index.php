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
	Yii::t(Yii::app()->language,'$label'),
);\n";
?>

$this->menu=array(
	array('label'=>Yii::t(Yii::app()->language,'Create'), 'url'=>array('create')),
	array('label'=>Yii::t(Yii::app()->language,'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php echo Yii::t(Yii::app()->language,'$label'); ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
