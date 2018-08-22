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
        <li style="float:right"><a class="active" href="processamento/logout.php">Logout</a></li>
      </ul>
      <center><h1 style="color: #fff;">Perfil</h1></center>
      <div id="formulario">
          <?php
          session_start();
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
            echo "<table id='customers'>
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
              <td><a href='processamento/deletar.php?id= <?= $row['id'] ?>'>Deletar</a></td>
              <?php
              echo "</tr>";
            }
            echo "</table>";
            echo "<p style='color: #fff; font-weight: bold;'>Tweets: ".$contador."<p/>";
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
