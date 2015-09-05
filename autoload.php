<?php 

$path = "tests/";
$diretorio = dir($path);

echo "<div class='header color4'>Lista de arquivos no diretório {$path}:</div>";
echo " <br>";
echo "<ul>";
while( $arquivo = $diretorio->read() ) {
	if( $arquivo != '..' && $arquivo != '.' )
		echo "<li><a href='".$path.$arquivo."' title='".extension($arquivo)."'>".convertTitle($arquivo)."</a></li>";
}
echo "</ul>";

function convertTitle( $archive ) {
	$extension = substr($archive, strpos($archive, "."));
	$titleCamelCase = str_replace($extension, "",$archive);
	$array = str_split($titleCamelCase);
	foreach ($array as $key => $value) {
		if( preg_match('/^[^a-z]*$/',$value) )
			$array[$key] = ' '.$value;
	}
		
	return implode('',$array);
}

function extension( $archive ) {
	return substr($archive, strpos($archive, ".")+1);
}