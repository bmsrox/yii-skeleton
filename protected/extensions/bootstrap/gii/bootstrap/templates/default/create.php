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
	\$this->translate('Create'),
);\n";
?>

$this->menu=array(
	array('label'=>$this->translate('Manage'), 'url'=>array('index')),
);
?>

<h1><?php echo "<?php echo \$this->translate('Create'); ?>"; ?> <?php echo $this->modelClass; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
