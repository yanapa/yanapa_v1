<?php

class SBeginRequestBehavior extends CBehavior {

    /**
	 * @var string the Site Code.
	 */
	private $siteCode;
	
	/**
     * Attach
     *
     * The attachEventHandler() method attaches an event handler to an event. 
     * Here, onBeginRequest event is triggered in order to call various functions to execute before processing a request
     */
    public function attach($owner) {
		//$owner->attachEventHandler('onBeginRequest', array($this, 'checkSiteCode'));
        //$owner->attachEventHandler('onBeginRequest', array($this, 'loadTheme'));
        $owner->attachEventHandler('onBeginRequest', array($this, 'loadLanguage'));
		
	}

    /**
     * checkSiteCode
     *
     * Verifying whether the Site Code exists in config file
     */
	 
	
    public function checkSiteCode($event) {
	   
		if (!isset(Yii::app()->params->siteCode)) {
			throw new CHttpException(500,'Missing "siteCode" parameter in site configuration file.');
			//throw new CException('Missing "siteCode" parameter in configuration file.');
		} else {
		$this->siteCode = Yii::app()->params->siteCode; 
		}
    }
	
	/**
     * loadLanguage
     *
     * Setting the application Language at every request 
     */
    public function loadLanguage($event) {
		$redirectUrl = '';
        // At first call, sets the session variable corresponding to the application language from config file
		if (Yii::app()->user->getState('applicationLanguage') == '')
            Yii::app()->user->setState('applicationLanguage', Yii::app()->language);
		// Checks the "applicationLanguage" parameter eventually sent by "ApplicationLanguageSelector" widget and sets the session variable 
        if (isset($_POST['applicationLanguage'])) {
            // requested language must exists and be enabled on language table
            if (Language::model()->active()->findByAttributes(array('code' => $_POST['applicationLanguage'])))
                Yii::app()->user->setState('applicationLanguage', $_POST['applicationLanguage']);
        }
		// Checks the "lang" parameter eventually passed as a URL parameter and sets the session variable 
        if (isset($_GET['lang'])) {
            // requested language must exists and be enabled on language table
            if (Language::model()->active()->findByAttributes(array('code' => $_GET['lang'])))
                Yii::app()->user->setState('applicationLanguage', $_GET['lang']);
			unset($_GET['lang']);
			// Now removes the "lang" parameter from the url, in order to make a redirect at the end of this function
			$redirectUrl = explode("&", Yii::app()->request->url);
			foreach($redirectUrl as $urlFragment) {
				if (substr($urlFragment, 0, 5) === 'lang=')
					unset($redirectUrl[array_search($urlFragment, $redirectUrl)]);
			}
			$redirectUrl = implode("&", $redirectUrl);
        }
		// Reads the session variable
        $languageToLoad = Yii::app()->user->getState('applicationLanguage');
		// If the language code exists and is active on language table, sets the application language with this code
        if (Language::model()->active()->findByAttributes(array('code' => $languageToLoad))) {
            Yii::app()->language = $languageToLoad;
		// Otherwise, sets the application language and the corresponding session variable with a default
        } else {
            Yii::app()->language = 'en_us';
            Yii::app()->user->setState('applicationLanguage', 'en_us');
        }
		// If needed, makes a redirect to the url without the "lang" parameter
		if (isset($redirectUrl) && !empty($redirectUrl))        {
			Yii::app()->request->redirect($redirectUrl);
		}
    }

    /**
     * loadTheme
     *
     * Setting the application Theme at every request 
     */
    public function loadTheme($event) {
    
		//Yii::app()->settings->delete('000001-system', 'dbg_show_viewfilename');
		Yii::app()->settings->deleteCache('system');
		Yii::app()->settings->deleteCache('000000-system');
		Yii::app()->settings->deleteCache('000001-system');
		Yii::app()->settings->deleteCache('000002-system');
		Yii::app()->settings->set('000001-system', 'theme', 'smia01');
		Yii::app()->settings->set('000002-system', 'theme', 'smia01');
		Yii::app()->settings->set('000000-system', 'dbg_show_viewfilename', '0');
		Yii::app()->settings->set('000001-system', 'dbg_show_viewfilename', '0');
		Yii::app()->settings->set('000002-system', 'dbg_show_viewfilename', '0');
	
		// Check if it is defined a specific theme for this site
		$theme = Yii::app()->settings->get($this->siteCode.'-system', 'theme');
		// Check if it is defined a general theme (for all sites)
		if (!isset($theme)) {
			$theme = Yii::app()->settings->get('system', 'theme');
		} 
		// If found, applies the theme
		if (isset($theme)) {
			Yii::app()->theme = $theme;
		}
    }
	
}