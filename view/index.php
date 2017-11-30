<?php

require_once  '../model/clientes_db.php';

$mostra = new Conexao;
$result = $mostra->selectClientes('Bruno');
echo $result;
/*foreach($result as $linha){
	echo $linha['telefone'];
}*/


?>