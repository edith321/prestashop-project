<?php

if (!defined('_PS_VERSION_'))
    exit;

class youtubeseries extends Module { // reikia sukurti klase su tokiu pat pav kaip ir failas, kaip ir folderis ir turi extendint Module  prestashopo klase
    private $url; // sukuriamas kintamasis, prasideda oop
    
    public function __construct()
	{
		$this->name = 'youtubeseries'; // name of the plugin
		$this->tab = 'front_office_features'; // The title for the section that shall contain this module in PrestaShop's back office modules list
		$this->version = '1.0';
		$this->bootstrap = true; // whether to include bootstrap
		$this->default_language = Language::getLanguage(Configuration::get('PS_LANG_DEFAULT'));
		/*$this->languages = Language::getLanguages();*/ // set the language of our model
		$this->author = 'Edita';
        
		parent::__construct();
        
		$this->displayName = $this->l('Youtube Series Module'); // the name that will be displayed in the module's list in admin panel
		$this->description = $this->l('A list of videos from youtube');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => '1.6.99.99'); // which version of prestashop is compatible with this plugin
/*		$this->module_path = _PS_MODULE_DIR_.$this->name.'/';
		$this->uploads_path = _PS_MODULE_DIR_.$this->name.'/img/';
		$this->admin_tpl_path = _PS_MODULE_DIR_.$this->name.'/views/templates/admin/';
		$this->hooks_tpl_path = _PS_MODULE_DIR_.$this->name.'/views/templates/hooks/';*/ 
	}
    
    public function install() {
      if (!parent::install() ||
        !$this->registerHook('displayHeader') ||
        !$this->registerHook('displayBanner')) {
        return false;
      }
      return true;
    }
    
    
    public function uninstall() {
      if (!parent::uninstall()) {
        return false;
      }
      return true;
    }
    
    public function getContent() { // for creating a module configuration page
        if(Tools::getValue("youtube_txt")) { // Tolls - is a predefined class in prestashop to receive requested values, here it checks whether a value is being submitted from the form
            $message = Tools::getValue("youtube_txt"); // we store the submitted value from the form into a variable
            $status = false;                         
            // the data in prestashop is being saved in a ps_configuration table
            if(ConfigurationCore::updateValue("YOUTUBE_MESSAGE_TUTORIAL", $message)) { // ConfigurationCore class is being used to store data into DB, updateValue() - takes $key and $value parameters. updateValue() - if it doesn't find a key it creates, so it creates or updates 
                $status = true; // we create a status value for displaying whether the value was saved succesfully
                $this->context->smarty->assign(array( 
                    "submit_form" => true,
                    "status" => $status
                ));   
            }
            
                                       
        }
        
        return $this->display(__FILE__, "views/admin/admin.tpl");
    }
    
    public function hookDisplayBanner() { // makes the text appear on the banner
        $message = ConfigurationCore::get("YOUTUBE_MESSAGE_TUTORIAL"); // we receive data saved in the db under the key - YOUTUBE_MESSAGE_TUTORIAL
        $this->context->smarty->assign(array( // we put the values of template files into var and display in template using smarty
            "Message" => $message, // we display the message from the db to front end
            "Description" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus."
        ));
        return $this->display(__FILE__, "views/banner.tpl"); // we need to call the template
        
    }
}
    