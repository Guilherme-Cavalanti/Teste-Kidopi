<?php 
    $mysql_user = "root";
    $mysql_password = "123456";
    $country = null;
    if(isset($_GET['country'])) {
        $country = $_GET['country'];
    }
    $serverResponse = [];
    try{
        $conn = new mysqli('localhost', $mysql_user, $mysql_password, 'Projeto_Kidopi');
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        $serverResponse["message"]="Conexao bem-sucedida!";
        if($country === null){
            $sqlGet = "SELECT * FROM acessos ORDER BY data DESC, hora DESC LIMIT 1;";
            $queryGet = mysqli_query($conn, $sqlGet);
            $queryData = [];
            while ($row = mysqli_fetch_assoc($queryGet)) {
                // Exibir os valores de cada coluna
                foreach ($row as $key => $value) {
                    $queryData["$key"]="$value";
                };
            }
            $serverResponse["data"] = $queryData;
        }
        else {
            $response = file_get_contents("https://dev.kidopilabs.com.br/exercicio/covid.php?pais=".$country);
            if($response == "") {
                $serverResponse["message"]="Erro";
            }
            else if($response == "{}") {
                $serverResponse["message"] = "Pais Invalido";
            }
            else {
                date_default_timezone_set('America/Sao_Paulo');
                //Obter data atual no formato 'Y-m-d' (Ano-Mês-Dia)
                $dataAtual = date('Y-m-d');
                //Obter hora atual no formato 'H:i:s' (Hora:Minuto:Segundo)
                $horaAtual = date('H:i:s');
                
                $sqlPost = "INSERT INTO acessos (data,hora,pais) VALUES ('" . $dataAtual. "','". $horaAtual . "','" .$country . "');"; 
                $queryPost = mysqli_query($conn, $sqlPost); 
                $serverResponse["data"] = $response;
            }
            $serverResponse["data"] = $response;
        }
        mysqli_close($conn);
    }catch (Exception $e) {
        $error = $e->getMessage();
        $serverResponse["message"]="Erro de Conexao";
        $serverResponse["error"] = "$error";
    }
    echo json_encode($serverResponse, JSON_UNESCAPED_UNICODE);
    //echo"</div>"
?>