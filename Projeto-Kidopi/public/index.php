<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link   
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"
    >
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous">
        
    </script>
    <title>Main Page</title>
    <script src="./js/fetch.js">
    </script>
</head>
<body>
    <div class="container-fluid d-flex p-0">
        <div class="content container col-sm-12 col-lg-8  col-xl-6 d-block p-0 ps-5">
            <div class="text-center mb-3">
                <h1 class="ml-auto">Exercício CovidAPI </h1>
            </div>
            <div class="container d-flex p-0 col-sm-12">
                <div class="row w-100 justify-space-between d-flex m-0">
                    <div class="col-xs-7 col-sm-7 mb-3 p-0">
                        <select id="pais_acesso" class="form-select w-100"> 
                            <option> Brazil </option>
                            <option> Canada </option>
                            <option> Australia </option>
                        </select>
                    </div>
                    <div class="col-xs-6 col-sm-2 mb-3 ms-auto p-0">
                        <button onclick="LoadData()"  class="btn btn-primary w-100">Buscar</button>
                    </div>
                </div>
            </div>
            <div id="country_area"> 
                <div id="country_data">
                    <div class="card">
                        <div class="card-body">
                            Aqui ficam as informações obtidas no acesso a API
                        </div>
                        </div>
                    <div class="espaco"> &nbsp; </div>
                </div>
                <div class="d-flex justify-content-center loading">
                    <div class="spinner-border d-none" role="status" id="spinner-div">
                        <span class="visually-hidden">Loading...</span>
                        &nbsp;
                    </div>
                </div>
            </div>
            <a href="/public/bonus.php">Página Bônus </a>
            <div class="container-fluid p-0">
                <div class="row w-100">
                    <div class="col-xs-6 col-sm-11 mb-3">
                        <h3> Último acesso:</h3>    
                    </div>
                    <div class="col-xs-6 col-sm-1 mb-3">
                        <button onclick="UpdateLastAccess()" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                            </svg>
                        </button>   
                    </div>
                </div>
            </div>
            <div id="info" class="border container-fluid p-0 mb-5"> 
                <div class="row  border-bottom w-100 m-0 p-0">
                   <span class="p-0">Server Response: <span class="text-primary p-0" id="last-message"> </span> </span>
                </div>
                <span>
                    <b>Id: </b> <span id="id" class="me-5">123 </span>
                    <b>Data: </b> <span id="data" class="me-5">Lopo </span>
                    <b>Hora: </b> <span id="hora" class="me-5">Caka </span>
                    <b>País: </b> <span id="pais">Bara </span>
            </span>
            </div>
        </div>
    </div>
    <script src="./js/index.js"> </script>
</body>
</html>