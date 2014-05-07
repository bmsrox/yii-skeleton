<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="span3">
        <div id="sidebar">
            <?php
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type'=>'tabs',
                    'stacked'=>true,
                    'items'=>array(
                        array('label'=>$this->translate('Home'), 'icon'=>'home', 'url'=>array('/adm/default/index')),
                    ),
                ));
           ?>
        </div><!-- sidebar -->
    </div>
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>