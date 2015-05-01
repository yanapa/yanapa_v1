<?php

class SMenuWidget extends CWidget {

    /**
     * @var array the submenu items.
     */
    private $menuItems = array();

    /**
     * @var string the current module.
     */
    private $currentModule = '';

    /**
     * @var string the current module.
     */
    private $currentController = '';

    /**
     * @var string the current action.
     */
    private $currentAction = '';

    /**
     * @var string the menu type.
     */
    public $type;

    /**
     * @var string the menu style (horizontal / vertical).
     */
    public $style = 'horizontal';

    /**
     * Initializes the widget.
     */
    public function init() {
        if (isset(Yii::app()->controller->module->id))
            $this->currentModule = Yii::app()->controller->module->id;

        if (isset(Yii::app()->controller->id))
            $this->currentController = Yii::app()->controller->id;

        if (isset(Yii::app()->controller->action->id))
            $this->currentAction = Yii::app()->controller->action->id;
    }

    /**
     * Runs the widget.
     */
    public function run() {
        switch ($this->type) {
            case('application'):
                $this->applicationMenu();
                break;
            case('module'):
                $this->moduleMenu();
                break;
        }
    }

    /**
     * Creates the Application Menu.
     * @return string the created menu.
     */
    protected function applicationMenu() {
        // Loading the items array
        $this->menuItems = array(
            array('label' => 'Home', 'url' => array('/site/index'), 'icon' => SIconHelper::getIconCssClass('home'), 'visible' => !Yii::app()->user->isGuest),
//            array('label' => Yii::t('admin', 'mnu_item.administration'), 'icon' => SIconHelper::getIconCssClass('mod.admin'), 'active' => $this->checkCurrentModule('admin'), 'visible' => Yii::app()->user->checkAccess('AdminModule'), 'items' => array(
//                    array('label' => 'Dashboard', 'url' => array('/admin/main/dashboard'), 'visible' => Yii::app()->user->checkAccess('AdminModule'),),
//                    '',
//                    array('label' => Yii::t('admin', 'mnu_item.configuration'), 'url' => array('/admin/main/configuration'), 'visible' => Yii::app()->user->checkAccess('AdminModule'), 'items' => array(
//                            array('label' => 'Utenti e Gruppi', 'items' => array(
//                                    array('label' => 'Users', 'url' => array('//user/admin'), 'active' => $this->checkCurrentController('user'), 'visible' => Yii::app()->user->checkAccess('User.Admin'),),
//                                    array('label' => Yii::t('group', 'mnu_item.groups'), 'url' => array('//admin/group/admin'), 'active' => $this->checkCurrentController('group'), 'visible' => Yii::app()->user->checkAccess('Group.Admin')),
//                                    array('label' => Yii::t('role', 'mnu_item.roles'), 'url' => array('//admin/role/admin'), 'active' => $this->checkCurrentController('role'), 'visible' => Yii::app()->user->checkAccess('Role.Admin')),
//                                )),
//                            array('label' => 'Tabelle generali', 'items' => array(
//                                    array('label' => Yii::t('language', 'mnu_item.languages'), 'url' => array('//admin/language/admin'), 'active' => $this->checkCurrentController('language'), 'visible' => Yii::app()->user->checkAccess('Language.Admin')),
//                                    array('label' => Yii::t('website', 'mnu_item.websites'), 'url' => array('//admin/website/admin'), 'active' => $this->checkCurrentController('website'), 'visible' => Yii::app()->user->checkAccess('Website.Admin')),
//                                    array('label' => Yii::t('company', 'mnu_item.companies'), 'url' => array('//admin/company/admin'), 'active' => $this->checkCurrentController('company'), 'visible' => Yii::app()->user->checkAccess('Company.Admin')),
//                                    array('label' => Yii::t('udattribute', 'mnu_item.udattributes'), 'url' => array('//admin/udattribute/admin'), 'active' => $this->checkCurrentController('udattribute'), 'visible' => Yii::app()->user->checkAccess('Udattribute.Admin')),
//                                    array('label' => Yii::t('filestorage', 'mnu_item.filestorages'), 'url' => array('//admin/filestorage/admin'), 'active' => $this->checkCurrentController('filestorage'), 'visible' => Yii::app()->user->checkAccess('Filestorage.Admin')),
//                                )),
//                            array('label' => 'Definizioni Documenti', 'items' => array(
//                                    array('label' => Yii::t('docnature', 'mnu_item.docnatures'), 'url' => array('//admin/docnature/admin'), 'active' => $this->checkCurrentController('docnature'), 'visible' => Yii::app()->user->checkAccess('Docnature.Admin')),
//                                    array('label' => Yii::t('docstatus', 'mnu_item.docstatuses'), 'url' => array('//admin/docstatus/admin'), 'active' => $this->checkCurrentController('docstatus'), 'visible' => Yii::app()->user->checkAccess('Docstatus.Admin')),
//                                    array('label' => Yii::t('doctype', 'mnu_item.doctypes'), 'url' => array('//admin/doctype/admin'), 'active' => $this->checkCurrentController('doctype'), 'visible' => Yii::app()->user->checkAccess('Doctype.Admin')),
//                                    array('label' => Yii::t('permission', 'mnu_item.documentpermissions'), 'url' => array('//admin/documentpermission/admin'), 'active' => $this->checkCurrentController('documentpermission'), 'visible' => Yii::app()->user->checkAccess('Documentpermission.Admin')),
//                                )),
//                            array('label' => 'Auth', 'url' => array('//auth'), 'active' => $this->checkCurrentController('auth'), 'visible' => true,),
//                        )),
//                ),),
//            array('label' => Yii::t('document', 'mnu_item.documents'), 'url' => array('/document/document'), 'icon' => SIconHelper::getIconCssClass('mod.documents'), 'active' => $this->checkCurrentModule('document'), 'visible' => Yii::app()->user->checkAccess('DocumentModule')),
                // array('label'=>Yii::app()->getModule('user')->t("Login"), 'url'=>Yii::app()->getModule('user')->loginUrl, 'visible'=>Yii::app()->user->isGuest),
                // array('label'=>Yii::app()->getModule('user')->t("Profile"), 'url'=>Yii::app()->getModule('user')->userProfileUrl, 'icon'=>'icon-user icon-white', 'visible'=>!Yii::app()->user->isGuest),
                // array('label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'url'=>Yii::app()->getModule('user')->logoutUrl, 'icon'=>'icon-off icon-white', 'visible'=>!Yii::app()->user->isGuest),
       );
        $this->renderApplicationMenu();
    }

