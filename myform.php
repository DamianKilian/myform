<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

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
    }

    public function install()
    {
        return $this->installTables() && parent::install();
    }

    public function uninstall()
    {
        return $this->removeTables() && parent::uninstall();
    }

    private function installTables()
    {
        $sqlQueries = [];
        $sqlQueries[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'my_form_html` (
            id INT AUTO_INCREMENT NOT NULL,
            html LONGTEXT NOT NULL,
            PRIMARY KEY(id)
        ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;';
        $sqlQueries[] = "INSERT INTO " . _DB_PREFIX_ . "my_form_html (html) VALUES ('')";

        foreach ($sqlQueries as $query) {
            if (false === Db::getInstance()->execute($query)) {
                return false;
            }
        }

        return true;
    }

    private function removeTables()
    {
        $query = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'my_form_html`';
        return Db::getInstance()->execute($query);
    }
}
