<?php 
function createMessage($e) {
	echo "
		<style>body{background:#f1f1f1;}</style>
		<center>
			<span style='border:1px solid red;display:block;padding:10px;background:white;font-family:arial;'>
			    Message: {$e->getMessage()}
			</span>
		</center>";
	exit;
}

function dd($data) {
	echo "<style>body {background:black;}</style>";
	echo "<pre style='background:#f4f5f7;border:3px solid #00cc99;padding:10px'>";
	print_r($data);
	exit;
}

function dump($data) {
	var_dump($data);
	exit;
}

function createHash($password = null) {
	$salt = "dfddfdfddfd;dfdfd45654;df45541254sdsdw";
	$unic_salt = "awsqkx12454788956sddef$";
	return sha1($password.$salt.$unic_salt);
}

function uploadImageHelper($uploadClass, $folder, $image) {
	$uploadClass->file($image);
	$uploadClass->folder($folder);

	$error = null;
	switch ($uploadClass->getErrors()) {
        case 1:
            $error = "Formato não esperado";
            break;
        case 2:
            $error = "O tamanho limite para Upload é de 4MB";
            break;
        case 3:
            $error = "Formato não identificado. Por favor, tente novamente.";
            break;
        case 4:
            $error = "Erro interno. Diretório não encontrado.";
            break;
    }

    try {
        if ( $error !== null) {
            throw new Exception($error);
        }

        $uploadClass->move();
       
    } catch(\Exception $e) {
        echo "Ocorreu um erro ao tentar fazer o Upload: " . $e->getMessage();
    }

    return $uploadClass->destinationPath();
}

function in64($string) {
    $string = "jovemMantisfgbvfbbg656565fgffgfgfg_".$string;
    return base64_encode($string);
}

function out64($string) {
    if ($string) {
        $auxiliar = base64_decode($string);
        return explode('_', $auxiliar)[1];
    }

    return false;
}

function real($valor) {
    return number_format($valor, 2,',','.');
}

function currentRouteFromMenu($route) {
    $route = explode('/', $route);
    $controller = explode('Controller', CONTROLLER_NAME)[0];
    $method = METHOD_NAME;

    if (ucfirst($route[0]) == $controller && $route[1] == $method) {
        echo 'currentRouteFromMenu';
    } 
}