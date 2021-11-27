<?php  session_start();  ?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8">
<title>SAPCE ::: ITIZTAPALAPAII.EDU.MX</title>
<link href="../css/proweb.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="cuerpo">
	<header>
	<?php 	include "usuarios.php";	
	if(($ses==1)||($ses==6)){
	print"
				<script languaje='JavaScript'>
				alert('No tiene permisos de acceso a esta página');
				window.location.href='../index.php';
				</script>
				";
}
		?>
	</header>
	<section id="seccion">  
    <header id="header">
			<div class="subtitulo">Lista de alumnos inscritos en el semestre actual  <?php echo"$en->periodo $p->descper"?></div>
        <br>
    </header>
    <div id="registros" >
    <table>
    	<tr>
        	<th width="21">No</th> 
            <th width="90">Control</th>
            <th width="300">Nombre</th>
            <th width="10">S</th>
            <th width="10">Sordo</th>
            
            
            
            <th width="109">Carrera</th>
        </tr>
        <?php
		$alumnos="select distinct c.matricula, a.app, a.apm, a.nom, a.status, a.idcar, c.eval, a.sordo from horario as h, cursa as c, alumnos as a where h.idh=c.idh and a.matricula=c.matricula and c.eval=0 and h.periodo='$en->periodo'";
		$als=mysql_query($alumnos,$conexion);
		$x=0;
		while($a=mysql_fetch_object($als))
		{
			$x++;
			echo"
			<tr>
				<td>$x</td>
				<td>$a->matricula </td>
				<td> $a->app $a->apm $a->nom
				<td align='center'>$a->status</td>
				<td>"; if($a->sordo==1){echo"Si";}else{echo"No";}
				echo"</td>
						
				<td>$a->idcar</td>
			</tr>"; 

    	}?>

    </table>

	</div>

        

	</section>

	<div style="clear: both; width: 100%;"></div>

	

</div>

</body>

</html>