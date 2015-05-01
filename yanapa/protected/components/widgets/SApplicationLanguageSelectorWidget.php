<?php

class SApplicationLanguageSelectorWidget extends CWidget
{

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		$this->renderSelector();
	}
	
	/**
	 * Creates the language selector.
	 * @return string the created button.
	 */
	protected function renderSelector()
	{
        $currentLang = Yii::app()->language;
        $this->render('applicationLanguageSelectorWidget', array('currentLang' => $currentLang));
    }
}
?>