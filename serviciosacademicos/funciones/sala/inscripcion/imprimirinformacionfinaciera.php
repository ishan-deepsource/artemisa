<?php
//$db->debug = true;
$query_datosgrabados = "SELECT *
		<table width="670px" border="1" cellpadding="1" cellspacing="0"
			bordercolor="#E9E9E9">
			<tr id="trtitulogris">
				<td>Tipo de recurso</td>
				<td>Descripción</td>
			</tr>
<?php
	{ 
?>
			<tr>
				<td><?php echo $row_datosgrabados['nombretipoestudianterecursofinanciero'];?></td>
				<td><?php echo $row_datosgrabados['descripcionestudianterecursofinanciero'];?></td>
			</tr>
			<?php
	while($row_datosgrabados = $datosgrabados->FetchRow());
		</table>
<?php	   
}
<?php