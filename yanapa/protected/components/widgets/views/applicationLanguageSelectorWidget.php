<?php echo CHtml::beginForm('','post',array('id'=>'applicationlanguageselector', 'class'=>'form-horizontal pull-right', 'style'=>'margin: 5px;')); ?>
	<?php echo '<div class="input-prepend"><span class="add-on"><i class="' . SIconHelper::getIconCssClass('language') . '"></i></span>'; ?>
	<?php     
		echo CHtml::dropDownList('applicationLanguage',$currentLang, CHtml::listData(Language::model()->getLanguagesList(true, true),'code', 'description'), array('class'=>'input-medium', 'empty'=>'select a Language','submit' => ''));
	?>
	</div>
<?php echo CHtml::endForm();?>