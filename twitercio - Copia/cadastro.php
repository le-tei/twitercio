<html>
    <head>
        <meta charset="UTF-8">
        <title>Twitercio</title>
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
      <center><h1>TWITERCIO</h1></center>
        <div id="formulario">
            <form action="processamento/processamento.php" method="post">
                <input type="text" class="form-control" name="nome" id="nome" required="true" placeholder="Nome"/>
                <input type="text" class="form-control" name="email" id="email" required="true" placeholder="E-mail"/>
                <input type="password" class="form-control" name="senha" id="senha" required="true" placeholder="Senha"/>
                <input type="password" class="form-control" name="senha_confirma" id="senha_confirma" required="true" placeholder="Confirmar Senha"/>
                <input type="text" class="form-control" name="usuario" id="usuario" required="true" placeholder="Usuário"/>
                <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" required="true" laceholder="Data de nascimento"/>
                <select name="sexo" id="sexo">
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                </select>
                <input type="text" class="form-control" name="cidade" id="cidade" required="true" placeholder="Cidade"/>
                <input type="text" class="form-control" name="site" id="site" required="true" placeholder="Site"/>
                <input type="text" class="form-control" name="foto" id="foto" required="false" placeholder="Foto"/>
                <input type="submit" class="btn btn-primary" name="action" value="Salvar" id="Salvar"/>
                <a href="index.php">Voltar</a>
            </form>
            <?php
            session_start();
            if (isset($_SESSION['mensagercio'])) {
              echo $_SESSION['mensagercio'];
              unset($_SESSION['mensagercio']);
            }
            ?>
        </div>
    </body>
</html>
