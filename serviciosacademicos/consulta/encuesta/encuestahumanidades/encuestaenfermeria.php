<?php



session_start();
$rutaado=("../../../funciones/adodb/");

require_once("../../../Connections/salaado-pear.php");
require_once("../../../funciones/sala_genericas/clasebasesdedatosgeneral.php");
require_once("../../../funciones/sala_genericas/FuncionesCadena.php");
require_once("../../../funciones/sala_genericas/FuncionesFecha.php");
require_once("../../../funciones/clases/formulario/clase_formulario.php");
require_once("../../../funciones/sala_genericas/formulariobaseestudiante.php");
require_once("../../../funciones/sala_genericas/encuestahumanidades/MostrarEncuesta.php");
require_once("../../../funciones/sala_genericas/encuestahumanidades/ConsultaEncuesta.php");
require_once("../../../funciones/sala_genericas/encuestahumanidades/ValidaEncuesta.php");
require_once("seleccionmateria.php");


unset($_SESSION['tmptipovotante']);
$fechahoy=date("Y-m-d H:i:s");
$formulario=new formulariobaseestudiante($sala,'form1','post','','true');
$objetobase=new BaseDeDatosGeneral($sala);
$query = "SELECT codigoperiodo from periodo where codigoestadoperiodo in (3,1) ORDER BY codigoestadoperiodo DESC";
$resultado= $objetobase->conexion->query($query);
$rowperiodo=$resultado->fetchRow();
$codigocarrera=$_GET['codigocarrera'];
$_SESSION["codigoperiodo_autoenfermeria"]="".$rowperiodo["codigoperiodo"];
$idusuario=$_GET['idusuarios'];

    
    $objvalidaautoevaluacion=new ValidaEncuesta($objetobase,$_SESSION["codigoperiodo_autoenfermeria"],$_GET['codigoestudiante']);

 if($objvalidaautoevaluacion->validaEncuestaCompleta()){
        alerta_javascript('Ha finalizado la evaluacion docente,\n Gracias por su colaboracion');
	  if(isset($_GET['redir'])){
	 //echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=../../prematricula/matriculaautomaticaordenmatricula.php'>";
	 echo "<script type='text/javascript'> window.location.href='../../prematricula/matriculaautomaticaordenmatricula.php';</script>";
	  }	
	echo "<script type='text/javascript'> window.parent.continuar();</script>";

    }

		
		
