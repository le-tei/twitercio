<html>
    <head>
        <meta charset="UTF-8">
        <title>Twitercio</title>
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
      <div class="conteudo">
        <center><h1 style="color: #fff;">TWITERCIO</h1></center>
        <div class="caixa">
            <div id="formulario">
                <form action="processamento/processamento.php" method="post">
                    <input type="text" class="form-control" name="email" id="email" required="true" placeholder="E-mail"/>
                    <input type="password" class="form-control" name="senha" id="senha" required="true" placeholder="Senha"/>
                    <input type="submit" class="btn btn-primary" name="action" value="Login" id="Login"/>
                    <br><br>
                    <a style="color: #fff; font-size: 15px; font-weight: bold;" href="cadastro.php">Cadastro</a>
                </form>
                <?php
                session_start();
                if (isset($_SESSION['mensagercio'])) {
                  echo $_SESSION['mensagercio'];
                  unset($_SESSION['mensagercio']);
                }
                ?>
            </div>
          </div>
        </div>
    </body>
</html>
