<?php
/**
    * Setting management class.
    *
    * @author Emile Z.
    */
class Setting extends Database{

    protected $setting;

    public function __construct(){
        $this->setting = $_POST;
    }

    /**
        * Maximum turnover information
        *
        * @return string maximum turnover value
        *
        */

    public function getTurnover(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'turnover_max'
        ]);

        $turnovermax = $q->fetch();

        return $turnovermax['setting_set'];

    }

    /**
        * Change the maximum turnover method
        *
        */

    public function editTurnover(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'turnover_max',
            'setting_set' => $this->setting['turnover_max']
        ]);

    }

    /**
        * Maximum turnover BIC information
        *
        * @return string maximum turnover BIC value
        *
        */

    public function getTurnoverBIC(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'turnover_bic_max'
        ]);

        $turnover = $q->fetch();

        return $turnover['setting_set'];

    }

    /**
        * Change the maximum turnover BIC method
        *
        */

    public function editTurnoverBIC(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'turnover_bic_max',
            'setting_set' => $this->setting['turnover_bic_max']
        ]);

    }

    /**
        * Maximum turnover BNC information
        *
        * @return string maximum turnover BNC value
        *
        */

    public function getTurnoverBNC(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'turnover_bnc_max'
        ]);

        $turnover = $q->fetch();

        return $turnover['setting_set'];

    }

    /**
        * Change the maximum turnover BNC method
        *
        */

    public function editTurnoverBNC(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'turnover_bnc_max',
            'setting_set' => $this->setting['turnover_bnc_max']
        ]);

    }

    /**
        * BIC rate information
        *
        * @return string BIC rate value
        *
        */

    public function getBIC1Rate(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bic_1_rate'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }

    /**
        * Change BIC rate method
        *
        */

    public function editBIC1Rate(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bic_1_rate',
            'setting_set' => $this->setting['bic_1_rate']
        ]);

    }

    /**
        * BIC rate information
        *
        * @return string BIC rate value
        *
        */

    public function getBIC2Rate(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bic_2_rate'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }

    /**
        * Change BIC rate method
        *
        */

    public function editBIC2Rate(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bic_2_rate',
            'setting_set' => $this->setting['bic_2_rate']
        ]);

    }

    /**
        * BNC rate information
        *
        * @return string BNC rate value
        *
        */

    public function getBNCRate(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bnc_rate'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }

    /**
        * Change BNC rate method
        *
        */

    public function editBNCRate(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bnc_rate',
            'setting_set' => $this->setting['bnc_rate']
        ]);

    }

    /**
        * BIC pay rate information
        *
        * @return string BIC pay rate value
        *
        */

    public function getBIC1PayRate(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bic_pay_1_rate'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }

    /**
        * Change BIC pay rate method
        *
        */

    public function editBIC1PayRate(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bic_pay_1_rate',
            'setting_set' => $this->setting['bic_pay_1_rate']
        ]);

    }
    
    /**
        * BIC rate information
        *
        * @return string BIC rate value
        *
        */

    public function getBIC2PayRate(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bic_pay_2_rate'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }

    /**
        * Change BIC rate method
        *
        */

    public function editBIC2PayRate(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bic_pay_2_rate',
            'setting_set' => $this->setting['bic_pay_2_rate']
        ]);

    }
    
    /**
        * BNC pay rate information
        *
        * @return string BNC pay rate value
        *
        */

    public function getBNCPayRate(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bnc_pay_rate'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }
    
    /**
        * Change BNC pay rate method
        *
        */

    public function editBNCPayRate(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'bnc_pay_rate',
            'setting_set' => $this->setting['bnc_pay_rate']
        ]);

    }
    
    /**
        * Professional training rate information
        *
        * @return string professional training rate value
        *
        */

    public function getProfessionalTrainingRate(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'professional_training_rate'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }

    /**
        * Change professional training rate method
        *
        */

    public function editProfessionalTrainingRate(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'professional_training_rate',
            'setting_set' => $this->setting['professional_training_rate']
        ]);

    }

    /**
        * Monthly tax date start information
        *
        * @return string monthly date start value
        *
        */

    public function getMonthlyTaxDateStart(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'monthly_tax_date_start'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }

    /**
        * Change monthly tax date start method
        *
        */

    public function editMonthlyTaxDateStart(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'monthly_tax_date_start',
            'setting_set' => $this->setting['monthly_date_start']
        ]);

    }

    /**
        * Monthly tax date end information
        *
        * @return string monthly date end value
        *
        */

    public function getMonthlyTaxDateEnd(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'monthly_tax_date_end'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }

    /**
        * Change monthly tax date end method
        *
        */

    public function editMonthlyTaxDateEnd(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'monthly_tax_date_end',
            'setting_set' => $this->setting['monthly_date_end']
        ]);

    }

    /**
        * Quarterly tax date start information
        *
        * @return string quarterly date start value
        *
        */

    public function getQuarterlyTaxDateStart(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'quarterly_tax_date_start'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }

    /**
        * Change quarterly tax date start method
        *
        */

    public function editQuarterlyTaxDateStart(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'quarterly_tax_date_start',
            'setting_set' => $this->setting['quarterly_date_start']
        ]);

    }

    /**
        * Quarterly tax date end information
        *
        * @return string quarterly date end value
        *
        */

    public function getQuarterlyTaxDateEnd(){

        $db = self::getDatabase();

        $q = $db->prepare("SELECT * FROM Setting WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'quarterly_tax_date_end'
        ]);

        $ratevalue = $q->fetch();

        return $ratevalue['setting_set'];

    }

    /**
        * Change quarterly tax date end method
        *
        */

    public function editQuarterlyTaxDateEnd(){

        $db = self::getDatabase();

        $q = $db->prepare("UPDATE Setting SET setting_set=:setting_set WHERE setting_name=:setting_name");
        $q->execute([
            'setting_name' => 'quarterly_tax_date_end',
            'setting_set' => $this->setting['quarterly_date_end']
        ]);

    }
    
    

}