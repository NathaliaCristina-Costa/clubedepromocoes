<?php

    require_once 'Conexao.php';

    class Produtos
    {
        private $pdo;

        public function __construct(){
            $this->pdo = Conexao::getConexao();
        }


        public function cadastrar($fotos = array(), $nome,$loja, $link, $preco){
            $cmd = $this->pdo->prepare('INSERT INTO produtos (nome,loja, link, preco) VALUES (:n,:nL, :l, :p)');

            $cmd->bindValue(':n', $nome);
            $cmd->bindValue(':nL', $loja);
            $cmd->bindValue(':l', $link);
            $cmd->bindValue(':p', $preco);

            $cmd->execute();

            $id_produto = $this->pdo->LastInsertId();

            if (count($fotos) > 0) {
                for ($i=0; $i < count($fotos); $i++) { 
                    $nome_fotos = $fotos[$i];

                    $cmd = $this->pdo->prepare('INSERT INTO imagemprodutos (nomeImg, fk_idProduto) VALUE (:img, :fk)');
                    $cmd->bindValue(':img', $nome_fotos);
                    $cmd->bindValue(':fk', $id_produto);

                    $cmd->execute();
                }
            }
        }

        public function buscarProdutos(){
            $dados  = array();

            $cmd    = $this->pdo->prepare('SELECT id,nome, loja, preco FROM produtos');
            $cmd->execute();
            $dados  = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $dados; 
        }

        public function excluir($id){
            $cmd = $this->pdo->prepare('DELETE FROM produtos WHERE id = :id');
            $cmd->bindValue(':id', $id);
            $cmd->execute();  
        }

        public function buscarProdutoPorId($id){
            $cmd = $this->pdo->prepare('SELECT * FROM produtos WHERE id = :id');

            $cmd->bindValue(':id', $id);
            $cmd->execute();

            $dados = $cmd->fetch(PDO::FETCH_ASSOC);

            return $dados;
        }

        public function editar($id,$nome,$loja,$link,$preco){
            $cmd = $this->pdo->prepare('UPDATE produtos SET nome = :n, loja = :nL, link = :l, preco = :p WHERE id = :id');

            $cmd->bindValue(':id', $id);
            $cmd->bindValue(':n', $nome);
            $cmd->bindValue(':nL', $loja);
            $cmd->bindValue(':l', $link);
            $cmd->bindValue(':p', $preco);

            $cmd->execute();

            return true;
        }
    }