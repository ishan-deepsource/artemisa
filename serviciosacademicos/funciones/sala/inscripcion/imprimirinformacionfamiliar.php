<?php
//$db->debug = true;
$query_ciudad2 = "select *
$query_formularios = "SELECT linkinscripcionmodulo,posicioninscripcionformulario,nombreinscripcionmodulo,im.idinscripcionmodulo
$query_datosgrabados = "SELECT t.nombretipoestudiantefamilia, e.nombresestudiantefamilia, e.apellidosestudiantefamilia,
e.telefonoestudiantefamilia, e.ocupacionestudiantefamilia, e.idestudiantefamilia, e.idtipoestudiantefamilia
?>
                    <td>Teléfono</td>
	{ 
?>
					 <td><?php echo $row_datosgrabados['telefonoestudiantefamilia'];?></td>					 
					 <!-- <td><?php echo $row_datosgrabados['celularestudiantefamilia'];?></td>  -->					 
	while($row_datosgrabados = $datosgrabados->FetchRow());