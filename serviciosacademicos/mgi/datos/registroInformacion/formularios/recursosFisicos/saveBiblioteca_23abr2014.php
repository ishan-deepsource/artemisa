<?php
session_start(); 
require_once("../../../templates/template.php");
$db = getBD();
$utils = new Utils_datos();
$success = true;
$periodo=$_REQUEST['anio'].$_REQUEST['mes'];

$query_periodoinf="select sbih.id, sbih.idclasificacionesinfhuerfana, sbih.periodicidad, titulos,volumenes,cantidad,cant_usuarios_ing_biblioteca
                                                        ,prestamo_equipos,prestamo_libros,prestamo_revistas,prestamo_trabajos_grado
                                                        ,prestamo_material_especial,dentro_campus,fuera_campus,prestamo_sala
                                                        ,prestamo_externo,prestamo_interbibliotecario,renovaciones_presenciales,sugerencias_recibidas
                                                        ,cartas_presentacion,formacion_usuarios,induccion_biblioteca,busqueda_informacion
                                                        ,seminario_taller,referenciacion,obtencion_articulos,buzon_sugerencias
                                                        ,renovacion_linea,preguntele_bibliotecologo,seguidores_facebook,canal_youtube
                                                        ,seguidores_twitter,nro_titulos_revista_imp,nro_titulos_revista_elec,nro_titulos_libros
                                                        ,nro_consultas,material_especial,revistas_indexadas,nro_ctas_creadas
                                                        ,suscripcion,open_access, Verificado
	from siq_bibliotecainfhuerfana sbih 
	join siq_clasificacionesinfhuerfana sch1 using(idclasificacionesinfhuerfana) 
	join siq_clasificacionesinfhuerfana sch2 on sch1.idpadreclasificacionesinfhuerfana=sch2.idclasificacionesinfhuerfana
	join siq_clasificacionesinfhuerfana sch3 on sch2.idpadreclasificacionesinfhuerfana=sch3.idclasificacionesinfhuerfana
	where sbih.periodicidad=".$periodo." and sch3.aliasclasificacionesinfhuerfana='".$_REQUEST['alias']."'";
     //   echo $query_periodoinf;
        $periodoinf=$db->Execute($query_periodoinf);
        $row_mesinf=0; $int=0;
        foreach ($periodoinf as $ro){ $row_mesinf ++; }
            if($row_mesinf==0){ 
             //  echo $_REQUEST['action'].'-->>';
                if($_REQUEST['action']=='saveDynamic2' and $row_mesinf==0){	
                   // print_r($_REQUEST['idclasificacionesinfhuerfana']);
                    foreach ($_REQUEST['idclasificacionesinfhuerfana']as $row){
                              // if($_REQUEST['formulario']=='desarrollo'){
                                        $vlr1=($_REQUEST['titulos'][$int])?$_REQUEST['titulos'][$int]:'null';
                                        $vlr2=($_REQUEST['volumenes'][$int])?$_REQUEST['volumenes'][$int]:'null';
                                        $vlr3=($_REQUEST['cantidad'][$int])?$_REQUEST['cantidad'][$int]:'null';
                                        $vlr4=($_REQUEST['cant_usuarios_ing_biblioteca'][$int])?$_REQUEST['cant_usuarios_ing_biblioteca'][$int]:'null';
                                        $vlr5=($_REQUEST['prestamo_equipos'][$int])?$_REQUEST['prestamo_equipos'][$int]:'null';
                                        $vlr6=($_REQUEST['prestamo_libros'][$int])?$_REQUEST['prestamo_libros'][$int]:'null';
                                        $vlr7=($_REQUEST['prestamo_revistas'][$int])?$_REQUEST['prestamo_revistas'][$int]:'null';
                                        $vlr8=($_REQUEST['prestamo_trabajos_grado'][$int])?$_REQUEST['prestamo_trabajos_grado'][$int]:'null';
                                        $vlr9=($_REQUEST['prestamo_material_especial'][$int])?$_REQUEST['prestamo_material_especial'][$int]:'null';
                                        $vlr10=($_REQUEST['dentro_campus'][$int])?$_REQUEST['dentro_campus'][$int]:'null';
                                        $vlr11=($_REQUEST['fuera_campus'][$int])?$_REQUEST['fuera_campus'][$int]:'null';
                                        $vlr12=($_REQUEST['prestamo_sala'][$int])?$_REQUEST['prestamo_sala'][$int]:'null';
                                        $vlr13=($_REQUEST['prestamo_externo'][$int])?$_REQUEST['prestamo_externo'][$int]:'null';
                                        $vlr14=($_REQUEST['prestamo_interbibliotecario'][$int])?$_REQUEST['prestamo_interbibliotecario'][$int]:'null';
                                        $vlr15=($_REQUEST['renovaciones_presenciales'][$int])?$_REQUEST['renovaciones_presenciales'][$int]:'null';
                                        $vlr16=($_REQUEST['sugerencias_recibidas'][$int])?$_REQUEST['sugerencias_recibidas'][$int]:'null';
                                        $vlr17=($_REQUEST['cartas_presentacion'][$int])?$_REQUEST['cartas_presentacion'][$int]:'null';
                                        $vlr18=($_REQUEST['formacion_usuarios'][$int])?$_REQUEST['formacion_usuarios'][$int]:'null';
                                        $vlr19=($_REQUEST['induccion_biblioteca'][$int])?$_REQUEST['induccion_biblioteca'][$int]:'null';
                                        $vlr20=($_REQUEST['busqueda_informacion'][$int])?$_REQUEST['busqueda_informacion'][$int]:'null';
                                        $vlr21=($_REQUEST['seminario_taller'][$int])?$_REQUEST['seminario_taller'][$int]:'null';
                                        $vlr22=($_REQUEST['referenciacion'][$int])?$_REQUEST['referenciacion'][$int]:'null';
                                        $vlr23=($_REQUEST['obtencion_articulos'][$int])?$_REQUEST['obtencion_articulos'][$int]:'null';
                                        $vlr24=($_REQUEST['buzon_sugerencias'][$int])?$_REQUEST['buzon_sugerencias'][$int]:'null';
                                        $vlr25=($_REQUEST['renovacion_linea'][$int])?$_REQUEST['renovacion_linea'][$int]:'null';
                                        $vlr26=($_REQUEST['preguntele_bibliotecologo'][$int])?$_REQUEST['preguntele_bibliotecologo'][$int]:'null';
                                        $vlr27=($_REQUEST['seguidores_facebook'][$int])?$_REQUEST['seguidores_facebook'][$int]:'null';
                                        $vlr28=($_REQUEST['canal_youtube'][$int])?$_REQUEST['canal_youtube'][$int]:'null';
                                        $vlr29=($_REQUEST['seguidores_twitter'][$int])?$_REQUEST['seguidores_twitter'][$int]:'null';
                                        $vlr30=($_REQUEST['nro_titulos_revista_imp'][$int])?$_REQUEST['nro_titulos_revista_imp'][$int]:'null';
                                        $vlr31=($_REQUEST['nro_titulos_revista_elec'][$int])?$_REQUEST['nro_titulos_revista_elec'][$int]:'null';
                                        $vlr32=($_REQUEST['nro_titulos_libros'][$int])?$_REQUEST['nro_titulos_libros'][$int]:'null';
                                        $vlr33=($_REQUEST['nro_consultas'][$int])?$_REQUEST['nro_consultas'][$int]:'null';
                                        $vlr34=($_REQUEST['material_especial'][$int])?$_REQUEST['material_especial'][$int]:'null';
                                        $vlr35=($_REQUEST['revistas_indexadas'][$int])?$_REQUEST['revistas_indexadas'][$int]:'null';
                                        $vlr36=($_REQUEST['nro_ctas_creadas'][$int])?$_REQUEST['nro_ctas_creadas'][$int]:'null';
                                        $vlr37=($_REQUEST['suscripcion'][$int])?$_REQUEST['suscripcion'][$int]:'null';
                                        $vlr38=($_REQUEST['open_access'][$int])?$_REQUEST['open_access'][$int]:'null';
                                        $vlr39=($_REQUEST['Verificado'][$int])?$_REQUEST['Verificado'][$int]:'0';
                                        
                                        $query_inserta="INSERT INTO siq_bibliotecainfhuerfana 
                                                        (periodicidad,idclasificacionesinfhuerfana
                                                        ,titulos,volumenes,cantidad,cant_usuarios_ing_biblioteca
                                                        ,prestamo_equipos,prestamo_libros,prestamo_revistas,prestamo_trabajos_grado
                                                        ,prestamo_material_especial,dentro_campus,fuera_campus,prestamo_sala
                                                        ,prestamo_externo,prestamo_interbibliotecario,renovaciones_presenciales,sugerencias_recibidas
                                                        ,cartas_presentacion,formacion_usuarios,induccion_biblioteca,busqueda_informacion
                                                        ,seminario_taller,referenciacion,obtencion_articulos,buzon_sugerencias
                                                        ,renovacion_linea,preguntele_bibliotecologo,seguidores_facebook,canal_youtube
                                                        ,seguidores_twitter,nro_titulos_revista_imp,nro_titulos_revista_elec,nro_titulos_libros
                                                        ,nro_consultas,material_especial,revistas_indexadas,nro_ctas_creadas
                                                        ,suscripcion,open_access, Verificado)
                                                VALUES (".$periodo.",".$row."
                                                        ,".$vlr1.",".$vlr2.",".$vlr3.",".$vlr4."
                                                        ,".$vlr5.",".$vlr6.",".$vlr7.",".$vlr8."
                                                        ,".$vlr9.",".$vlr10.",".$vlr11.",".$vlr12."
                                                        ,".$vlr13.",".$vlr14.",".$vlr15.",".$vlr16."
                                                        ,".$vlr17.",".$vlr18.",".$vlr19.",".$vlr20."
                                                        ,".$vlr21.",".$vlr22.",".$vlr23.",".$vlr24."
                                                        ,".$vlr25.",".$vlr26.",".$vlr27.",".$vlr28."
                                                        ,".$vlr29.",".$vlr30.",".$vlr31.",".$vlr32."
                                                        ,".$vlr33.",".$vlr34.",".$vlr35.",".$vlr36."
                                                        ,".$vlr37.",".$vlr38.",".$vlr39.")";
                                //}
                               // echo $query_inserta;
                                if($inserta= &$db->Execute($query_inserta)===false){
                                    $a_vectt['descrip']	='Error En el SQL Insert O Consulta....'.$query_inserta;
                                    echo json_encode($a_vectt);
                                    exit;
                            }//if_insert
                            $int++;
                    }//foreach
                    $a_vectt['success']=true; $a_vectt['descrip']='Los datos han sido guardados de forma correcta ';
                    echo json_encode($a_vectt);
                    exit;
                }else{
                    $a_vectt['success']=false; $a_vectt['descrip']='No hay datos';
                    echo json_encode($a_vectt);
                    exit;
                }
            }else{
                  //  echo $_REQUEST['action'].'-->';
                    if($_REQUEST['action']=='selectDynamic2' && $row_mesinf>0){
                       //  echo $_REQUEST['action'].'-->>';
                        $i=0;
                        foreach ($periodoinf as $row){
                          //  if($_REQUEST['formulario']=='desarrollo'){
                                $a_vectt[$i]['id']=$row['id'];
                                $a_vectt[$i]['idclasificacionesinfhuerfana']=$row['idclasificacionesinfhuerfana'];
                                $a_vectt[$i]['titulos']=$row['titulos'];
                                $a_vectt[$i]['cantidad']=$row['cantidad'];
                                $a_vectt[$i]['volumenes']=$row['volumenes'];
                                $a_vectt[$i]['cant_usuarios_ing_biblioteca']=$row['cant_usuarios_ing_biblioteca'];
                                $a_vectt[$i]['prestamo_equipos']=$row['prestamo_equipos'];
                                $a_vectt[$i]['prestamo_libros']=$row['prestamo_libros'];
                                $a_vectt[$i]['prestamo_revistas']=$row['prestamo_revistas'];
                                $a_vectt[$i]['prestamo_trabajos_grado']=$row['prestamo_trabajos_grado'];
                                $a_vectt[$i]['prestamo_material_especial']=$row['prestamo_material_especial'];
                                $a_vectt[$i]['dentro_campus']=$row['dentro_campus'];
                                $a_vectt[$i]['fuera_campus']=$row['fuera_campus'];
                                $a_vectt[$i]['prestamo_sala']=$row['prestamo_sala'];
                                $a_vectt[$i]['prestamo_externo']=$row['prestamo_externo'];
                                $a_vectt[$i]['prestamo_interbibliotecario']=$row['prestamo_interbibliotecario'];
                                $a_vectt[$i]['renovaciones_presenciales']=$row['renovaciones_presenciales'];
                                $a_vectt[$i]['sugerencias_recibidas']=$row['sugerencias_recibidas'];
                                $a_vectt[$i]['cartas_presentacion']=$row['cartas_presentacion'];
                                $a_vectt[$i]['formacion_usuarios']=$row['formacion_usuarios'];
                                $a_vectt[$i]['induccion_biblioteca']=$row['induccion_biblioteca'];
                                $a_vectt[$i]['busqueda_informacion']=$row['busqueda_informacion'];
                                $a_vectt[$i]['seminario_taller']=$row['seminario_taller'];
                                $a_vectt[$i]['referenciacion']=$row['referenciacion'];
                                $a_vectt[$i]['obtencion_articulos']=$row['obtencion_articulos'];
                                $a_vectt[$i]['buzon_sugerencias']=$row['buzon_sugerencias'];
                                $a_vectt[$i]['renovacion_linea']=$row['renovacion_linea'];
                                $a_vectt[$i]['preguntele_bibliotecologo']=$row['preguntele_bibliotecologo'];
                                $a_vectt[$i]['seguidores_facebook']=$row['seguidores_facebook'];
                                $a_vectt[$i]['canal_youtube']=$row['canal_youtube'];
                                $a_vectt[$i]['seguidores_twitter']=$row['seguidores_twitter'];
                                $a_vectt[$i]['nro_titulos_revista_imp']=$row['nro_titulos_revista_imp'];
                                $a_vectt[$i]['nro_titulos_revista_elec']=$row['nro_titulos_revista_elec'];
                                $a_vectt[$i]['nro_titulos_libros']=$row['nro_titulos_libros'];
                                $a_vectt[$i]['nro_consultas']=$row['nro_consultas'];
                                $a_vectt[$i]['material_especial']=$row['material_especial'];
                                $a_vectt[$i]['revistas_indexadas']=$row['revistas_indexadas'];
                                $a_vectt[$i]['nro_ctas_creadas']=$row['nro_ctas_creadas'];
                                $a_vectt[$i]['suscripcion']=$row['suscripcion'];
                                $a_vectt[$i]['open_access']=$row['open_access'];
                                $a_vectt[$i]['Verificado']=$row['Verificado'];
                          //  }
                           $i++;
                        }
                        $a_vectt['total']=$i;    $a_vectt['success']=true; $a_vectt['descrip']='Consultando';
                        echo json_encode($a_vectt);
                        exit;
                    }else if($_REQUEST['action']=='updateDynamic2' || $row_mesinf>0 ){
                      //  echo "aca3..";
                       // print_r($_REQUEST['idclasificacionesinfhuerfana']);
                        $j=0; $int=0;
                        foreach ($_REQUEST['idclasificacionesinfhuerfana'] as $row){
                             if (!empty($_REQUEST['titulos'][$int]))                          $vlr1="titulos='".$_REQUEST['titulos'][$int]."',";
                                if (!empty($_REQUEST['volumenes'][$int]))                     $vlr2="volumenes='".$_REQUEST['volumenes'][$int]."'";
                                if (!empty($_REQUEST['cantidad'][$int]))                      $vlr3="cantidad='".$_REQUEST['cantidad'][$int]."'";
                                if (!empty($_REQUEST['cant_usuarios_ing_biblioteca'][$int]))  $vlr4="cant_usuarios_ing_biblioteca='".$_REQUEST['cant_usuarios_ing_biblioteca'][$int]."',";
                                if (!empty($_REQUEST['prestamo_equipos'][$int]))              $vlr5="prestamo_equipos='".$_REQUEST['prestamo_equipos'][$int]."',";
                                if (!empty($_REQUEST['prestamo_libros'][$int]))               $vlr6="prestamo_libros='".$_REQUEST['prestamo_libros'][$int]."',";
                                if (!empty($_REQUEST['prestamo_revistas'][$int]))             $vlr7="prestamo_revistas='".$_REQUEST['prestamo_revistas'][$int]."',";
                                if (!empty($_REQUEST['prestamo_trabajos_grado'][$int]))       $vlr8="prestamo_trabajos_grado='".$_REQUEST['prestamo_trabajos_grado'][$int]."',";
                                if (!empty($_REQUEST['prestamo_material_especial'][$int]))    $vlr9="prestamo_material_especial='".$_REQUEST['prestamo_material_especial'][$int]."'";
                                if (!empty($_REQUEST['dentro_campus'][$int]))                 $vlr10="dentro_campus='".$_REQUEST['dentro_campus'][$int]."',";
                                if (!empty($_REQUEST['fuera_campus'][$int]))                  $vlr11="fuera_campus='".$_REQUEST['fuera_campus'][$int]."'";
                                if (!empty($_REQUEST['prestamo_sala'][$int]))                 $vlr12="prestamo_sala='".$_REQUEST['prestamo_sala'][$int]."',";
                                if (!empty($_REQUEST['prestamo_externo'][$int]))              $vlr13="prestamo_externo='".$_REQUEST['prestamo_externo'][$int]."',  ";
                                if (!empty($_REQUEST['prestamo_interbibliotecario'][$int]))   $vlr14="prestamo_interbibliotecario='".$_REQUEST['prestamo_interbibliotecario'][$int]."',";
                                if (!empty($_REQUEST['renovaciones_presenciales'][$int]))     $vlr15="renovaciones_presenciales='".$_REQUEST['renovaciones_presenciales'][$int]."',";
                                if (!empty($_REQUEST['sugerencias_recibidas'][$int]))         $vlr16="sugerencias_recibidas='".$_REQUEST['sugerencias_recibidas'][$int]."',";
                                if (!empty($_REQUEST['cartas_presentacion'][$int]))           $vlr17="cartas_presentacion='".$_REQUEST['cartas_presentacion'][$int]."',";
                                if (!empty($_REQUEST['formacion_usuarios'][$int]))            $vlr18="formacion_usuarios='".$_REQUEST['formacion_usuarios'][$int]."'";
                                if (!empty($_REQUEST['induccion_biblioteca'][$int]))          $vlr19="induccion_biblioteca='".$_REQUEST['induccion_biblioteca'][$int]."',";
                                if (!empty($_REQUEST['busqueda_informacion'][$int]))          $vlr20="busqueda_informacion='".$_REQUEST['busqueda_informacion'][$int]."',";
                                if (!empty($_REQUEST['seminario_taller'][$int]))              $vlr21="seminario_taller='".$_REQUEST['seminario_taller'][$int]."',";
                                if (!empty($_REQUEST['referenciacion'][$int]))                $vlr22="referenciacion='".$_REQUEST['referenciacion'][$int]."'";
                                if (!empty($_REQUEST['obtencion_articulos'][$int]))           $vlr23="obtencion_articulos='".$_REQUEST['obtencion_articulos'][$int]."',";
                                if (!empty($_REQUEST['buzon_sugerencias'][$int]))             $vlr24="buzon_sugerencias='".$_REQUEST['buzon_sugerencias'][$int]."',";
                                if (!empty($_REQUEST['renovacion_linea'][$int]))              $vlr25="renovacion_linea='".$_REQUEST['renovacion_linea'][$int]."'";
                                if (!empty($_REQUEST['preguntele_bibliotecologo'][$int]))     $vlr26="preguntele_bibliotecologo='".$_REQUEST['preguntele_bibliotecologo'][$int]."',";
                                if (!empty($_REQUEST['seguidores_facebook'][$int]))           $vlr27="seguidores_facebook='".$_REQUEST['seguidores_facebook'][$int]."',";
                                if (!empty($_REQUEST['canal_youtube'][$int]))                 $vlr28="canal_youtube='".$_REQUEST['canal_youtube'][$int]."',";
                                if (!empty($_REQUEST['seguidores_twitter'][$int]))            $vlr29="seguidores_twitter='".$_REQUEST['seguidores_twitter'][$int]."'";
                                if (!empty($_REQUEST['nro_titulos_revista_imp'][$int]))       $vlr30="nro_titulos_revista_imp='".$_REQUEST['nro_titulos_revista_imp'][$int]."',";
                                if (!empty($_REQUEST['nro_titulos_revista_elec'][$int]))      $vlr31="nro_titulos_revista_elec='".$_REQUEST['nro_titulos_revista_elec'][$int]."',";
                                if (!empty($_REQUEST['nro_titulos_libros'][$int]))            $vlr32="nro_titulos_libros='".$_REQUEST['nro_titulos_libros'][$int]."',";
                                if (!empty($_REQUEST['nro_consultas'][$int]))                 $vlr33="nro_consultas='".$_REQUEST['nro_consultas'][$int]."',";
                                if (!empty($_REQUEST['material_especial'][$int]))             $vlr34="material_especial='".$_REQUEST['material_especial'][$int]."',";
                                if (!empty($_REQUEST['revistas_indexadas'][$int]))            $vlr35="revistas_indexadas='".$_REQUEST['revistas_indexadas'][$int]."',";
                                if (!empty($_REQUEST['nro_ctas_creadas'][$int]))              $vlr36="nro_ctas_creadas='".$_REQUEST['nro_ctas_creadas'][$int]."'";
                                if (!empty($_REQUEST['suscripcion'][$int]))                   $vlr37="suscripcion='".$_REQUEST['suscripcion'][$int]."',";
                                if (!empty($_REQUEST['open_access'][$int]))                   $vlr38="open_access='".$_REQUEST['open_access'][$int]."'";
                                if (!empty($_REQUEST['Verificado']) or $_REQUEST['Verificado']==0)                          $vlr39=",Verificado='".$_REQUEST['Verificado']."'";
                            //if($_REQUEST['formulario']=='desarrollo'){
                              // echo $_REQUEST['Verificado'].'-->'.$vlr39.'<----';
                               
                                $query_update="UPDATE siq_bibliotecainfhuerfana SET 
                                    ".$vlr1." ".$vlr2." ".$vlr3." ".$vlr4." ".$vlr5." ".$vlr6." ".$vlr7." ".$vlr8." ".$vlr9." ".$vlr10."
                                    ".$vlr11." ".$vlr12." ".$vlr13." ".$vlr14." ".$vlr15." ".$vlr16." ".$vlr17." ".$vlr18." ".$vlr19." ".$vlr20."
                                    ".$vlr21." ".$vlr22." ".$vlr23." ".$vlr24." ".$vlr25." ".$vlr26." ".$vlr27." ".$vlr28." ".$vlr29." ".$vlr30."
                                    ".$vlr31." ".$vlr32." ".$vlr33." ".$vlr34." ".$vlr35." ".$vlr36." ".$vlr37." ".$vlr38." ".$vlr39." 
                                    WHERE id='".$_REQUEST['id'][$int]."' ";
                            
                            //}
                              //echo $query_update,'-->>';
                            if($inserta= &$db->Execute($query_update)===false){
                                    $a_vectt['val']='FALSE'; $a_vectt['descrip']='Error En el SQL Insert O Consulta....'.$query_update;
                                    echo json_encode($a_vectt);
                                    exit;
                            }else{
                                $j++;
                            }
                            $int++;
                        }
                        if($j>0){
                               $a_vectt['success'] =true; $a_vectt['descrip'] ='Los datos han sido modificados de forma correcta ';
                                echo json_encode($a_vectt);
                                exit;
                        }else{
                            $a_vectt['success'] =true; $a_vectt['descrip'] ='Hay un Error';
                                echo json_encode($a_vectt);
                                exit;
                        }
                    }else{ 
                        $a_vectt['success']=false;  $a_vectt['descrip']='No hay datosxxxx';
                        echo json_encode($a_vectt);
                        exit;
                    }
            }


