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
 	Yii::t(Yii::app()->language,'$label')=>array('admin'),
	Yii::t(Yii::app()->language,'Create'),
);\n";
?>

$this->menu=array(
	//array('label'=>Yii::t(Yii::app()->language,'List'), 'url'=>array('index')),
	array('label'=>Yii::t(Yii::app()->language,'Manage'), 'url'=>array('admin')),
);
?>

<h1><?php echo "<?php echo Yii::t(Yii::app()->language,'Create'); ?>"; ?> <?php echo $this->modelClass; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
