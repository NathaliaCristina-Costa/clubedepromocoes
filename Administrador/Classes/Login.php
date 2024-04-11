<?php

    require_once 'Conexao.php';

    class Login
    {
        private $pdo;

        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }

        public function login($senha){
            $cmd = $this->pdo->prepare('SELECT idAdmin, senha FROM admin WHERE senha = :s');
            $cmd->bindValue(':s', md5($senha));
            $cmd->execute();

            if ($cmd->rowCount() > 0) {
                $res = $cmd->fetch(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION['idAdmin'] = $res['idAdmin'];
                return true;
            } else {
                return false;
            }
            
        }

        public function verificarAcesso($path){
            if(!$_SESSION['idAdmin']){
                header('location:'.$path);
                exit();
            }
        }
    }