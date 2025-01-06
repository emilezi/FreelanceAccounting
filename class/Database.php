<?php
/**
    * Database management class.
    *
    * @author Emile Z.
    */
class Database{

    private static $pdo = null;

    /**
        * Get database server connection
        *
        * @return array database connection
        */

    protected static function getConnection(){

		self::$pdo = new PDO("mysql:host=" . DB_HOST . ";", USER, PASS);
		self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return self::$pdo;
		
	}

    /**
        * Get database
        *
        * @return array database
        */

	protected static function getDatabase(){

		self::$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, USER, PASS);
		self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return self::$pdo;
		
	}

    /**
        * Set database server connection
        *
        * @return boolean
        */

	public function setConnection(){

		try{

            self::getConnection();

			return 0;

        }catch(PDOException $e){

            return 1;

        }
    	
	}

    /**
        * Set database
        *
        * @return boolean
        */

	public function setDatabase(){

		try{

            self::getDatabase();

			return 0;

        }catch(PDOException $e){

            return 1;

        }

	}

    /**
        * New database method
        *
        */

	public function newDatabase(){

		$db = self::getConnection();
		
        $db->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "`");
    	
	}

    /**
        * Delete database method
        *
        */

	public function deleteDatabase(){

		$db = self::getConnection();

        $db->exec("DROP DATABASE IF EXISTS " . DB_NAME);
    	
	}

    /**
        * Set tables
        *
        * @return boolean
        */

	public function setTables(){

        $db = self::getDatabase();

        $q = $db->prepare("SHOW TABLES");
   	    $q->execute();
   	    $tables = $q->rowCount();

        if($tables != 0)
        {
            return 0;
        }else{
            return 1;
        }

    }

    /**
        * New tables method
        *
        */

	public function newTables(){

        $db = self::getDatabase();

        $q = $db->prepare("
        CREATE TABLE `Applications` (
        `id` int(11) NOT NULL,
        `category` varchar(64) NOT NULL,
        `version` varchar(64) NOT NULL,
        `name` varchar(255) NOT NULL,
        `qualified_name` varchar(255) NOT NULL,
        `installed` varchar(16) NOT NULL,
        `db_require` varchar(16) NOT NULL,
        `source` varchar(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        CREATE TABLE `Bank` (
        `id` int(11) NOT NULL,
        `SIREN` varchar(64) NOT NULL,
        `turnover_excluding_tax` varchar(16) NOT NULL,
        `bic1_excluding_tax` varchar(16) NOT NULL,
        `bic2_excluding_tax` varchar(16) NOT NULL,
        `bnc_excluding_tax` varchar(16) NOT NULL,
        `treasury` varchar(16) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        CREATE TABLE `Business` (
        `id` int(11) NOT NULL,
        `SIREN` varchar(64) NOT NULL,
        `company_name` varchar(128) NOT NULL,
        `trade_name` varchar(128) NOT NULL,
        `SIRET` varchar(64) NOT NULL,
        `vat_number` varchar(64) NOT NULL,
        `country` varchar(16) NOT NULL,
        `address` varchar(64) NOT NULL,
        `address_supplement` varchar(16) NOT NULL,
        `postal_code` varchar(8) NOT NULL,
        `city` varchar(64) NOT NULL,
        `state` varchar(8) NOT NULL,
        `description` text NULL,
        `date` timestamp NOT NULL DEFAULT current_timestamp()
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        CREATE TABLE `Charge` (
        `id` int(11) NOT NULL,
        `SIREN` varchar(64) NOT NULL,
        `name` varchar(128) NOT NULL,
        `category` varchar(64) NOT NULL,
        `price` varchar(8) NOT NULL,
        `state` varchar(8) NOT NULL,
        `description` text NULL,
        `date` timestamp NOT NULL DEFAULT current_timestamp()
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        CREATE TABLE `Client` (
        `id` int(11) NOT NULL,
        `SIREN` varchar(64) NOT NULL,
        `name` varchar(128) NOT NULL,
        `email` varchar(128) NOT NULL,
        `phone` varchar(15) NOT NULL,
        `category` varchar(64) NOT NULL,
        `langue` varchar(16) NOT NULL,
        `country` varchar(16) NOT NULL,
        `address` varchar(64) NOT NULL,
        `address_supplement` varchar(16) NOT NULL,
        `postal_code` varchar(8) NOT NULL,
        `city` varchar(64) NOT NULL,
        `state` varchar(8) NOT NULL,
        `description` text NULL,
        `date` timestamp NOT NULL DEFAULT current_timestamp()
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        CREATE TABLE `Currency` (
        `id` int(11) NOT NULL,
        `SIREN` varchar(64) NOT NULL,
        `customer_name` varchar(128) NOT NULL,
        `service_name` varchar(128) NOT NULL,
        `start_date` varchar(32) NOT NULL,
        `end_date` varchar(32) NOT NULL,
        `hours_days` varchar(8) NOT NULL,
        `number_days` varchar(4) NOT NULL,
        `state` varchar(8) NOT NULL,
        `description` text NULL,
        `date` timestamp NOT NULL DEFAULT current_timestamp()
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        CREATE TABLE `Service` (
        `id` int(11) NOT NULL,
        `SIREN` varchar(64) NOT NULL,
        `name` varchar(128) NOT NULL,
        `category` varchar(64) NOT NULL,
        `costhour` varchar(8) NOT NULL,
        `state` varchar(8) NOT NULL,
        `description` text NULL,
        `date` timestamp NOT NULL DEFAULT current_timestamp()
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        CREATE TABLE `Setting` (
        `id` int(11) NOT NULL,
        `setting_name` varchar(128) NOT NULL,
        `setting_set` varchar(128) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        CREATE TABLE `User` (
        `id` int(11) NOT NULL,
        `status` varchar(16) NOT NULL,
        `type` varchar(16) NOT NULL,
        `SIREN` varchar(64) NOT NULL,
        `SIRET` varchar(64) NOT NULL,
        `date_creation` varchar(64) NOT NULL,
        `taxation` varchar(64) NOT NULL,
        `first_name` varchar(128) NOT NULL,
        `last_name` varchar(128) NOT NULL,
        `identifier` varchar(128) NOT NULL,
        `email` varchar(128) NOT NULL,
        `phone` varchar(12) NOT NULL,
        `password` varchar(255) NOT NULL,
        `user_key` varchar(255) NOT NULL,
        `recovery_key` varchar(255) DEFAULT NULL,
        `date` timestamp NOT NULL DEFAULT current_timestamp()
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        ALTER TABLE `Applications`
        ADD PRIMARY KEY (`id`);

        ALTER TABLE `Bank`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `SIREN` (`SIREN`);

        ALTER TABLE `Business`
        ADD PRIMARY KEY (`id`);

        ALTER TABLE `Charge`
        ADD PRIMARY KEY (`id`);

        ALTER TABLE `Client`
        ADD PRIMARY KEY (`id`);

        ALTER TABLE `Currency`
        ADD PRIMARY KEY (`id`);

        ALTER TABLE `Service`
        ADD PRIMARY KEY (`id`);

        ALTER TABLE `Setting`
        ADD PRIMARY KEY (`id`);

        ALTER TABLE `User`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `SIREN` (`SIREN`),
        ADD UNIQUE KEY `email` (`email`);

        ALTER TABLE `Applications`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `Bank`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `Business`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `Charge`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `Client`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `Currency`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `Service`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `Setting`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

        ALTER TABLE `User`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
        ");

        $q->execute();

    }

    /**
        * Set setting method
        *
        */

    public function setSetting(){

        $db = self::getDatabase();

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'turnover_max',
        'setting_set' => '77700'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'turnover_bic_max',
        'setting_set' => '188700'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'turnover_bnc_max',
        'setting_set' => '77700'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'monthly_tax_date_start',
        'setting_set' => '(À définir)'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'monthly_tax_date_end',
        'setting_set' => '(À définir)'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'quarterly_tax_date_start',
        'setting_set' => '(À définir)'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'quarterly_tax_date_end',
        'setting_set' => '(À définir)'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'bic_1_rate',
        'setting_set' => '21.2'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'bic_2_rate',
        'setting_set' => '12.3'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'bnc_rate',
        'setting_set' => '23.1'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'bic_pay_1_rate',
        'setting_set' => '1.7'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'bic_pay_2_rate',
        'setting_set' => '1.0'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'bnc_pay_rate',
        'setting_set' => '2.2'
        ]);

        $q = $db->prepare("INSERT INTO Setting(`setting_name`,`setting_set`) VALUES(:setting_name,:setting_set)");
        $q->execute([
        'setting_name' => 'professional_training_rate',
        'setting_set' => '0.2'
        ]);

    }
    
}