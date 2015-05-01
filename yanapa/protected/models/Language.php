<?php

/**
 * This is the model class for table "language".
 *
 * The followings are the available columns in table 'language':
 * @property integer $id
 * @property string $description
 * @property string $code
 * @property integer $status
 * @property string $created_on_dttm
 * @property integer $created_by_id
 * @property string $updated_on_dttm
 * @property integer $updated_by_id
 */


class Language extends SStdActiveRecord
{

	const STATUS_INACTIVE=0;	
	const STATUS_ACTIVE=1;	

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

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, code, status', 'required'),
			array('code', 'unique'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>6),
			array('description', 'length', 'max'=>255),
			array('status', 'in', 'range'=>array(self::STATUS_INACTIVE,self::STATUS_ACTIVE)),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, code, status, created_on_dttm, created_by_id, updated_on_dttm, updated_by_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => Yii::t('language','atb_label.description'),
			'code' => Yii::t('language','atb_label.code'),
			'status' => Yii::t('language','atb_label.status'),
			'created_on_dttm' => Yii::t('app','atb_label.created_on'),
			'created_by_id' => Yii::t('app','atb_label.created_by'),
			'updated_on_dttm' => Yii::t('app','atb_label.updated_on'),
			'updated_by_id' => Yii::t('app','atb_label.updated_by')
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_on_dttm',$this->created_on_dttm,true);
		$criteria->compare('created_by_id',$this->created_by_id);
		$criteria->compare('updated_on_dttm',$this->updated_on_dttm,true);
		$criteria->compare('updated_by_id',$this->updated_by_id);
		$sort=new CSort;
		$sort->attributes=array(
		'description'=>array('asc'=>'i18nLanguage.l_description',  'desc'=>'i18nLanguage.l_description'),
		'*',
		);
		$sort->sortVar=__CLASS__.'_sort';
		
		return new CActiveDataProvider($this, array(
			//'criteria'=>$criteria,								// rik20120912 modified for MultiLingualBehavior
			'criteria'=>$this->ml->modifySearchCriteria($criteria), // rik20120912 modified for MultiLingualBehavior
			'sort'=>$sort,
			'pagination' => array(									// DEVINF 26/03/2013
				'pageSize' => $this->getGridPageSize(),				// DEVINF 26/03/2013
			),														// DEVINF 26/03/2013
		));
	}
	
	/**
	 * Links one or more behaviors to the model.
	 */
	public function behaviors() 
	{
		return array(
			// rik20120912 - "MultiLingualBehavior" extension
			'ml' => array(				
				'class' => 'SMultilingualBehavior',
				'langClassName' => 'LanguageLang', 
				'langTableName' => 'languagelang',
				'langForeignKey' => 'item_id',
				'langField' => 'language_code',
				'localizedAttributes' => array('description'), //attributes of the model to be translated
				'localizedPrefix' => 'l_',
				'languages' => Langparams::model()->getLangs(), // array of your translated languages. Example : array('fr' => 'Fran�ais', 'en' => 'English')			          
				'defaultLanguage' => Yii::app()->params['defaultLanguage'], //your main language. Example : 'fr'
				//'createScenario' => 'insert',
				//'localizedRelation' => 'i18nLanguage',
				//'multilangRelation' => 'multilangLanguage',
				//'forceOverwrite' => true,
				//'forceDelete' => true, 
				'dynamicLangClass' => true, //Set to true if you don't want to create a 'PostLang.php' in your models folder
			),
			// // rik20120918 - "remember-filters-gridview" extension
			'SRememberFiltersBehavior' => array(
               'class' => 'SRememberFiltersBehavior',
               //'defaults'=>array(),           /* optional line */
               //'defaultStickOnClear'=>false   /* optional line */
           ),
		);
	}

	/**
	 * Returns a list of available languages, sorted by description, suitable for language selectors dropdownlist
	 * and for other purposes (i.e., for managing translations fields on input forms).
	 * @param boolean $activeOnly whether to filter only active languages
	 * @param boolean $localized whether to translate the language description in that language itself
	 */
	public function getLanguagesList($activeOnly=false, $localized=false, $sortBy='description')
	{
		$items = array();
		$languages = array();
		$i=0;
        if($activeOnly === true)
          {
        	$languages = Language::model()->active()->findAll();
          } 
        else
          {
            $languages = Language::model()->findAll();
          }
		foreach($languages as $language) {		   
			if(strlen($language->code)>0) {		
				$items[$i]['id']= $language->id;
				$items[$i]['code']= $language->code;
				if($localized === true) {
                     $items[$i]['description']=(Language::model()->localized($language->code)->findByPk((int) $language->id)->description);
				} else {
                     $items[$i]['description']=Language::model()->findByPk((int) $language->id)->description;
				} 								
			};
			$i++;
		};
	    switch($sortBy) {
		case 'id':
			usort($items, function($a, $b) {
				return strcmp($a["id"], $b["id"]);;
			});
			break;
		case 'code':
			usort($items, function($a, $b) {
				return strcmp($a["code"], $b["code"]);;
			});
			break;
		case 'description':
			usort($items, function($a, $b) {
				return strcmp($a["description"], $b["description"]);;
			});
			break;
		}
		return $items;
	}
	
	/**
	 * Default scope referred to "MultiLingualBehavior" extension
	 */
	public function defaultScope()
	{	
		return $this->ml->localizedCriteria();
	}
	
	/**
	 * Named scope for filtering only records with "active" status"
	 */
	public function active()
	{	    
		$this->getDbCriteria()->mergeWith(array(
			'condition'=>'status='.self::STATUS_ACTIVE,
		));
		return $this;
	}

    /**
     * Attributes standard configuration for SStdFormField widget
     * @return array
     */
    public function attributeStandardFeatures()
    {
        return array(
            // array('field0','chosen'),
            // array('field1','chosenMultiple'),
            // array('field2','dropDown'),
            // array('field3','radioButton'),
            // array('field4','textField'),
            // array('field5','password'),
            // array('field6','textArea'),
            // array('field7','wysiwyg'),
            // array('field8','image'),
            // array('field9','file'),
            // array('field10','date'),
            // array('field11','time'),
            // array('field12','datetime'),
            // array('field13','disabled'),
            // array('field14','boolean'),
			array('id','textField', 'class'=>'input-mini'),
			array('code','textField', 'class'=>'input-mini'),
			array('description','textField', 'class'=>'input-xlarge'),
			array('status','dropDown','class'=>'input-medium'),
			array('created_on_dttm','datetime'),
			array('created_by_id','textField', 'class'=>'input-mini'),
			array('updated_on_dttm','datetime'),
			array('updated_by_id','textField', 'class'=>'input-mini'),
        );
    }

	 /**
     * Select choices for Status attribute (SStdFormField widget)
     * @return array
     */
    public function statusChoices()
    {
        return $this->getLookupItems('LanguageStatus');	
    }

	/**
	 * Executes some additional initialization operations upon the object (after construct)
	 */
	public function Init()								
	{													
		// Sets some default values for new ARs			
		$this->status = self::STATUS_ACTIVE;	

		// Call parent's init function (to set standard audit fileds relations)
		return parent::init();
	}	
	
	/**
	* Loads the lookup items for the specified type.
	* @param string the item type
	*/
	protected function loadLookupItems()
	{
		$this->_lookupItems = array(								
			'LanguageStatus' => array(		
				self::STATUS_ACTIVE => Yii::t('app','lbl.status_active'),
				self::STATUS_INACTIVE => Yii::t('app','lbl.status_inactive'),	
			),											
		);
	}
}

?>