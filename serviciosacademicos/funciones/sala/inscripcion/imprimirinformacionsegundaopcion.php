<?php

$query_data = "SELECT eg.*,c.nombrecarrera,m.nombremodalidadacademica,ci.nombreciudad,m.codigomodalidadacademica,i.idinscripcion,c.codigocarrera
FROM estudiantegeneral eg,inscripcion i,estudiantecarrerainscripcion e,carrera c,modalidadacademica m,ciudad ci
WHERE numerodocumento = '".$this->estudiantegeneral->numerodocumento."'
AND eg.idestudiantegeneral = i.idestudiantegeneral
AND eg.idciudadnacimiento = ci.idciudad
AND i.idinscripcion = e.idinscripcion
AND e.codigocarrera = c.codigocarrera
AND m.codigomodalidadacademica = i.codigomodalidadacademica 
AND e.idnumeroopcion = '1'
and i.codigoestado like '1%'
and i.idinscripcion = '".$this->idinscripcion."'"; 
$data = $db->Execute($query_data);
$totalRows_data = $data->RecordCount();
$row_data = $data->FetchRow();

FROM carrera 
where codigomodalidadacademica = '".$this->codigomodalidadacademica."'
AND fechavencimientocarrera > '".$fecha."'
and codigocarrera <> '".$row_data['codigocarrera']."'
order by 1";		
// vista previa	   
from periodo p,carreraperiodo c
$query_datosgrabados = "SELECT idnumeroopcion, c.nombrecarrera, m.nombremodalidadacademica, c.codigocarrera,
e.idinscripcion , e.idestudiantecarrerainscripcion
$row_datosgrabados = $datosgrabados->FetchRow();
if ($row_datosgrabados <> "")
?>
	{ 
?>
	while($row_datosgrabados = $datosgrabados->FetchRow());