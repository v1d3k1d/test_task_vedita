<?php
    class CProducts{
        private $pdo;

        public function __construct()
		{
			$this->pdo = require "db_info.php";
		}

        public function get_all_products($limit = 10)
		{
            $sql_command = "SELECT * FROM `products` WHERE `products`.`HIDDEN` = '0' ORDER BY `products`.`DATE_CREATE` DESC LIMIT {$limit}";
            $result = $this->pdo->query($sql_command);
            
            $products = array();
            while ($row = $result->fetch()) {
                $products[] = $row;
            }

            return $products;
		}
    }
?>