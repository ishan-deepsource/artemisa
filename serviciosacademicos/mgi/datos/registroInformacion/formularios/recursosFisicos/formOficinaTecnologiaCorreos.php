<?php
session_start();
require_once("../../../templates/template.php");
$db = getBD();
$utils = new Utils_datos();
?>

<form action="" method="post" id="CorreosE">    
      <input type="hidden" name="action" value="SelectDynamic" id="action" />
    <input type="hidden" name="codigoperiodo" value="" id="codigoperiodo" />
   <input type="hidden" name="formulario" value="CorreosE" />
   

    <?php
		$query_papa = "select idclasificacionesinfhuerfana,clasificacionesinfhuerfana from siq_clasificacionesinfhuerfana where aliasclasificacionesinfhuerfana='T_CECA'";
                $papa= $db->Execute($query_papa);
                $totalRows_papa = $papa->RecordCount();
		$row_papa = $papa->FetchRow();
		?>  
   <input type="hidden" name="padre" value="<?php echo $row_papa['idclasificacionesinfhuerfana']; ?>" />
            <span class="mandatory">* Son campos obligatorios</span>
	      <fieldset>          
		<legend><?php echo $row_papa['clasificacionesinfhuerfana']; ?></legend>
		<label for="semestre" class="grid-2-12">Semestre: <span class="mandatory">(*)</span></label>
		<?php $utils->getSemestresSelect($db,"semestre"); 
                $utils->pintarBotonCargar("popup_cargarDocumento(10,6,$('#CorreosE #semestre').val())","popup_verDocumentos(10,6,$('#CorreosE #semestre').val())"); ?>

		<table align="center" id="estructuraReporte"  class="formData last" width="92%">
		    <thead>             			
			<tr id="dataColumns">
                            <th class="column borderR" ><span>Miembros Comunidad Académica</span></th>
                            <th class="column borderR"><span>Cantidad Correos</span></th>                            
			</tr>				
                   </thead>
		    <tbody>
		      <?php 
		      $query_sectores = "select idclasificacionesinfhuerfana,clasificacionesinfhuerfana from siq_clasificacionesinfhuerfana where idpadreclasificacionesinfhuerfana ='".$row_papa['idclasificacionesinfhuerfana']."' ";
		      $sectores= $db->Execute($query_sectores);
		      $totalRows_sectores = $sectores->RecordCount();
		      while($row_sectores = $sectores->FetchRow()){      
		      ?>
		      <tr id="contentColumns" class="row">
			  <td class="column borderR" ><?php echo $row_sectores['clasificacionesinfhuerfana']; ?>:<span class="mandatory">(*)</span>
                          <input type="hidden" name="idsiq_tecnololgia[] " id="idsiq_tecnololgia_<?php echo $row_sectores['idclasificacionesinfhuerfana']; ?>" />
                          <input type="hidden" name="idclasificacionesinfhuerfana[] " id="idclasificacionesinfhuerfana_<?php echo $row_sectores['idclasificacionesinfhuerfana']; ?>" value="<?php echo $row_sectores['idclasificacionesinfhuerfana']; ?>" /> 
                          </td>
			  <td class="column borderR" ><input type="text" class="required number" minlength="" name="cantidad[]" id="cantidad_<?php echo $row_sectores['idclasificacionesinfhuerfana']; ?>" title="Cantidad" maxlength="60" tabindex="1" autocomplete="off" size="15" /></td> 
		      </tr> 
			<?php 
			}
			?>	
		     </tbody>
		  </table>
                <div class="vacio"></div>
                <div id="msg-success" class="msg-success" style="display:none"></div>
            </fieldset>
	      
	     <input type="submit" id="enviaCorreosE" value="Registrar datos" class="first" />
</form>

<script type="text/javascript">
    
      getformulario_enviaCorreosE("#CorreosE");
    
    $('#CorreosE'+' #semestre').bind('change', function(event) {
         getformulario_enviaCorreosE("#CorreosE");
    });
    
    function getformulario_enviaCorreosE(formName){
                    var codigoperiodo = $(formName + ' #semestre').val();
                    $(formName + " #action").val('SelectDynamic');
                        $.ajax({
                            dataType: 'json',
                            type: 'POST',
                            url: 'formularios/recursosFisicos/saveOficinaTecnologia.php',
                            data: $(formName).serialize(),      
                            success:function(data){
                                if (data.success == true){
                                    for (var i=0;i<data.total;i++){   
                                       // alert(formName+'-->'+data[i].idsiq_tecnologia+'-->'+data[i].idclasificacionesinfhuerfana+'-->'+data[i].cantidad);                                
                                        $(formName + " #idsiq_tecnololgia_"+data[i].idclasificacionesinfhuerfana).val(data[i].idsiq_tecnologia);
                                        $(formName + " #idclasificacionesinfhuerfana_"+data[i].idclasificacionesinfhuerfana).val(data[i].idclasificacionesinfhuerfana);
                                        $(formName + " #cantidad_"+data[i].idclasificacionesinfhuerfana).val(data[i].cantidad);
                                      }
                                    $(formName + " #action").val("UpdateDynamic");
                                    
                                }else{                        
                                    var mes = $(formName + ' #semestre').val();
                                    document.forms[formName.replace("#","")].reset();
                                    $(formName + ' #semestre').val(mes);
                                    $(formName + " #action").val("SaveDynamic");
                                            
                                }
                            },
                            error: function(data,error,errorThrown){alert(error + errorThrown);}
                        }); 
                 }
   
                $('#enviaCorreosE').click(function(event) {
                    event.preventDefault();
                    var valido= validateForm("#CorreosE");
                    if(valido){
                        CorreosE();
                    }
                });

                function CorreosE(){//$('#form_test').serialize()

		    //var empresanacionale = $('#empresanacionale').val();
                    
		  $.ajax({//Ajax
				   type: 'GET',
				   url: 'formularios/recursosFisicos/saveOficinaTecnologia.php',
				   async: false,
				   dataType: 'json',
				   data:$('#CorreosE').serialize(),
				   error:function(objeto, quepaso, otroobj){alert('Error de Conexión , Favor Vuelva a Intentar');},
				  success:function(data){
				    if (data.success == true){			
      getformulario_enviaCorreosE("#CorreosE");		  
					$('#CorreosE #msg-success').html('<p>' + data.descrip + '</p>');
					$('#CorreosE #msg-success').removeClass('msg-error');
					$('#CorreosE #msg-success').css('display','block');
                                        $("#CorreosE #msg-success").delay(5500).fadeOut(800);
				    }
				    else{                        
					$('#CorreosE #msg-success').html('<p>' + data.descrip + '</p>');
					$('#CorreosE #msg-success').addClass('msg-error');
					$('#CorreosE #msg-success').css('display','block');
                                        $("#CorreosE #msg-success").delay(5500).fadeOut(800);
				    }
				}
				//error: function(data,error,errorThrown){alert(error + errorThrown);}
				   
			}); //AJAX

                }
</script>