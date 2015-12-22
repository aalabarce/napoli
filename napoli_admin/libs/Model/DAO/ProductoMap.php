<?php
/** @package    Napoli::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ProductoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ProductoDAO to the producto datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Napoli::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ProductoMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Id"] = new FieldMap("Id","producto","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["CodProveedor"] = new FieldMap("CodProveedor","producto","cod_proveedor",false,FM_TYPE_INT,11,null,false);
			self::$FM["Descripcion"] = new FieldMap("Descripcion","producto","descripcion",false,FM_TYPE_VARCHAR,400,null,false);
			self::$FM["UnidadMedida"] = new FieldMap("UnidadMedida","producto","unidad_medida",false,FM_TYPE_INT,11,null,false);
			self::$FM["Uxb"] = new FieldMap("Uxb","producto","uxb",false,FM_TYPE_INT,11,null,false);
			self::$FM["Rubro"] = new FieldMap("Rubro","producto","rubro",false,FM_TYPE_INT,11,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["producto_ibfk_1"] = new KeyMap("producto_ibfk_1", "Rubro", "Rubro", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>