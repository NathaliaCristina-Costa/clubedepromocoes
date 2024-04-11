<?php
    class Conexao
    {
        private static $instance;
        public function __construct(){}

        public static function getConexao(){
            if(!isset(self::$instance)){
                $dbname = "clubepromocoes";
                $host   = "localhost";
                $user   = "root";
                $senha  = "";

                try {
                    self::$instance = new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$senha);
                } catch (\Throwable $th) {
                    echo 'Erro: '.$th;
                }
            }

            return self::$instance;
        }
    }
