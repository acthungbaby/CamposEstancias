<?php

function __autoload($class_name)
{
	$class_name = strtolower($class_name);
	
	$path = "includes/{$class_name}.php";
	
	if(file_exists($path))
	{
		require_once($path);
	}
	else
	{
		die("El archivo ".$class_name.".php nose ha encontrado.");
	}
}

function format_date($date = "")
{
	if($date != "")
	{
		$new_date = substr($date, 8, 2) . "/";
		$new_date .= substr($date, 5, 2) . "/";
		$new_date .= substr($date, 0, 4);
		
		return $new_date;
	}
	else
	{
		return false;
	}
}

function text_excerpt($text = "", $long = 200)
{
	$new_text = substr(strip_tags($text), 0, $long) . " [...]";
	
	return($new_text);
}

function user_exist($email)
{
	$sql = "SELECT * FROM usuarios WHERE email = '".$email."'";
	$sql = mysql_query($sql);
	if(mysql_num_rows($sql) > 0):
		echo "<script>alert('El usuario ya existe.');</script>";
		return false;
	else:
		return true;
	endif;
}

function user_login($email,$password){
	$sql = "SELECT * FROM usuarios WHERE email = '".$email."' AND password = '".$password."' AND activo = '0'";
	$sql = mysql_query($sql);
	if(mysql_num_rows($sql) > 0):
		while($_SESSION['usuario'] = mysql_fetch_array($sql)):
			return true;
		endwhile;
		return true;
	else:
		return false;
	endif;
}

function DMStoDEC($deg,$min,$sec)
{

// Converts DMS ( Degrees / minutes / seconds ) 
// to decimal format longitude / latitude

    return $deg+((($min*60)+($sec))/3600);
}    

function DECtoDMS($dec)
{

// Converts decimal longitude / latitude to DMS
// ( Degrees / minutes / seconds ) 

// This is the piece of code which may appear to 
// be inefficient, but to avoid issues with floating
// point math we extract the integer part and the float
// part by using a string function.

    $vars = explode(".",$dec);
    $deg = $vars[0];
    $tempma = "0.".$vars[1];

    $tempma = $tempma * 3600;
    $min = floor($tempma / 60);
    $sec = $tempma - ($min*60);

    return array("deg"=>$deg,"min"=>$min,"sec"=>$sec);
}

function youtube_id_from_url($url) {
    $pattern = 
        '%^# Match any youtube URL
        (?:https?://)?  # Optional scheme. Either http or https
        (?:www\.)?      # Optional www subdomain
        (?:             # Group host alternatives
          youtu\.be/    # Either youtu.be,
        | youtube\.com  # or youtube.com
          (?:           # Group path alternatives
            /embed/     # Either /embed/
          | /v/         # or /v/
          | /watch\?v=  # or /watch\?v=
          )             # End path alternatives.
        )               # End host alternatives.
        ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        $%x'
        ;
    $result = preg_match($pattern, $url, $matches);
    if (false !== $result) {
        return $matches[1];
    }
    return false;
}

?>