    /**
     * Creates the Module Menu.
     * @return string the created menu.
     */
    protected function moduleMenu() {
        switch ($this->currentModule) {
            case('admin'):
                // Testing authorization on entire module 
                if (!Yii::app()->user->checkAccess('AdminModule')) {
                    break;
                }
                // Loading the items array
                $this->menuItems = array(
                    array('label' => Yii::t('admin', 'mnu_item.administration')),
                    array('label' => 'Dashboard', 'url' => array('//admin/main/dashboard'), 'visible' => Yii::app()->user->checkAccess('AdminModule')),
                    '',
                    array('label' => Yii::t('admin', 'mnu_item.configuration'), 'url' => array('//admin/main/configuration'), 'visible' => Yii::app()->user->checkAccess('AdminModule'), 'items' => array(
                            array('label' => 'Utenti e Gruppi', 'items' => array(
                                    array('label' => 'Users', 'url' => array('//user/admin'), 'active' => $this->checkCurrentController('user'), 'visible' => Yii::app()->user->checkAccess('User.Admin'),),
                                    array('label' => Yii::t('group', 'mnu_item.groups'), 'url' => array('//admin/group/admin'), 'active' => $this->checkCurrentController('group'), 'visible' => Yii::app()->user->checkAccess('Group.Admin')),
                                    array('label' => Yii::t('role', 'mnu_item.roles'), 'url' => array('//admin/role/admin'), 'active' => $this->checkCurrentController('role'), 'visible' => Yii::app()->user->checkAccess('Role.Admin')),
                                )),
                            array('label' => 'Tabelle generali', 'items' => array(
                                    array('label' => Yii::t('language', 'mnu_item.languages'), 'url' => array('//admin/language/admin'), 'active' => $this->checkCurrentController('language'), 'visible' => Yii::app()->user->checkAccess('Language.Admin')),
                                    array('label' => Yii::t('website', 'mnu_item.websites'), 'url' => array('//admin/website/admin'), 'active' => $this->checkCurrentController('website'), 'visible' => Yii::app()->user->checkAccess('Website.Admin')),
                                    array('label' => Yii::t('company', 'mnu_item.companies'), 'url' => array('//admin/company/admin'), 'active' => $this->checkCurrentController('company'), 'visible' => Yii::app()->user->checkAccess('Company.Admin')),
                                    array('label' => Yii::t('udattribute', 'mnu_item.udattributes'), 'url' => array('//admin/udattribute/admin'), 'active' => $this->checkCurrentController('udattribute'), 'visible' => Yii::app()->user->checkAccess('Udattribute.Admin')),
                                    array('label' => Yii::t('filestorage', 'mnu_item.filestorages'), 'url' => array('//admin/filestorage/admin'), 'active' => $this->checkCurrentController('filestorage'), 'visible' => Yii::app()->user->checkAccess('Filestorage.Admin')),
                                )),
                            array('label' => 'Definizioni Documenti', 'items' => array(
                                    array('label' => Yii::t('docnature', 'mnu_item.docnatures'), 'url' => array('//admin/docnature/admin'), 'active' => $this->checkCurrentController('docnature'), 'visible' => Yii::app()->user->checkAccess('Docnature.Admin')),
                                    array('label' => Yii::t('docstatus', 'mnu_item.docstatuses'), 'url' => array('//admin/docstatus/admin'), 'active' => $this->checkCurrentController('docstatus'), 'visible' => Yii::app()->user->checkAccess('Docstatus.Admin')),
                                    array('label' => Yii::t('doctype', 'mnu_item.doctypes'), 'url' => array('//admin/doctype/admin'), 'active' => $this->checkCurrentController('doctype'), 'visible' => Yii::app()->user->checkAccess('Doctype.Admin')),
                                    array('label' => Yii::t('permission', 'mnu_item.documentpermissions'), 'url' => array('//admin/documentpermission/admin'), 'active' => $this->checkCurrentController('documentpermission'), 'visible' => Yii::app()->user->checkAccess('Documentpermission.Admin')),
                                )),
                            array('label' => 'Auth', 'url' => array('//auth'), 'active' => $this->checkCurrentController('auth'), 'visible' => true,),
                        )),
                );
                break;
        }
        $this->renderModuleMenu();
    }

