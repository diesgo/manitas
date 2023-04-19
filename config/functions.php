<?php
require_once ('config.php');

// $conex = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
// $link = mysqli_connect(DBHOST, DBUSER, DBPWD, DBNAME);

function openConex(){
	$conex=new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
	mysqli_set_charset($conex,'utf8');
    return $conex;
}

function getSetings(){
  $mysqli = openConex();
  $result = $mysqli->query('SELECT * FROM settings INNER JOIN temas ON tema_id = id_tema INNER JOIN titulos ON id_titulo = titulo_id INNER JOIN fuentes ON id_fuente = fuente_id');
  return $result;
  // $conex ->close();
}

function getSetingsById($id){
  $mysqli = openConex();
  $sql ="SELECT * FROM settings
  INNER JOIN temas ON temas.id_tema = settings.tema_id
  INNER JOIN fuentes ON fuentes.id_fuente = settings.fuente_id
  INNER JOIN titulos ON titulos.id_titulo = settings.titulo_id  
  WHERE id =" . $id;
  $result = mysqli_query($mysqli, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row;
}

function getServicios(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM servicios ORDER BY id_servicio ASC');
	return $result;
}

function getServiciosById($id){
  $mysqli = openConex();
  $result = $mysqli->query('SELECT * FROM servicios WHERE id_servicio =' . $id);
  $row = mysqli_fetch_assoc($result);
  return $row;
}

// * FUNCIONES PARA LA TABLA PRODUCTOS

function getTiquets(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM tiquets
	INNER JOIN servicios ON id_servicio = servicio_id');
	return $result;
	echo $result;
}

function getTiquet($tiquet){
  $mysqli = openConex();
  $result = $mysqli->query('SELECT * FROM tiquet_' . $tiquet . ';');
  return $result;
}


function getTiquetsById($id){
  $mysqli = openConex();
  $sql = "SELECT * FROM tiquets	
  INNER JOIN clientes ON id_cliente = cliente_id
  INNER JOIN servicios ON id_servicio = servicio_id
  INNER JOIN estados ON id_estado = estado_id
  WHERE id_tiquet =" . $id;
  $result = mysqli_query($mysqli, $sql);
  $row = mysqli_fetch_assoc($result);
  return $row;
}

function getTiquetsByCliente($id){
  $mysqli = openConex();
  $sql = "SELECT * FROM tiquets	
  INNER JOIN clientes ON id_cliente = cliente_id
  INNER JOIN estados ON id_estado = estado_id
  WHERE cliente_id =" . $id;
  $result = mysqli_query($mysqli, $sql);
  return $result;
}

function getTiquetsByColaborador($id){
  $mysqli = openConex();
  $sql = "SELECT * FROM tiquets
  WHERE colaborador_id = " . $id;
  $result = mysqli_query($mysqli, $sql);
  return $result;
}

function getNumClientes(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT id_cliente FROM clientes');
	return $result;
}

function getNumTiquets(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT id_tiquet FROM tiquets');
	return $result;
}

function getGrupoUsuarios(){
  $mysqli = openConex();
  $result = $mysqli->query('SELECT * 
  FROM grupo_usuarios');
  return $result;
}

function getClientes(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM clientes
	ORDER BY id_cliente ASC');
	return $result;
}

function getEstados(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM estados ORDER BY id_estado ASC');
	return $result;
}

function getEstadosById($id){
  $mysqli = openConex();
  $result = $mysqli->query('SELECT * FROM estados WHERE id_estado =' . $id);
  $row = mysqli_fetch_assoc($result);
  return $row;
}

function getClientesById($id){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM clientes WHERE id_cliente =' . $id);
	$row = mysqli_fetch_assoc($result);
	return $row;
}

function getColaboradoresById($id){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM colaboradores WHERE id_colaborador =' . $id);
	$row = mysqli_fetch_assoc($result);
	return $row;
}

function getColaboradores(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM colaboradores');
	return $result;
}

function getDestinosById($id){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM destinos WHERE id_destino =' . $id);
	$row = mysqli_fetch_assoc($result);
	return $row;
}

function getDestinos(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM destinos');
	return $result;
}

function getUsersById($id){
	$mysqli = openConex();
	$sql = "SELECT * FROM users
  INNER JOIN temas ON id_tema = tema_id
  INNER JOIN fuentes ON id_fuente = fuente_id
  INNER JOIN titulos ON id_titulo = titulo_id
  INNER JOIN grupo_usuarios ON id_grupo = grupo_id
  WHERE id_user =" . $id;
  $result = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_assoc($result);
	return $row;
}

function getUsers(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * 
  INNER JOIN grupo_usuarios ON id = grupo_id
  FROM users');
	return $result;
}

function getUserByName($user){
  $mysqli = openConex();
  $result = $mysqli->query('SELECT * FROM users WHERE users.username =' . $user);
  return $result;
}

function getTemas(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM temas');
	return $result;
}

function getFuente(){
	$mysqli = openConex();
	$result = $mysqli->query('SELECT * FROM fuentes');
	return $result;
}

function getTitulos(){
  $mysqli = openConex();
  $result = $mysqli->query('SELECT * FROM titulos');
  return $result;
}

function crear($id_socio){
  $socio = getClientesById($id_socio);
  $xml = new DomDocument('1.0', 'UTF-8');
  // $dispensar = $xml->createElement('dispensar');
  // $dispensar = $xml->appendChild($dispensar);
  $socios = $xml->createElement('socio');
  $socios = $xml->appendChild($socios);
  // Agregar un atributo al socio
  // $socio->setAttribute('seccion', 'favoritos');

  $id_socio = $xml->createElement('id_socio', $socio['id_socio']);
  $id_socio = $socios->appendChild($id_socio);

  $nombre = $xml->createElement('nombre', $socio['nombre_socio']);
  $nombre = $socios->appendChild($nombre);
  
  $apellidos = $xml->createElement('apellidos', $socio['apellidos_socio']);
  $apellidos = $socios->appendChild($apellidos);
  
  $genero = $xml->createElement('genero', $socio['genero_id']);
  $genero = $socios->appendChild($genero);

  $card_id_socio = $xml->createElement('card_id_socio', $socio['card_id_socio']);
  $card_id_socio = $socios->appendChild($card_id_socio);

  $birth = $xml->createElement('birth', $socio['birth']);
  $birth = $socios->appendChild($birth);

  $pais_id = $xml->createElement('pais_id', $socio['pais_id']);
  $pais_id = $socios->appendChild($pais_id);

  $rol_id = $xml->createElement('rol_id', $socio['rol_id']);
  $rol_id = $socios->appendChild($rol_id);

  $consumo = $xml->createElement('consumo', $socio['consumo']);
  $consumo = $socios->appendChild($consumo);

  $saldo = $xml->createElement('saldo', $socio['saldo']);
  $saldo = $socios->appendChild($saldo);

  $activo = $xml->createElement('activo', $socio['activo']);
  $activo = $socios->appendChild($activo);

  $date_add = $xml->createElement('date_add', $socio['date_add']);
  $date_add = $socios->appendChild($date_add);

  $xml->formatOutput = true;
  $el_xml = $xml->saveXML();
  $xml->save('socios.xml');
  //Mostramos el XML puro
  // echo "<p><b>El XML ha sido creado.... Mostrando en texto plano:</b></p>".
  // htmlentities($el_xml).";
  // <hr>";
}