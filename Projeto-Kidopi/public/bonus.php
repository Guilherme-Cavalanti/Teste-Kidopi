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
    <link rel="stylesheet" href="./css/bonus.css">
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous">
        
    </script>
    <title>Bonus Page</title>
    <script src="./js/fetch.js">
    </script>
</head>
<body>
    <div class="container-fluid d-flex p-0">
        <div class="content container col-sm-12 col-lg-8  col-xl-6 d-block p-0 ps-5 position-relative">
            <div class="text-center mb-3">
                <h1 class="ml-auto">Exercício CovidAPI - Parte Bônus</h1>
            </div>
            <div class="container-fluid d-flex p-0 col-sm-12">
                <div class="row w-100 m-0">
                    <div class="col-xs-5 col-sm-3 mb-3 p-0  position-relative id='input_group'">
                        <input 
                            type="text" class="form-control" aria-label="Sizing example input" id="country-input"
                            aria-describedby="inputGroup-sizing-default" placeholder="Digite o nome do país"
                            onkeydown="changeInput(event)"
                        >
                        <div class="container name_list p-0 d-none position-absolute" id="name_list"> 
                            <ul id="NameList">
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-5 col-sm-1 mb-3 p-0  position-relative ps-1">
                        <button onclick="FillData()" class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                            </svg>
                        </button>
                    </div>
                    <div class="col-xs-5 col-sm-3 mb-3 p-0  position-relative ps-4">
                        <div class="border w-100 h-100 ps-2 d-flex">
                            <span id="SelectCountry1" class="pt-2 fw-bold"></span>
                            <button class="ms-auto btn btn-light" onclick="clearCountry(1)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-xs-5 col-sm-3 mb-3 p-0  position-relative ps-2">
                        <div class="border w-100 h-100 ps-2 d-flex">
                            <span id="SelectCountry2" class="pt-2 fw-bold"></span>
                            <button class="ms-auto btn btn-light" onclick="clearCountry(2)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-2 mb-2 ms-auto p-0 ps-2">
                        <button onclick="LoadData()"  class="btn btn-primary w-100">Buscar</button>
                    </div>
                </div>
            </div>
            <div id="country_area" class="position-relative container ps-0"> 
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
            <a href="main.php">Página Principal </a>
        </div>
    </div>
    <script src="./js/bonus.js"> </script>
</body>
</html>