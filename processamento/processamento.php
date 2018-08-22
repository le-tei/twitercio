<?php
session_start();
switch ($_POST["action"]) {
    case 'Salvar': salvar($_POST["nome"], $_POST["email"], $_POST["senha"], $_POST["usuario"], $_POST["dataNascimento"], $_POST["sexo"], $_POST["cidade"], $_POST["site"], $_POST["foto"], $_POST["senha_confirma"]);
        break;
    case 'Login': login($_POST["email"], $_POST["senha"]);
        break;
    case 'Publicar': publicar($_POST["mensagem"]);
        break;
}

function salvar($nome, $email, $senha, $usuario, $dataNascimento, $sexo, $cidade, $site, $foto) {
    $senha = $_POST['senha'];
    $senhaConfirma  = $_POST['senha_confirma'];
    if ($senha == $senhaConfirma) {
      $dataCriacao = date('d/m/y');
      $senha = md5($senha);
      include 'Usuario.php';
      $obj = new usuario();
      $obj->salvarinformacoes($nome, $email, $senha, $usuario, $dataCriacao, $dataNascimento, $sexo, $cidade, $site, $foto);
      $_SESSION['usuarioLogado'] = $tercio["id"];
      /*header("location: ../inicio.php");*/
    }
    else {
      echo ($_SESSION['mensagercio'] = "Senhas diferentes!");
      header("location: ../cadastro.php");
    }
    header("location: ../index.php");
}

function login($email, $senha, $nome) {
    include 'Usuario.php';
    $login = new usuario();
    $tercio = $login->logar($email, md5($senha));
    if(isset ($tercio)){
      $_SESSION['usuarioLogado'] = $tercio["id"];
      echo ($_SESSION['mensagercio_bemvindo'] = "Bem vindo/a, ". $tercio["nome"]);
      header("location: ../inicio.php");
    }
    else{
      echo ($_SESSION['mensagercio'] = "O Tercio não gosta de você!");
      header("location: ../index.php");
    }
}

function publicar($mensagem){
    $contador;
    $data = date('d/m/y');
    $usuario_id = $_SESSION['usuarioLogado'];
    include 'Usuario.php';
    $obj = new usuario();
    $obj->tweet($data, $mensagem, $usuario_id);
    echo ($_SESSION['mensagercio'] = "Tweet publicado!");
    header("location: ../inicio.php");
}

?>
