<?php  session_start();  

include "conexion.php";
$conexion=conectar();

$evaluando="select * from periodo where predet='1'";
$evan=mysql_query($evaluando,$conexion);
$en=mysql_fetch_object($evan);
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo"css/imprimir.css"; ?>" media="print" />
<link href="<?php echo"css/proweb.css"; ?>" rel="stylesheet" type="text/css" >
<link rel="shortcut icon" href="icono.ico" type="image/x-icon">
<!-- JS para control de menu-->
<?php       
    	print"<script type='text/javascript' src='js/jquery-1.8.1.min.js'></script>   
        <script type='text/javascript' src='js/approot.js'></script>    ";
?>

        <!-- FIN DEL JS-->
</head>
<body>
<?php
	//echo"$ip";
	$ses=$_SESSION['quien'];
	$usuario=$_SESSION['usuario'];
	
	$perevadoc=$_SESSION['perevadoc'];
?>

	<div id="header">
                <div id="logos" class="group">
                    <div id="logo_sep_nombre_tec">  
                        <div id="logo_sep">
                            <img src="<?php echo"img/logoSEP_hoz.png"; ?>" width="242" height="60" border="0" />                            <img src="<?php echo"img/separador.png"; ?>" width="12" height="78" />                        
                        </div>  
                        <div id="nombre">
                            <label>INSTITUTO TECNOLÓGICO DE IZTAPALAPA II</label>
                        </div>
                    </div>                         
                    <div id="logo_dgest_tec">
                       <!-- <img src="<?php echo"img/logodgest.png"; ?>" width="114" height="60" /> -->
                       <img  src="<?php echo"img/logoregistradotec.png"; ?>" width="81" height="60" /></div>
                    </div>
		<?php 

		if($ses==1)

		{	//<li><a href='$ip/administrador/vermo.php?matricula=$usuario' >Datos</a></li><li><a href='$ip/evadoc151/horalumno.php?matricula=$usuario'>Horario</a></li>

			$datos="select * from alumnos where matricula='$usuario';";
			$dat=mysql_query($datos,$conexion);
			$d=mysql_fetch_object($dat);
			echo"
			<header id='titulo'> 
			Alumno:$usuario / $d->app $d->apm $d->nom Periodo: $en->descper";
            //<li><a href='$ip/evadoc151/panel.php?matricula=$usuario' >Inicio</a></li>
            //<li><a href='$ip/administrador/vermo.php?matricula=$usuario' >Datos</a></li>
			echo"

			<div id='nav'>
                    <div id='nav-bar'>
                        <ul>
                            <li><a href='horalumno.php?matricula=$usuario' >Horario</a></li>
                            <li><a href='cerrarsesion.php' >Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>    
			";?>

		<?php
		}
		else
		{
    		if($ses==2)
        {

            $datos="select * from docente where idoc='$usuario';";
            $dat=mysql_query($datos,$conexion);
            $d=mysql_fetch_object($dat);

            echo"
            <header id='titulo'> Desarrollo Académico: $d->nomdoc    Periodo: $en->descper</header>

            <div id='nav'>

                <div id='nav-bar'>

                    <ul>
                        
                        <li><a href='#' >Evadoc</a>
                            <div class='submenu'> 
                                <ul>
                                    <li><a href='matedoc.php' >Lista Doc</a></li>
                                    <li><a href='preguntas.php' >Preguntas</a></li>
                                    <li><a href='modulos.php' >Módulos</a></li>
                                    <li><a href='faltaevadoc.php' >Alumnos Faltantes</a></li>
                                </ul>
                            </div> 
                        </li>
                        <li><a href='cierrevadoc.php' >Cierre de evaluación</a></li>
                        <li><a href='cerrarsesion.php' >Salir</a></li>
                    </ul>
                </div>
            </div>";
        }
        else
        {
            print"
                <script languaje='JavaScript'>
                    alert('NO TIENE PERMISOS DE ACCESO');
                    window.location.href='index.php';
                </script>";
        }
		}

        

		?>
</body>
</html>