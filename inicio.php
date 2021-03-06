<html>
    <head>
        <meta charset="UTF-8">
        <title>Twitercio</title>
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
      <ul>
        <li><a href="inicio.php">Feed</a></li>
        <li><a href="perfil.php">Perfil</a></li>
        <li style="color: #fff; margin-left: 60%; margin-top: 14px;"><?php
        session_start();
        if (isset($_SESSION['mensagercio_bemvindo'])) {
          echo $_SESSION['mensagercio_bemvindo'];
          echo "<br>";
        }
        ?></li>
        <li style="float:right"><a class="active" href="processamento/logout.php">Logout</a></li>
      </ul>
      <center><h1 style="color: #fff;">Feed</h1></center>
      <div id="formulario">
          <form action="processamento/processamento.php" method="post">
            <input type="text" class="form-control tweet" name="mensagem" id="mensagem" required="true" placeholder="Tweet aqui"/>
            <input type="submit" class="btn btn-primary  btn-tweet" name="action" value="Publicar" id="Publicar"/>
          </form>
          <?php
          if (isset($_SESSION['mensagercio'])) {
            echo $_SESSION['mensagercio'];
            unset($_SESSION['mensagercio']);
          }
          ?>
          <?php
            include "processamento/conexao.php";
            $contador = 0;
            $id = $_SESSION['usuarioLogado'];
            $obj = new banco();
            $aux = $obj->connect();
            $con = $aux;
            $result = mysqli_query($con,"SELECT t.*,u.nome FROM tweets as t join usuarios as u on u.id = t.usuario ");
            echo "<table id='customers'>
            <tr>
            <th>Data</th>
            <th>Tweet</th>
            <th>Usuário</th>
            <th></th>
            </tr>";
            while($row = mysqli_fetch_array($result))
            {
              $id_usuario = $row["usuario"];
              $contador = $contador + 1;
              $row["data"] = date("d/m/Y");
              echo "<tr>";
              echo "<td>" . $row["data"] . "</td>";
              echo "<td>" . $row["mensagem"] . "</td>";
              echo "<td>" . $row["nome"] . "</td>";
              ?>
              <td><a type="submit" class="btn btn-delete" href='processamento/deletar.php?id= <?= $row['id'] ?>'>Deletar</a></td>
              <?php
              echo "</tr>";
            }
            echo "</table>";
            mysqli_close($con);
            ?>
            <br>
            <?php
            if (isset($_SESSION['mensagercio_deletado'])) {
              echo $_SESSION['mensagercio_deletado'];
              unset($_SESSION['mensagercio_deletado']);
            }
            ?>
      </div>
    </body>
</html>
