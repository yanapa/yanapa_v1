<?php
/**
 * SIconHelper class file.
 */

class SIconHelper
{

	public static function getIconCssClass($iconId=null)
	{
		$iconItems = self::loadIconItems();
		return (isset($iconItems[$iconId]['cssClass']) ? $iconItems[$iconId]['cssClass'] : '');
	}

	protected static function loadIconItems()
	{
		$iconItems = array(								
			'save' => array('cssClass'=>'fa fa-check'),
			'back' => array('cssClass'=>'fa fa-arrow-left'),
			'cancel' => array('cssClass'=>'fa fa-ban'),
			'reset' => array('cssClass'=>'fa fa-repeat'),
			'search' => array('cssClass'=>'fa fa-search'),
			'signin' => array('cssClass'=>'fa fa-sign-in'),
			'admin' => array('cssClass'=>'fa fa-list'),
			'create' => array('cssClass'=>'fa fa-plus'),
			'delete' => array('cssClass'=>'fa fa-trash-o'),
			'update' => array('cssClass'=>'fa fa-pencil'),
			'view' => array('cssClass'=>'fa fa-eye'),
			'self-settings' => array('cssClass'=>'fa fa-cog'),
			'language' => array('cssClass'=>'fa fa-comment'),
			'time' => array('cssClass'=>'fa fa-clock-o'),
			'datetime' => array('cssClass'=>'fa fa-calendar'),
			'date' => array('cssClass'=>'fa fa-calendar'),
			'collapse-down' => array('cssClass'=>'fa fa-chevron-down'),
			'collapse-up' => array('cssClass'=>'fa fa-chevron-up'),
			'collapse-right' => array('cssClass'=>'fa fa-chevron-right'),
			'collapse-left' => array('cssClass'=>'fa fa-chevron-left'),
			'home' => array('cssClass'=>'fa fa-home'),
			'login' => array('cssClass'=>'fa fa-sign-in'),
			'logout' => array('cssClass'=>'fa fa-sign-out'),
			'user' => array('cssClass'=>'fa fa-user'),
			'users' => array('cssClass'=>'fa fa-user'),
			'groups' => array('cssClass'=>'fa fa-users'),
			'companies' => array('cssClass'=>'fa fa-building-o'),
			'roles' => array('cssClass'=>'fa fa-flag'),
			'filestorages' => array('cssClass'=>'fa fa-archive'),
			'websites' => array('cssClass'=>'fa fa-globe'),
			'languages' => array('cssClass'=>'fa fa-comments'),
			'user-profile' => array('cssClass'=>'fa fa-user'),
			'mod.admin' => array('cssClass'=>'fa fa-wrench'),
			'mod.documents' => array('cssClass'=>'fa fa-files-o'),
			'dashboard' => array('cssClass'=>'fa fa-tachometer'),
			'password' => array('cssClass'=>'fa fa-key'),
			
		);
		return($iconItems);
	}
	
}