    /**
     * Creates the Application Menu.
     * @return string the created menu.
     */
    protected function renderApplicationMenu() {
        // if ((isset($this->menuItems)) and (!empty($this->menuItems))) {
        // $this->widget('zii.widgets.CMenu', array(
        // 'items'=>$this->menuItems,
        // ));
        // }

        $this->beginWidget('system.web.widgets.CClipWidget', array('id' => $this->id . 'ApplicationLanguageSelectorClip'));
        $this->widget('SApplicationLanguageSelectorWidget');
        $this->endWidget();

        if ((isset($this->menuItems)) and ( !empty($this->menuItems))) {
            $this->widget('bootstrap.widgets.TbNavbar', array(
                'brand' => false,
                'type' => 'inverse',
                'fixed' => 'top',
                'collapse' => true,
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu', 'items' => $this->menuItems
                    ),
                    $this->controller->clips[$this->id . 'ApplicationLanguageSelectorClip'],
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'htmlOptions' => array('class' => 'pull-right'),
                        'items' => array(
//                            array('label' => Yii::app()->getModule('user')->t("Login"), 'url' => Yii::app()->getModule('user')->loginUrl, 'icon' => SIconHelper::getIconCssClass('login'), 'visible' => Yii::app()->user->isGuest),
//                            array('label' => (!Yii::app()->user->isGuest ? User::model()->findByPk(Yii::app()->user->id)->description : ''), 'url' => '', 'icon' => SIconHelper::getIconCssClass('user'), 'visible' => !Yii::app()->user->isGuest, 'items' => array(
//                                    array('label' => Yii::app()->getModule('user')->t("Profile"), 'url' => Yii::app()->getModule('user')->userProfileUrl, 'icon' => SIconHelper::getIconCssClass('user-profile'), 'visible' => !Yii::app()->user->isGuest),
//                                    array('label' => Yii::app()->getModule('user')->t("Logout") . ' (' . Yii::app()->user->name . ')', 'url' => Yii::app()->getModule('user')->logoutUrl, 'icon' => SIconHelper::getIconCssClass('logout'), 'visible' => !Yii::app()->user->isGuest),
//                                )),
                        ),
                    ),
                ),
            ));
        }
    }

    /**
     * Creates the Module Menu.
     * @return string the created menu.
     */
    protected function renderModuleMenu() {
        if ((isset($this->menuItems)) and ( !empty($this->menuItems))) {
            if ($this->style == 'vertical') {
                $this->widget('bootstrap.widgets.TbMenu', array(
                    'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
                    'stacked' => true, // whether this is a stacked menu
                    'items' => $this->menuItems,
                        //'htmlOptions'=>array('class'=>'well'),
                ));
            } else {
                $this->widget('bootstrap.widgets.TbNavbar', array(
                    'brand' => '',
                    'fixed' => false,
                    'collapse' => true,
                    'items' => array(
                        array('class' => 'bootstrap.widgets.TbMenu',
                            'encodeLabel' => false,
                            'items' => $this->menuItems,
                        )
                )));
            }
        }
    }

    /**
     * Check if menu item correspond to the current module.
     * @return true or false.
     */
    protected function checkCurrentModule($module) {
        if ($module == $this->currentModule) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if menu item correspond to the current controller.
     * @return true or false.
     */
    protected function checkCurrentController($controller) {
        if ($controller == $this->currentController) {
            return true;
        } else {
            return false;
        }
    }

}

?>
