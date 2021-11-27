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
      $periodo = $_SESSION['periodo'];
      include "usuarios.php";  ?>
    </header>


    <section id="seccion">
      <div id="registros">
        <h1>Se crea STATUS en periodo con valor de 1, el cual hará que deje de evaluar</h1>
        <?php 
        $agregatributo="alter table periodo add cierre int;";
        $agrega=mysql_query($agregatributo,$conexion);
        if($agrega){
          echo "cierre agregado con exito";
        }else{
          echo "cierre no ha sido agregado";
        }

        $creatabla="CREATE TABLE cierre ( `idh` int(11) NOT NULL, `nop` int(11) NOT NULL,uno int, dos int, tres int, cuatro int, cinco int, PRIMARY KEY (idh,nop)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $crea=mysql_query($creatabla,$conexion);
        if($crea){
          echo "TABLA agregado con exito";
        }else{
          echo "TABLA no ha sido agregado";
        }

        $actualizacierre="update periodo set cierre=1 where predet=1;";
        $actu=mysql_query($actualizacierre,$conexion);
        if($actu){
          echo "cierre agregado con exito";
        }else{
          echo "cierre no ha sido agregado";
        }
        ?>
        <p></p>
        <p>update periodo set cierre=1 where predet=1;</p>
        <p></p>
        <br><br>
        <?php
        //echo $periodo;
        $idhs = "select idh from horario where periodo='$periodo';";
        $idh = mysql_query($idhs, $conexion);
        while ($h = mysql_fetch_object($idh)) {
          //echo "$h->idh <br>";
          $modulos = "select * from modulo order by nomod;";
          $modu = mysql_query($modulos, $conexion);
          while ($mo = mysql_fetch_object($modu)) {
            $preguntas = "select distinct p.nop, p.pregunta from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and r.idh='$h->idh';";
            $preg = mysql_query($preguntas, $conexion);
            while ($pr = mysql_fetch_object($preg)) {
              $r1 = 0;
              $r2 = 0;
              $r3 = 0;
              $r4 = 0;
              $r5 = 0;
              $sumr = 0;
              $numpreuno = "select p.nop, p.pregunta, r.resp from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and p.nop='$pr->nop' and r.resp='1' and r.idh='$h->idh';";
              $npuno = mysql_query($numpreuno, $conexion);
              $np1 = mysql_num_rows($npuno);

              $numpredos = "select p.nop, p.pregunta, r.resp from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and p.nop='$pr->nop' and r.resp='2' and r.idh='$h->idh';";
              $npdos = mysql_query($numpredos, $conexion);
              $np2 = mysql_num_rows($npdos);

              $numpretre = "select p.nop, p.pregunta, r.resp from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and p.nop='$pr->nop' and r.resp='3' and r.idh='$h->idh';";
              $nptre = mysql_query($numpretre, $conexion);
              $np3 = mysql_num_rows($nptre);

              $numprecua = "select p.nop, p.pregunta, r.resp from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and p.nop='$pr->nop' and r.resp='4' and r.idh='$h->idh';";
              $npcua = mysql_query($numprecua, $conexion);
              $np4 = mysql_num_rows($npcua);

              $numprecin = "select p.nop, p.pregunta, r.resp from pregunta as p, responde as r where p.nop=r.nop and p.nomod='$mo->nomod' and p.nop='$pr->nop' and r.resp='5' and r.idh='$h->idh';";
              $npcin = mysql_query($numprecin, $conexion);
              $np5 = mysql_num_rows($npcin);
              echo "$h->idh,";
              echo " $pr->nop,";
              echo " $np1, ";
              echo " $np2, ";
              echo " $np3, ";
              echo " $np4, ";
              echo " $np5 <br>";
              $agregaregistro="insert into cierre (idh, nop, uno, dos, tres, cuatro, cinco) values ($h->idh, $pr->nop, $np1, $np2, $np3, $np4, $np5);";
              $agregar=mysql_query($agregaregistro,$conexion);
              if(!$agregar){echo"error al agregar registro";}

            }
          }
        }



        ?>

      </div>

    </section>
    <div style="clear: both; width: 100%;"></div>
    <footer>
      <?php include "pie.php";  ?>
    </footer>
  </div>

</body>

</html>