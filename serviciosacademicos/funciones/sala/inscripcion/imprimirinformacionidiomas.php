<?php
//$db->debug = true;
$query_idiomaestudiante = "SELECT *
and e.codigoestado like '1%'

	{
	while($row_idiomaestudiante = $idiomaestudiante->FetchRow());
e.porcentajeescribeestudianteidioma, e.descripcionestudianteidioma, e.idestudianteidioma, i.ididioma
?>
					<td>Nivel</td>
	{
		$porcentajeidioma = ($row_datosgrabados['porcentajeleeestudianteidioma'] + $row_datosgrabados['porcentajehablaestudianteidioma'] + $row_datosgrabados['porcentajeescribeestudianteidioma']) / 3;
		if($porcentajeidioma <= 30)
			$nivel = "BASICO";
		if($porcentajeidioma > 30 && $porcentaje <= 70)
			$nivel = "INTERMEDIO";
		if($porcentajeidioma > 70)
			$nivel = "AVANZADO";
			
?>
                     <td><?php echo $nivel; ?><?php if($row_datosgrabados['ididioma'] == 10) echo " -- ".$row_datosgrabados['descripcionestudianteidioma'];?></td>
	 while($row_datosgrabados = $datosgrabados->FetchRow());