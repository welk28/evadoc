<?php session_start();  ?>
<!DOCTYPE html>
<html>

<head>

  <title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>

  <meta charset="UTF-8">
</head>

<body>
  <div id="cuerpo">
    <header>
      <?php
      $usuario = $_SESSION['usuario'];

      include "usuarios.php";  ?>
    </header>

    <?php
    $sordo=$_POST[sordo];


    $matricula = $usuario;
    if(!empty($sordo)){
      $guardasordo="update alumnos set sordo='$sordo' where matricula='$matricula'";
      $guarda=mysql_query($guardasordo,$conexion);
    }

    $alumno = "select * from alumnos where matricula='$matricula';";
    $alu = mysql_query($alumno, $conexion);
    $a = mysql_fetch_object($alu);
    ?>

    <section id="seccion">
      <div id="registros">
        <?php if (($a->sordo ==1)||($a->sordo ==2)) { 
          print "
        <script languaje='JavaScript'>
          window.location.href='horalumno.php';
        </script>";
        
         } else {
          ?>
          <table>
          <h1>¿Usted es alumno(a) sordo(a)?</h1>

          <form action="inicial.php" method="post">
            <input type="radio" name="sordo" value="1" required>
            <label >Si</label><br>
            <input type="radio" name="sordo" value="2" required>
            <label >No</label><br>
            <br><br>
            <input type="submit" value="Continuar">
          </form>
        </table>
        <?php 
        } ?>
      </div>

    </section>
    <div style="clear: both; width: 100%;"></div>
    <footer>
      <?php include "pie.php";  ?>
    </footer>
  </div>

</body>

</html>