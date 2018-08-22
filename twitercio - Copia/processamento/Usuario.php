<?php

include 'conexao.php';

class usuario {

    function salvarinformacoes($nome, $email, $senha, $usuario, $dataCriacao, $dataNascimento, $sexo, $cidade, $site, $foto) {
        $obj = new banco();
        $sql = "INSERT INTO usuarios (nome, email, senha, nomeDeUsuario, dataCriacao, dataNascimento, sexo, cidade, site, foto) VALUES ('$nome', '$email', '$senha', '$usuario', '$dataCriacao', '$dataNascimento', '$sexo', '$cidade', '$site', '$foto')";
        $obj->insert($sql);
    }

    function logar($email, $senha) {
        $obj = new banco();
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $obj->select($sql);
        $tercio = $obj->select($sql);
        return ($tercio);
    }

    function tweet($data, $mensagem, $usuario_id){
        $obj = new banco();
        $sql = "INSERT INTO tweets (data, mensagem, usuario) VALUES ('$data', '$mensagem', '$usuario_id')";
        $obj->insert($sql);
    }
    
}

?>
