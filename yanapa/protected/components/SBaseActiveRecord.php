<?php

abstract class SBaseActiveRecord extends CActiveRecord
{

    /**
     * Array containing values for lookup requests
     */
	protected $_lookupItems = array();


	/**
     * Updates the common audit attributes, referred to "create" and "update" operations
     */
	protected function updateAuditAttributes()
	{
		$currentDateTime = date('Y-m-d H:i:s');
		if($this->isNewRecord)
		{
			if($this->hasAttribute('created_on_dttm'))
				$this->created_on_dttm = $currentDateTime;
			if($this->hasAttribute('created_by_id'))
				$this->created_by_id = Yii::app()->user->id;
		}
		if($this->hasAttribute('updated_on_dttm'))
		{
			$this->updated_on_dttm = $currentDateTime;
		}
		if($this->hasAttribute('updated_by_id'))
		{
			$this->updated_by_id = Yii::app()->user->id;
		}
	}

	/**
     * Add to the relations array the common relations related to audit fields
     */
	protected function addAuditRelations()
	{
		if($this->hasAttribute('created_by_id') && (!$this->metaData->hasRelation('createdbyUser'))) {
			$this->metaData->addRelation('createdbyUser', array(self::BELONGS_TO, 'User', 'created_by_id'));
		}
		if($this->hasAttribute('updated_by_id') && (!$this->metaData->hasRelation('updatedbyUser'))) {
			$this->metaData->addRelation('updatedbyUser', array(self::BELONGS_TO, 'User', 'updated_by_id'));
		}
	}

	/**
	* Returns the lookup items for the specified type.
	* @param string item type (e.g. 'PostStatus').
	* @return array item names indexed by item code. The items are order by their position values.
	* An empty array is returned if the item type does not exist.
	*/
	public function getLookupItems($type) 		
	{								
		if (!isset($this->_lookupItems) || empty($this->_lookupItems)) {
			$this->loadLookupItems();
		}
		return isset($this->_lookupItems[$type]) ? $this->_lookupItems[$type] : array();
	}	
	
	/**
	* Returns the item name for the specified type and code.
	* @param string the item type (e.g. 'PostStatus').
	* @param integer the item code (corresponding to the 'code' column value)
	* @return string the item name for the specified the code. False is returned if the item type or code does not exist.
	*/
	public function getLookupItem($type,$code=NULL) 		
	{							
		if (!isset($this->_lookupItems) || empty($this->_lookupItems)) {
			$this->loadLookupItems();
		}
		return isset($this->_lookupItems[$type][$code]) ? $this->_lookupItems[$type][$code] : false;
	}	
	
	/**
     * Virtual attributes: Created by -> User description 
     * @return string
     */
	public function getcreated_by_description()
	{
		$return = '';
		if($this->hasAttribute('created_by_id')) {
			if ($this->createdbyUser!==null) {
				$return = $this->createdbyUser->description;
				if (empty($return))
					$return = $this->createdbyUser->username;
			}
		}
	  	return $return;
	}
	
	/**
     * Virtual attributes: Updated by -> User description 
     * @return string
     */
	public function getupdated_by_description()
	{
		$return = '';
		if($this->hasAttribute('updated_by_id')) {
			if ($this->updatedbyUser!==null) {
				$return = $this->updatedbyUser->description;
				if (empty($return))
					$return = $this->updatedbyUser->username;
			}
		}
	  	return $return;
	}
	
	/**
     * Check if this model has Multilingual management (that is, has the Multilingual Behavior attacched)
     * @return boolean
     */
	public function isMultilingualModel()
	{
		$behaviors = $this->behaviors();
		foreach($behaviors as $key=>$behavior) {
			if ($key == 'ml') {
				return true;
			}
		}
		return false;
	}
	
	/**
	* Loads the lookup items for the specified type.
	* @param string the item type
	*/
	protected function loadLookupItems()
	{
	}
	
}
