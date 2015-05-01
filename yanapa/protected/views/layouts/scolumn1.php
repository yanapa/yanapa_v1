<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/smain'); ?>
<?php $this->widget('SViewFileDbgLabelWidget', array('viewFile'=>__FILE__, 'type'=>'layout',));?>
<div id="content" class="span12">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>