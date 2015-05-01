<?php /* @var $this Controller */ ?>
<?php 
$this->beginContent('//layouts/smain'); 	// DEVINFO - uses MAIN layout in root/views/Layouts (with fallback to theme)
//$this->beginContent('/layouts/main'); 	// DEVINFO - uses MAIN layout in moduleName/Views/Layouts (with fallback to theme)
?>
<?php $this->widget('SViewFileDbgLabelWidget', array('viewFile'=>__FILE__, 'type'=>'layout',));?>
<?php //$this->widget('SSideBarSwitcherWidget', array()); ?>  
<div id="maincontent" class="row-fluid">

	<div id="sidebar" class="span2">

	
	<?php
	
		$dataTree1=array(
		array(
			'text'=>'<b>Ricerca generale</b>', //must using 'text' key to show the text
			'expanded'=>true,
			
		),
		array(
			'text'=>'<b>Ricerca per Società</b>', //must using 'text' key to show the text
			'expanded'=>true,
			'children'=>array(
				array('text'=>'<i class="icon icon-briefcase"></i> DEV Informatica'),
				array('text'=>'<i class="icon icon-briefcase"></i> Rossi SpA'),
				array('text'=>'<i class="icon icon-briefcase"></i> Verdi srl'),
			),
		),
		array(
			'text'=>'<b>Ricerca per Tipo Documento</b>', //must using 'text' key to show the text
			'expanded'=>true,
			'children'=>array(
						array('text'=>'<i class="icon icon-file"></i> Fatture'),
						array('text'=>'<i class="icon icon-file"></i> Ordini'),
						array('text'=>'<i class="icon icon-file"></i> D.D.T'),
			),
		),
		array(
			'text'=>'<b>Ricerca per Società/Tipo Documento</b>', //must using 'text' key to show the text
								'expanded'=>true,
			'children'=>array(//using 'children' key to indicate there are children
				array(
					'text'=>'<i class="icon icon-briefcase"></i> DEV Informatica',
					'expanded'=>false,
					'children'=>array(
						array('text'=>'<i class="icon icon-file"></i> Fatture'),
						array('text'=>'<i class="icon icon-file"></i> Ordini'),
						array('text'=>'<i class="icon icon-file"></i> D.D.T'),
					)
				),
				array(
					'text'=>'<i class="icon icon-briefcase"></i> Rossi SpA',
										'expanded'=>false,
					'children'=>array(
						array('text'=>'<i class="icon icon-file"></i> Fatture'),
						array('text'=>'<i class="icon icon-file"></i> D.D.T.'),
					)
				),
				array(
					'text'=>'<i class="icon icon-briefcase"></i> Verdi srl',
										'expanded'=>false,
				)
			)
		)
	);

	$this->widget('CTreeView',array(
        'data'=>$dataTree1,
        'animated'=>'fast', //quick animation
        'collapsed'=>false,//remember must giving quote for boolean value in here
        'htmlOptions'=>array(
                'class'=>'treeview-famfamfam',//there are some classes that ready to use
        ),
));
	
	
	
	?>
	
	
	
	
	
	
		<?php $this->widget('SMenuWidget', array('type'=>'module',)); ?>
	</div><!-- sidebar -->
	
	<div id="content" class="span10">
		<div id="breadcrumbs">
			<?php $this->widget('SBreadcrumbsWidget', array()); ?><!-- breadcrumbs -->
		</div><!-- breadcrumbs -->
		<?php echo $content; ?>
	</div><!-- content -->

</div>
<?php $this->endContent(); ?>