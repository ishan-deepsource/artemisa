<?php
//$db->debug = true;
$query_idiomaestudiante = "SELECT *
FROM estudiantemediocomunicacion e
WHERE  e.idestudiantegeneral = '".$this->estudiantegeneral->idestudiantegeneral."'
and e.idinscripcion = '".$this->idinscripcion."'
and e.codigoestadoestudiantemediocomunicacion like '1%'
ORDER BY 2";
$idiomaestudiante = $db->Execute($query_idiomaestudiante);
$totalRows_idiomaestudiante = $idiomaestudiante->RecordCount();
$row_idiomaestudiante = $idiomaestudiante->FetchRow();

$sinmediodecomunicacion = "codigomediocomunicacion <> ".$row_idiomaestudiante['codigomediocomunicacion'];
if ($row_idiomaestudiante <> "")
{		
	do
	{
		$sinmediodecomunicacion = $sinmediodecomunicacion ." and codigomediocomunicacion <> ".$row_idiomaestudiante['codigomediocomunicacion'];
		//echo $sinidioma ,"<br>";
	}
	while($row_idiomaestudiante = $idiomaestudiante->FetchRow());
	$query_mediocomunicacion = "select *
	from mediocomunicacion
	where ($sinmediodecomunicacion)
	order by 2";
	$mediocomunicacion = $db->Execute($query_mediocomunicacion);
	$totalRows_mediocomunicacion = $mediocomunicacion->RecordCount();
	$row_mediocomunicacion = $mediocomunicacion->FetchRow();
}
else
{
   	$query_mediocomunicacion = "select *
	from mediocomunicacion
	order by 2";
	$mediocomunicacion = $db->Execute($query_mediocomunicacion);
	$totalRows_mediocomunicacion = $mediocomunicacion->RecordCount();
	$row_mediocomunicacion = $mediocomunicacion->FetchRow();
}

$query_datosgrabados = "SELECT * 
and e.idinscripcion = '".$this->idinscripcion."'
?>
                </tr>
	{ 
?>
                 </tr>			   
	}
	while($row_datosgrabados = $datosgrabados->FetchRow());
}	      