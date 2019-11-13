<?php

class Conexao{
    var $pdo;

    function __construct(){
            //$this->pdo = new PDO('mysql:host=localhost;dbname=login', 'root', '');
            //$this->pdo = new PDO('mysql:host=200.135.34.209;dbname=cadastro_cguia', 'cguia', 'cad#789@ifc');
            $this->pdo = new PDO('mysql:host=localhost;dbname=emas', 'root', '');
            $this->pdo2 = new PDO('mysql:host=localhost;dbname=avaliacao', 'root', '');
    }

    public function select($nome, $senha) {
        $stmt = $this->pdo->prepare("select * from avaliadores where email = '$nome' and senha = '$senha'");
        $stmt->bindValue(':email', $nome);
        $stmt->bindValue(':senha', $senha);
        $run = $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function select_admin($nome, $senha, $status) {
        $stmt = $this->pdo2->prepare("select * from usuarios where login = '$nome' and senha = '$senha' and status = '$status'");
        $stmt->bindValue(':login', $nome);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':status', $status);
        $run = $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function select_supervisor($nome, $senha, $status) {
        $stmt = $this->pdo2->prepare("select * from usuarios where login = '$nome' and senha = '$senha' and status = '$status'");
        $stmt->bindValue(':login', $nome);
        $stmt->bindValue(':senha', $senha);
        $stmt->bindValue(':status', $status);
        $run = $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function select_avaliadores(){
        $stmt = $this->pdo->prepare("select * from avaliadores");
        $result = $stmt->fetch();
        return $result;
    }

    
}



?>