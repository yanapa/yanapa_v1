<?php

abstract class SStdActiveRecord extends SBaseActiveRecord
{

	public function init()
	{
		$this->addAuditRelations();
	}

	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			$this->updateAuditAttributes();
			return true;
		} 
		else
		{
			return false;
		}
	}
	
}
