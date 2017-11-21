<?php

if (!defined('_PS_VERSION_'))
    exit;

class youtubeseries extends Module { // reikia sukurti klase su tokiu pat pav kaip ir failas, kaip ir folderis ir turi extendint Module  prestashopo klase
    private $url; // sukuriamas kintamasis, prasideda oop
    
    public function __construct()
	{
		$this->name = 'youtubeseries'; // name of the plugin
		$this->tab = 'front_office_features';
		$this->version = '2.1.2';
		$this->bootstrap = true;
		$this->secure_key = Tools::encrypt($this->name);
		$this->default_language = Language::getLanguage(Configuration::get('PS_LANG_DEFAULT'));
		$this->languages = Language::getLanguages();
		$this->author = 'PrestaShop';
		parent::__construct();
		$this->displayName = $this->l('Theme configurator');
		$this->description = $this->l('Configure the main elements of your theme.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => '1.6.99.99');
		$this->module_path = _PS_MODULE_DIR_.$this->name.'/';
		$this->uploads_path = _PS_MODULE_DIR_.$this->name.'/img/';
		$this->admin_tpl_path = _PS_MODULE_DIR_.$this->name.'/views/templates/admin/';
		$this->hooks_tpl_path = _PS_MODULE_DIR_.$this->name.'/views/templates/hooks/';
	}
    
}