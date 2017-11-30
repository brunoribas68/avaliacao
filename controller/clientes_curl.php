<?php
    /** Verifica se foi solicitado requisição POST */
    if($_POST){
        $nome = $_POST['nome'];


        $ch = curl_init(); 

        curl_setopt($ch, CURLOPT_URL, "http://localhost/avaliacao/controller/clientes_db.php?name=".$nome);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=".$nome);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        echo $result;
        exit;
    }

?>