<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');
require_once('thumbnail.php');

class Propiedades
{
	protected static $table_name = "propiedades";
	protected static $db_fields = array('id', 'ref_alf', 'ref_num', 'region', 'departamento', 'distrito', 'lugar', 'campo_urbano', 'propietario', 'sin_uso', 'descripcion', 'breve', 'sin_uso2', 'superficie', 'unidad_medida', 'moneda', 'precio_un', 'precio', 'sin_uso3', 'latitud', 'longitud', 'alquiler_venta', 'sin_uso4', 'intermediario', 'observacion', 'fecha','foto1', 'foto2', 'foto3', 'foto4', 'foto5', 'foto6', 'foto7', 'foto8', 'foto9', 'video', 'habilitado');
	
	public $id;
	public $ref_alf;
	public $ref_num;
	public $region;
	public $departamento;
	public $distrito;
	public $lugar;
	public $campo_urbano;
	public $propietario;
	public $sin_uso;
	public $descripcion;	
	public $breve;	
	public $sin_uso2;
	public $superficie;
	public $unidad_medida;
	public $moneda;
	public $precio_un;
	public $precio;	
	public $sin_uso3;
	public $latitud;
	public $longitud;
	public $alquiler_venta;
	public $sin_uso4;
	public $intermediario;
	public $observacion;
        public $fecha;
	public $foto1;
	public $foto2;
	public $foto3;
	public $foto4;
	public $foto5;
	public $foto6;
	public $foto7;
	public $foto8;
	public $foto9;
	public $video;
	public $habilitado;
        
	private $temp_path;
	protected $upload_dir="../images/propiedades";
	
	// Pass in $_FILE(['uploaded_file']) as an argument
	public function attach_file($file,$campo)
	{
		global $database;
		// Determine the target_path
		$this->temp_path  = $file['tmp_name'];
		
		switch ($file['type'])
		{
			case "image/gif":
				$this->foto = $campo . "-" . $this->id . ".gif";
				break;
			
			case "image/png":
				$this->foto = $campo . "-" . $this->id . ".png";
				break;
			
			default:
				$this->foto = $campo . "-" . $this->id . ".jpg";
		}
		
		$target_path = $this->upload_dir ."/". $this->foto;
		
		// Attempt to move the file 
		if(move_uploaded_file($this->temp_path, $target_path))
		{

			// Success
			$tn_image = new Thumbnail($this->upload_dir ."/". $this->foto, 640, 0, 0);
			$tn_image->save($this->upload_dir ."/". $this->foto);
			
			// Save a corresponding entry to the database
			$sql = "UPDATE " .self::$table_name. " SET ".$campo." = '" .$this->foto. "' WHERE id = '" .$this->id. "'";
			
			if($database->query($sql))
			{
				// We are done with temp_path, the file isn't there anymore
				unset($this->temp_path);
				return true;
			}
		}
	}


	// Common Database Methods
	public static function find_all()
	{
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
	}
  
	public static function find_by_id($id = 0)
	{
		$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}
  
	public static function find_by_sql($sql="")
	{
		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while($row = $database->fetch_array($result_set))
		{
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}

	public static function count_all()
	{
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name;
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}

	private static function instantiate($record)
	{
		// Could check that $record exists and is an array
		$object = new self;
		
		// More dynamic, short-form approach:
		foreach($record as $attribute=>$value)
		{
			if($object->has_attribute($attribute))
			{
				$object->$attribute = $value;
			}
		}
		return $object;
	}
	
	private function has_attribute($attribute)
	{
		// We don't care about the value, we just want to know if the key exists
		// Will return true or false
		return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes()
	{
		// return an array of attribute names and their values
		$attributes = array();
		foreach(self::$db_fields as $field)
		{
			if(property_exists($this, $field))
			{
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}
	
	protected function sanitized_attributes()
	{
		global $database;
		$clean_attributes = array();
		// sanitize the values before submitting
		// Note: does not alter the actual value of each attribute
		foreach($this->attributes() as $key => $value)
		{
			$clean_attributes[$key] = $database->escape_value($value);
		}
		return $clean_attributes;
	}
	
	public function save()
	{
		// A new record won't have an id yet.
		return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create()
	{
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		if($database->query($sql))
		{
			$this->id = $database->insert_id();
			return true;
		}
		else
		{
			return false;
		}
	}

	public function update()
	{
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - UPDATE table SET key='value', key='value' WHERE condition
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value)
		{
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id='". $database->escape_value($this->id) ."'";
		return ($database->query($sql) == 1) ? true : false;
	}

	public function delete()
	{
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
		$sql = "DELETE FROM ".self::$table_name;
		$sql .= " WHERE id=". $database->escape_value($this->id);
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
		
		// NB: After deleting, the instance of Noticia still 
		// exists, even though the database entry does not.
		// This can be useful, as in:
		//   echo $noticia->titulo . " was deleted";
		// but, for example, we can't call $noticias->update() 
		// after calling $noticia->delete().
	}

}

?>