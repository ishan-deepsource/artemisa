<?php
/**
 * Table Definition for estadosoportetecnico
 */
require_once '../funciones/pear/DB/DataObject.php';

class DataObjects_Estadosoportetecnico extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    var $__table = 'estadosoportetecnico';            // table name
    var $codigoestadosoportetecnico;      // string(3)  not_null primary_key
    var $nombreestadosoportetecnico;      // string(50)  not_null
    var $codigoestado;                    // string(3)  not_null multiple_key

    /* Static get */
    function staticGet($k,$v=NULL) { return DB_DataObject::staticGet('DataObjects_Estadosoportetecnico',$k,$v); }

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}