/*if($codigocarrera==125){
		
	
		 echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=../encuestaestudiantesposgrado20122/encuestaestudiantes.php?idencuesta=73&idusuario=".$idusuario."&codigotipousuario=".$_GET["codigotipousuario"]."&codigocarrera=$codigocarrera'>";
         
    }
		
		else {
        alerta_javascript('Ha finalizado la evaluacion docente,\n Gracias por su colaboracion');
       
         echo "<script type='text/javascript'> window.parent.continuar();</script>";
        } 
*/


 
if(isset($_POST["codigomateria"])&&$_POST["codigomateria"]!='') {
   
    $objconsultaencuesta=new ConsultaEncuesta($objetobase,$formulario);
    $tabla="respuestaautoevaluacion";
    $objconsultaencuesta->setTablaRespuesta($tabla);

    


    $_SESSION["codigoestudiante_autoenfermeria"]=$_GET["codigoestudiante"];
    $_SESSION["codigomateria_autoenfermeria"]=$_POST["codigomateria"];


    $idusuarioencuesta=$_GET["codigoestudiante"]."_".$_POST["codigomateria"]."_".$_SESSION["codigoperiodo_autoenfermeria"];
    $objmostrarencuesta=new MostrarEncuesta($idusuarioencuesta,$objetobase,$formulario,$objconsultaencuesta);

    $datosestudiante=$objetobase->recuperar_datos_tabla("estudiante e","e.codigoestudiante",$_GET["codigoestudiante"],"","",0);

    $condicion=" now() between e.fechainicioencuesta and e.fechafinalencuesta";

    $condicion.=" and em.idencuesta=e.idencuesta and em.codigomateria='".$_POST["codigomateria"]."'";
    $datosencuestamateria=$objetobase->recuperar_datos_tabla("encuesta e,encuestamateria em","e.codigocarrera",'1'," and ".$condicion,"",0);


    $idencuesta=$datosencuestamateria["idencuesta"];
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="../../../estilos/sala.css">
        <script type="text/javascript" src="../../../funciones/javascript/funciones_javascript.js"></script>
        <style type="text/css">@import url(../../../funciones/calendario_nuevo/calendar-win2k-1.css);</style>
        <script type="text/javascript" src="../../../funciones/calendario_nuevo/calendar.js"></script>
        <script type="text/javascript" src="../../../funciones/calendario_nuevo/calendar-es.js"></script>
        <script type="text/javascript" src="../../../funciones/calendario_nuevo/calendar-setup.js"></script>
        <script type="text/javascript" src="../../../funciones/clases/formulario/globo.js"></script>
        <link rel="stylesheet" href="../../../funciones/sala_genericas/ajax/tab/css/tab-view.css" type="text/css" media="screen">
        <script type="text/javascript" src="../../../funciones/sala_genericas/ajax/tab/js/ajax.js"></script>

        <script type="text/javascript" src="../../../funciones/sala_genericas/ajax/tab/js/tab-view.js"></script>
        <script type="text/javascript" src="../../../funciones/sala_genericas/ajax/requestxml.js"></script>
        <script LANGUAGE="JavaScript">
            function enviarrespuesta(obj,idpregunta,idusuario,idencuesta){
                var params="idpregunta="+idpregunta+"&idusuario="+idusuario+"&idencuesta="+idencuesta+"&valorrespuesta="+obj.value;
                //process("../../../funciones/sala_genericas/encuesta/actualizarespuestapregunta.php",params);
                process("actualizarencuestaenfermeria.php",params);
                //alert("actualizarespuestapregunta.php?"+params);
                return true;
            }

            function enviarmateria(){
                //alert(pagina);

                var formulario=document.getElementById("formescogemateria");
                //formulario.action="encuestaenfermeria.php";
                //alert(formulario.action);
                formulario.submit();
                //return false;
            }
             function enviargrupo(){
                //alert(pagina);

                //var formulario=document.getElementById("formescogegrupo");
                //formulario.action="encuestaenfermeria.php";
                //alert(formulario.action);
                formulario.submit();
                //return false;
            }

            //open("../seguridad.html" , "ventana1" , "width=290,height=200,scrollbars=NO");
            //quitarFrame()
        </script>
    </head>
    <body>
        <?php

        seleccionmateria($_GET["codigoestudiante"],$objetobase,$formulario,$_SESSION["codigoperiodo_autoenfermeria"]);
        if(isset($_POST["codigomateria"])&&$_POST["codigomateria"]!='') {
            $objmostrarencuesta->setIdEncuesta($idencuesta);
            $objmostrarencuesta->iniciarEncuestaUsuario();
            $objmostrarencuesta->mostrarTitulosEncuesta();
            
            $filaadicional["codigoestudiante"]=$_SESSION["codigoestudiante_autoenfermeria"];
            $filaadicional["codigomateria"]=$_SESSION["codigomateria_autoenfermeria"];
            $filaadicional["codigoperiodo"]=$_SESSION["codigoperiodo_autoenfermeria"];
            $mensajeninicial="Califique de 1 a 5 las siguientes preguntas relacionadas a la evaluacion de su asignatura";
            echo "	<form id=\"form1\" name=\"form1\" action=\"\" method=\"post\"  >
		<input type=\"hidden\" name=\"AnularOK\" value=\"\">
		<input type=\"hidden\" name=\"idencuesta\" value=\"".$objmostrarencuesta->idencuesta."\">";

            $objmostrarencuesta->imprimirEncuesta($mensajeninicial);
            $objmostrarencuesta->ingresarTotalPreguntas($tabla,$filaadicional);
            
            $formulario->boton_tipo("hidden", "codigomateria", $_POST["codigomateria"]);
            echo "</form>";
            $mensajeexito="Asignatura Evaluada,\n sus respuestas son utiles para el mejoramiento de nuestra Institución .";
            $mensajefalta="No puede continuar hasta que diligencie toda la encuesta";
            $direccionexito="encuestaenfermeria.php?codigoestudiante=".$_GET["codigoestudiante"];
            $direccionfalta="encuestaenfermeria.php?codigoestudiante=".$_GET["codigoestudiante"];

            $objmostrarencuesta->guardarEncuesta($mensajeexito, $mensajefalta, $direccionexito, $direccionfalta,$tabla,$filaadicional);

        }
        ?>
        <script type="text/javascript">
            var pathruta='../../../funciones/sala_genericas/ajax/tab/';
<?php
$cadena= "var arraypestanas=Array(";
$con=0;
if(is_array($objmostrarencuesta->arraytitulospestanas))
    foreach($objmostrarencuesta->arraytitulospestanas as $i=>$row) {
        //trim(sacarpalabras(str_replace("de","",str_replace("y","",$row["nombre"])),0,1))

        if($con==0)
            $cadena.="'".substr(($con+1).". ".$row["nombre"],0,13)."...'";
        else
            $cadena.=",'".substr(($con+1).". ".$row["nombre"],0,13)."...'";

        $con++;
    }
$cadena.= ");\n";
echo $cadena;

?>
    initTabs('formularioencuesta',arraypestanas,0,760,400);

    function cambiapestana(pestana){
        //alert("pestana="+pestana);
        //initTabs('formulariohorario',arraypestanas,pestana,760,400);
        showTab('formularioencuesta',pestana);
        return false;
    }

        </script>

    </body>
</html>
