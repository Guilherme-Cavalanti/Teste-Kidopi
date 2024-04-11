const SpinnerDiv = document.getElementById("spinner-div")
const CountryData = document.getElementById("country_data")

//CARREGAR OS DADOS DE SELECIONAR PAÍS
const LoadData = async () => {
    const country = document.getElementById("pais_acesso").value
    CountryData.classList.toggle("d-none")
    SpinnerDiv.classList.toggle("d-none")
    let dataCountry = await AcessCountry(country)
    dataCountry = FixString(dataCountry)
    //CountryData.innerHTML = dataCountry
    SpinnerDiv.classList.toggle("d-none")
    CountryData.classList.toggle("d-none")
    const ObjectData = JSON.parse(dataCountry)
    GenerateTable(ObjectData)
}

//ARRUMAR DATA Q VEM DO BACKEND
const FixString = (string) => {
    let split = string.split("")
    split[42] = ""
    split[split.length-2] = ""
    split = split.map(c => {
        if(c=="\\") c= ""
        return c;
    })
    return split.join("")
}

//GERAR TABELA DOS DADOS DE CADA PAÍS
const GenerateTable = (dataC) => {
    const {data} = dataC
    const {message} = dataC
    let keys = Object.keys(data)
    const TBody = []
    let SomaConfirmados = 0
    let SomaMortes = 0
    for(i of keys){
        TBody.push("<tr>")
        SomaConfirmados += +data[i]["Confirmados"]
        SomaMortes += +data[i]["Mortos"]
        TBody.push(`
        <td> ${data[i]["ProvinciaEstado"]} </td>
        <td> ${data[i]["Confirmados"]} </td>
        <td> ${data[i]["Mortos"]} </td>
        `)
        TBody.push("</tr>")
    }
    const table = `
        <p class="fw-bold">País ${data[0]["Pais"]}</p>
        <div class="table-div mb-3">
            <table class='table table-hover table-bordered'>
                <thead>
                    <tr>
                        <th scope="col">Provincia/Estado</th>
                        
                        <th scope="col">Confirmados</th>
                        <th scope="col">Mortos</th>
                    </tr>
                </thead>
                <tbody>
                    ${TBody.join("")}
                    <td> <b>Total </b> </td>
                    <td> ${SomaConfirmados} </td>
                    <td> ${SomaMortes} </td>
                </tbody>
            </table>
        </div>
        <div class="alert alert-primary" role="alert"> Server Response: ${message}</div>       
    `
    CountryData.innerHTML = table
}

const InfoMessage = document.getElementById("last-message")
const InfoId = document.getElementById("id")
const InfoData = document.getElementById("data")
const InfoHora = document.getElementById("hora")
const InfoPais = document.getElementById("pais")

const UpdateLastAccess = async () => {
    const Response = await GetLastAccess()
    const Info = JSON.parse(Response)
    const {data} = Info
    InfoMessage.innerHTML = Info["message"]
    InfoId.innerHTML = data["id"]
    InfoData.innerHTML = data["data"]
    InfoHora.innerHTML = data["hora"]
    InfoPais.innerHTML = data["pais"]
}

window.onload(UpdateLastAccess())
