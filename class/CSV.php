<?php
/**
    * CSV management class.
    *
    * @author Emile Z.
    */
class CSV extends Database{
    
    protected $csv;

    public function __construct(){
        $this->csv = $_POST;
    }
    
    public function setCSV($Setting, $Bank){

        $db = self::getDatabase();

        $tab_csv = [
                'rate' => [0 => $Setting->getBIC1Rate(), 1 => $Setting->getBIC2Rate(), 2 => $Setting->getBNCRate(), 3 => $Setting->getBIC1PayRate(), 4 => $Setting->getBIC2PayRate(), 5 => $Setting->getBNCPayRate(), 6 => $Setting->getProfessionalTrainingRate()],
                'numbers' => [0 => $Bank->getTurnoverBIC1($Setting), 1 => $Bank->getTurnoverBIC2($Setting), 2 => $Bank->getTurnoverBNC($Setting), 3 => $Bank->getBIC1LiberatoryPayment($Setting), 4 => $Bank->getBIC2LiberatoryPayment($Setting), 5 => $Bank->getBNCLiberatoryPayment($Setting), 6 => $Bank->getLiberalProfessionalTraining($Setting)],
                'rising' => [0 => $Bank->getAmountBIC1($Setting), 1 => $Bank->getAmountBIC2($Setting), 2 => $Bank->getAmountBNC($Setting), 3 => $Bank->getAmountBIC1Pay($Setting), 4 => $Bank->getAmountBIC2Pay($Setting), 5 => $Bank->getAmountBNCPay($Setting), 6 => $Bank->getAmountProfessionalTraining($Setting)]
            ];
        
    }

}