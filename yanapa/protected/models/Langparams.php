<?php

//class Language extends CActiveRecord		// DEVINF
class Langparams extends SStdActiveRecord 	// DEVINF
{

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Language the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 * Use Curly Braces Parenthesys {{}} to have dinamically added the table prefix defined in config.php for db connection 
	 */
	public function tableName()
	{
		return '{{language}}';
	}

	//DEVINF
	//ritorna un array con delle lingue nella forma ('it'=>'italiano',..)
	//richiesto per l'utilizzo del valore per il parametro della Extensione MultiLingueBehavior()
	public function getLangs()
	{
		$returnedLangs = array();
		$langs = array();
		$langs = Langparams::model()->findAll();
		foreach($langs as $lang)
		{
			if(strlen($lang->code)>0)
				$returnedLangs[$lang->code]= CHtml::encode($lang->description);									
		};
		return $returnedLangs;
	}

}

?>