/*$query="select sbih.id
	from siq_bibliotecainfhuerfana sbih 
	join siq_clasificacionesinfhuerfana sch1 using(idclasificacionesinfhuerfana) 
	join siq_clasificacionesinfhuerfana sch2 on sch1.idpadreclasificacionesinfhuerfana=sch2.idclasificacionesinfhuerfana
	join siq_clasificacionesinfhuerfana sch3 on sch2.idpadreclasificacionesinfhuerfana=sch3.idclasificacionesinfhuerfana
	where sbih.periodicidad=".$periodo." and sch3.aliasclasificacionesinfhuerfana='".$_REQUEST['alias']."'";
$exec= $db->Execute($query);
if($exec->RecordCount()==0) {
	foreach ($_REQUEST['aux'] as $int) {
		$vlr1=($_REQUEST['titulos'][$int])?$_REQUEST['titulos'][$int]:'null';
		$vlr2=($_REQUEST['volumenes'][$int])?$_REQUEST['volumenes'][$int]:'null';
		$vlr3=($_REQUEST['cantidad'][$int])?$_REQUEST['cantidad'][$int]:'null';
		$vlr4=($_REQUEST['cant_usuarios_ing_biblioteca'][$int])?$_REQUEST['cant_usuarios_ing_biblioteca'][$int]:'null';
		$vlr5=($_REQUEST['prestamo_equipos'][$int])?$_REQUEST['prestamo_equipos'][$int]:'null';
		$vlr6=($_REQUEST['prestamo_libros'][$int])?$_REQUEST['prestamo_libros'][$int]:'null';
		$vlr7=($_REQUEST['prestamo_revistas'][$int])?$_REQUEST['prestamo_revistas'][$int]:'null';
		$vlr8=($_REQUEST['prestamo_trabajos_grado'][$int])?$_REQUEST['prestamo_trabajos_grado'][$int]:'null';
		$vlr9=($_REQUEST['prestamo_material_especial'][$int])?$_REQUEST['prestamo_material_especial'][$int]:'null';
		$vlr10=($_REQUEST['dentro_campus'][$int])?$_REQUEST['dentro_campus'][$int]:'null';
		$vlr11=($_REQUEST['fuera_campus'][$int])?$_REQUEST['fuera_campus'][$int]:'null';
		$vlr12=($_REQUEST['prestamo_sala'][$int])?$_REQUEST['prestamo_sala'][$int]:'null';
		$vlr13=($_REQUEST['prestamo_externo'][$int])?$_REQUEST['prestamo_externo'][$int]:'null';
		$vlr14=($_REQUEST['prestamo_interbibliotecario'][$int])?$_REQUEST['prestamo_interbibliotecario'][$int]:'null';
		$vlr15=($_REQUEST['renovaciones_presenciales'][$int])?$_REQUEST['renovaciones_presenciales'][$int]:'null';
		$vlr16=($_REQUEST['sugerencias_recibidas'][$int])?$_REQUEST['sugerencias_recibidas'][$int]:'null';
		$vlr17=($_REQUEST['cartas_presentacion'][$int])?$_REQUEST['cartas_presentacion'][$int]:'null';
		$vlr18=($_REQUEST['formacion_usuarios'][$int])?$_REQUEST['formacion_usuarios'][$int]:'null';
		$vlr19=($_REQUEST['induccion_biblioteca'][$int])?$_REQUEST['induccion_biblioteca'][$int]:'null';
		$vlr20=($_REQUEST['busqueda_informacion'][$int])?$_REQUEST['busqueda_informacion'][$int]:'null';
		$vlr21=($_REQUEST['seminario_taller'][$int])?$_REQUEST['seminario_taller'][$int]:'null';
		$vlr22=($_REQUEST['referenciacion'][$int])?$_REQUEST['referenciacion'][$int]:'null';
		$vlr23=($_REQUEST['obtencion_articulos'][$int])?$_REQUEST['obtencion_articulos'][$int]:'null';
		$vlr24=($_REQUEST['buzon_sugerencias'][$int])?$_REQUEST['buzon_sugerencias'][$int]:'null';
		$vlr25=($_REQUEST['renovacion_linea'][$int])?$_REQUEST['renovacion_linea'][$int]:'null';
		$vlr26=($_REQUEST['preguntele_bibliotecologo'][$int])?$_REQUEST['preguntele_bibliotecologo'][$int]:'null';
		$vlr27=($_REQUEST['seguidores_facebook'][$int])?$_REQUEST['seguidores_facebook'][$int]:'null';
		$vlr28=($_REQUEST['canal_youtube'][$int])?$_REQUEST['canal_youtube'][$int]:'null';
		$vlr29=($_REQUEST['seguidores_twitter'][$int])?$_REQUEST['seguidores_twitter'][$int]:'null';
		$vlr30=($_REQUEST['nro_titulos_revista_imp'][$int])?$_REQUEST['nro_titulos_revista_imp'][$int]:'null';
		$vlr31=($_REQUEST['nro_titulos_revista_elec'][$int])?$_REQUEST['nro_titulos_revista_elec'][$int]:'null';
		$vlr32=($_REQUEST['nro_titulos_libros'][$int])?$_REQUEST['nro_titulos_libros'][$int]:'null';
		$vlr33=($_REQUEST['nro_consultas'][$int])?$_REQUEST['nro_consultas'][$int]:'null';
		$vlr34=($_REQUEST['material_especial'][$int])?$_REQUEST['material_especial'][$int]:'null';
		$vlr35=($_REQUEST['revistas_indexadas'][$int])?$_REQUEST['revistas_indexadas'][$int]:'null';
		$vlr36=($_REQUEST['nro_ctas_creadas'][$int])?$_REQUEST['nro_ctas_creadas'][$int]:'null';
		$vlr37=($_REQUEST['suscripcion'][$int])?$_REQUEST['suscripcion'][$int]:'null';
		$vlr38=($_REQUEST['open_access'][$int])?$_REQUEST['open_access'][$int]:'null';
                $vlr39=($_REQUEST['Verificado'][$int])?$_REQUEST['Verificado'][$int]:'0';
		$query="INSERT INTO siq_bibliotecainfhuerfana 
				(periodicidad,idclasificacionesinfhuerfana
				,titulos,volumenes,cantidad,cant_usuarios_ing_biblioteca
				,prestamo_equipos,prestamo_libros,prestamo_revistas,prestamo_trabajos_grado
				,prestamo_material_especial,dentro_campus,fuera_campus,prestamo_sala
				,prestamo_externo,prestamo_interbibliotecario,renovaciones_presenciales,sugerencias_recibidas
				,cartas_presentacion,formacion_usuarios,induccion_biblioteca,busqueda_informacion
				,seminario_taller,referenciacion,obtencion_articulos,buzon_sugerencias
				,renovacion_linea,preguntele_bibliotecologo,seguidores_facebook,canal_youtube
				,seguidores_twitter,nro_titulos_revista_imp,nro_titulos_revista_elec,nro_titulos_libros
				,nro_consultas,material_especial,revistas_indexadas,nro_ctas_creadas
				,suscripcion,open_access, Verificado)
			VALUES (".$periodo.",".$int."
				,".$vlr1.",".$vlr2.",".$vlr3.",".$vlr4."
				,".$vlr5.",".$vlr6.",".$vlr7.",".$vlr8."
				,".$vlr9.",".$vlr10.",".$vlr11.",".$vlr12."
				,".$vlr13.",".$vlr14.",".$vlr15.",".$vlr16."
				,".$vlr17.",".$vlr18.",".$vlr19.",".$vlr20."
				,".$vlr21.",".$vlr22.",".$vlr23.",".$vlr24."
				,".$vlr25.",".$vlr26.",".$vlr27.",".$vlr28."
				,".$vlr29.",".$vlr30.",".$vlr31.",".$vlr32."
				,".$vlr33.",".$vlr34.",".$vlr35.",".$vlr36."
				,".$vlr37.",".$vlr38.",".$vlr39.")";
		$db->Execute($query);
	}
	$mensaje='Información almacenada para el periodo '.$periodo;
} else {
	$mensaje='Ya existe información almacenada para el periodo '.$periodo;
        $success = false;
}*/

$data = array('success'=> $success,'message'=> $mensaje);
echo json_encode($data);
?>
