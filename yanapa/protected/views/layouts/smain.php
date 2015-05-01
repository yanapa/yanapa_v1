<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
	<div id="mainnavbar">
	<?php $this->widget('SMenuWidget',array('type'=>'application')); ?>
	</div><!-- mainmenu -->


	

	
<div id="page" class="container-fluid" style="direction: <?php echo Yii::app()->getLocale()->getOrientation(); ?>;">
	<?php $this->widget('SViewFileDbgLabelWidget', array('viewFile'=>__FILE__, 'type'=>'layout',));?>
		<?php
	$this->widget('bootstrap.widgets.TbNavbar',array(
	'brand' => 'Documenti',
	'brandUrl'=>array('/document/document'),
	'fixed' => false,
	'collapse' => true,
	'items' => array(
	array('class' => 'bootstrap.widgets.TbMenu',
		'encodeLabel'=>false,
	'items' => array(
	array('label' => 'Cerca','url' => array('/document/document'),'icon'=>'icon-search','items' => array(
		array('label' => 'Ricerche Standard',),
		array('label' => 'Tutti i Documenti', 'url' => array('/document/document'),),
		array('label' => 'Per ' . Yii::t('company','lbl.company'), 'url' => '#',),
		array('label' => 'Per Tipo Documento', 'url' => '#',),
		array('label' => 'Per Societ / Tipo Documento', 'url' => '#', 'items'=>array(
		array('label' => 'DEV Informatica', 'icon'=>'briefcase', 'items'=>array(
			array('label' => 'Fatture','icon'=>'file', 'url'=>'#'),
			array('label' => 'Ordini','icon'=>'file'),
			array('label' => 'D.D.T.','icon'=>'file'),
		),),
		array('label' => 'Rossi SpA', 'icon'=>'briefcase'),
		array('label' => 'Verdi srl', 'icon'=>'briefcase'),
		),),
		'---',
		array('label' => 'Ricerche Personalizzate',),
		array('label' => 'Fatture', 'url' => '#',),
		array('label' => 'Ordini Clienti','url' => '#',)
		)),
	array('label' => 'Nuovo Documento', 'url' => '#','icon'=>'icon-plus'),
	array('label' => 'Da revisionare ' . '<span class="badge badge-warning">2</span>', 'url' => '#','icon'=>'icon-pencil'),
	array('label' => 'Da approvare ' . '<span class="badge badge-warning">5</span>', 'url' => '#','icon'=>'icon-thumbs-up'),
	array('label' => 'Bloccati', 'url' => '#', 'icon'=>'icon-lock'),
	array('label' => 'In Workflow', 'url' => '#', 'icon'=>'icon-random'),
	array('label' => 'Clipboard', 'url' => '#', 'icon'=>'icon-lock'),
	))
	)));
	?>
	<div id="maincontainer" class="row-fluid" >
	<?php echo $content; ?>
	</div><!-- maincontainer -->
	<div class="clear"></div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->
</div><!-- page -->
</body>
</html>
