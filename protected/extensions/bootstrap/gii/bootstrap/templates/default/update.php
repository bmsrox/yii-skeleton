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
	\$this->translate('$label')=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	\$this->translate('Update'),
);\n";
?>

$this->menu=array(
	array('label'=>$this->translate('Manage'), 'url'=>array('index')),
	array('label'=>$this->translate('Create'), 'url'=>array('create')),
	array('label'=>$this->translate('View'), 'url'=>array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
);
?>

<h1><?php echo "<?php echo \$this->translate('Update'); ?>"; ?> <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>