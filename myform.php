<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class MyForm extends Module
{
    public function __construct()
    {
        $this->name = 'myform';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Damian Kilian';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7.5',
            'max' => '1.7.99',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('My form');
        $this->description = $this->l('Description of my form.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

        // if (!Configuration::get('MYFORM_HTML')) {
        //     $this->warning = $this->l('No name provided');
        // }
    }

    public function install()
    {
        return (parent::install()
            && Configuration::updateValue('MYFORM_HTML', 'Wprowadzony html')
        );
    }

    public function uninstall()
    {
        return (parent::uninstall()
            && Configuration::deleteByName('MYFORM_HTML')
        );
    }
}
