<?php
/**
    * Application management class.
    *
    * @author Emile Z.
    */
class Setting extends Database{

    protected $setting;

    public function __construct(){
        $this->setting = $_POST;
    }

    /**
        * Tax information
        *
        * @return string tax value
        *
        */

    public function getTaxPercentage(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'tax_value'
        ]);

        $taxpercentage = $q->fetch();

        return $taxpercentage['setting_set'];

    }

    /**
        * Withdrawal money method
        *
        */

    public function editTaxPercentage(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'tax_value',
            'setting_set' => $this->setting['tax_value']
        ]);

    }

}