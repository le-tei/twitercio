<html>
    <head>
        <meta charset="UTF-8">
        <title>Twitercio</title>
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
      <a href="processamento/logout.php" >Logout</a>
      <center><h1>TELA DE INICIO</h1></center>
      <div id="formulario">
          <form action="processamento/processamento.php" method="post">
            <input type="text" class="form-control" name="mensagem" id="mensagem" required="true" placeholder="Tweet aqui" size="150"/>
            <input type="submit" class="btn btn-primary" name="action" value="Publicar" id="Publicar"/>
          </form>
          <?php
          session_start();
          if (isset($_SESSION['mensagercio_bemvindo'])) {
            echo $_SESSION['mensagercio_bemvindo'];
            echo "<br>";
          }
          ?>
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
            $result = mysqli_query($con,"SELECT * FROM tweets WHERE usuario = '$id'");
            echo "<table border='1'>
            <tr>
            <th>Data</th>
            <th>Tweet</th>
            <th></th>
            </tr>";
            while($row = mysqli_fetch_array($result))
            {
              $contador = $contador + 1;
              echo "<tr>";
              echo "<td>" . $row["data"] . "</td>";
              echo "<td>" . $row["mensagem"] . "</td>";
              ?>
              <td><a href="processamento/deletar.php?usuario=<?=$row['usuario'];?>">Deletar</a></td>
              <?php
              echo "</tr>";
            }
            echo "</table>";
            echo "Tweets: ".$contador;
            mysqli_close($con);
          ?>
      </div>
    </body>
</html>
