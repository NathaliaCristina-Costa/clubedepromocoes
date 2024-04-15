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
                //$dbname   = "nath3942_clubepromocoes";  
                //$host     = "br682.hostgator.com.br";
                //$user     = "nath3942_admin";
                //$senha    = "34651066N@t";

                try {
                    self::$instance = new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$senha);
                } catch (\Throwable $th) {
                    echo 'Erro: '.$th;
                }
            }

            return self::$instance;
        }
    }
