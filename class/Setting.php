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

}