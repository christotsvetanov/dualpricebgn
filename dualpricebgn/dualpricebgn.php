<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class DualPriceBgn extends Module
{
    public function __construct()
    {
        $this->name = 'dualpricebgn';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Christo Tsvetanov';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '8.0.0',
            'max' => '8.9.9',
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Dual Price BGN & EUR');
        $this->description = $this->l('Displays prices in both BGN and EUR when the currency is BGN.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        if (!parent::install()) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }

        return true;
    }
}