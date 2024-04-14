const ListaPaises = []
const InputC = document.getElementById("country-input")
const ListDisplay = document.getElementById("name_list")
const List = document.getElementById("NameList")
let Lista = []
let ArrayPaises = []
const InputGroup = document.getElementById("input_group")
const Country1 = document.getElementById("SelectCountry1")
const Country2 = document.getElementById("SelectCountry2")
const SpinnerDiv = document.getElementById("spinner-div")
const CountryData = document.getElementById("country_data")



function Dorgas() {
    console.log("dorgas")
}
InputC.addEventListener("input", (event) => {
    let NovaLista = ArrayPaises.filter(country => country.toLowerCase().includes((event.target.value).toLowerCase()))
        .map(
            country => `<li value=${country} class='border'  onclick="selectItem(this)" key=${country}>${country}</li>`
        )
    List.innerHTML = NovaLista.join("")
})

InputC.addEventListener('blur', function () {
    setTimeout(() => {
        ListDisplay.classList.toggle("d-none")
    }, 100);
});

InputC.addEventListener('focus', function () {
    ListDisplay.classList.toggle("d-none")
});


const FillList = async () => {
    const Response = await GetCountryList()
    Lista = JSON.parse(Response)
    let keys = Object.keys(Lista)
    for (i of keys) {
        ArrayPaises.push(Lista[i])
    }
    LoadPaises = ArrayPaises.map(
        country => `<li value=${country} class='border'  onclick="selectItem(this)" key=${country}>${country}</li>`
    )
    List.innerHTML = LoadPaises.join("")
}

const changeInput = (event) => {
    if (event.key == 'Enter') {
        FillData()
    }
}

const FillData = () => {
    const input = InputC.value
    if (ArrayPaises.includes(capitalizeFirstLetter(input))) {
        if (Country1.innerText == "") {
            if (capitalizeFirstLetter(input) == Country2.innerText) {
                window.alert("Pais ja selecionado")
            }
            else { Country1.innerText = capitalizeFirstLetter(input) }
            InputC.value = ""
            InputC.dispatchEvent(new Event('input'))
            return;
        }
        if (Country2.innerText == "") {
            if (capitalizeFirstLetter(input) == Country1.innerText) {
                window.alert("Pais ja selecionado")
            }
            else { Country2.innerText = capitalizeFirstLetter(input) }
            InputC.value = ""
            InputC.dispatchEvent(new Event('input'))
        }
        else {
            window.alert("Limite alcançado")
            InputC.dispatchEvent(new Event('input'))
        }
    }
    else window.alert("Precisa ser um país")
    InputC.value = ""
    InputC.dispatchEvent(new Event('input'))
}
const selectItem = (item) => {
    InputC.value = item.innerText
    InputC.dispatchEvent(new Event('input'))
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

const clearCountry = (n) => {
    if (n == 1) Country1.innerText = ""
    if (n == 2) Country2.innerText = ""
}

const LoadData = async () => {
    if (Country1.innerText == "" || Country2.innerText == "") {
        window.alert("Selecione 2 paises")
        return;
    }
    CountryData.classList.toggle("d-none")
    SpinnerDiv.classList.toggle("d-none")
    try {
        const data1 = await DirectAcessCountry(Country1.innerText)
        const data2 = await DirectAcessCountry(Country2.innerText)
        GenerateData(JSON.parse(data1), JSON.parse(data2))
    }catch(error){
        window.alert("Erro ao conectar com a API")
    }
    SpinnerDiv.classList.toggle("d-none")
    CountryData.classList.toggle("d-none")
    clearCountry(1)
    clearCountry(2)
}

const GenerateData = (data1, data2) => {
    const keys1 = Object.keys(data1)
    const keys2 = Object.keys(data2)

    let pais1 = data1[0]["Pais"]
    let Mortes1 = 0
    let Confirmados1 = 0
    let Taxa1 = 0

    let pais2 = data2[0]["Pais"]
    let Mortes2 = 0
    let Confirmados2 = 0
    let Taxa2 = 0
    for (i of keys1) {
        Mortes1 += data1[i]["Mortos"]
        Confirmados1 += data1[i]["Confirmados"]
    }
    for (i of keys2) {
        Mortes2 += data2[i]["Mortos"]
        Confirmados2 += data2[i]["Confirmados"]
    }
    Taxa1 = (Mortes1 / Confirmados1).toFixed(3)
    Taxa2 = (Mortes2 / Confirmados2).toFixed(3)

    let output = `
        <div class='container-fluid'>
            <div class="row w-100 px-5">
                <div class='col-sm-4 ps-3 pb-2'>
                    <span class="border-bottom mb-5 fw-bold"}>País:</span>
                    <input  type="text" class="form-control w-auto mt-2" placeholder="${pais1}" disabled>
                    <span class="border-bottom mb-5 fw-bold"}>Mortes:</span>
                    <input  type="text" class="form-control w-auto mt-2" placeholder="${Mortes1}" disabled>
                    <span class="border-bottom mb-5 fw-bold"}>Confirmados:</span>
                    <input  type="text" class="form-control w-auto mt-2" placeholder="${Confirmados1}" disabled>
                    <span class="border-bottom mb-5 fw-bold"}>Taxa de morte:</span>
                    <input  type="text" class="form-control w-auto mt-2" placeholder="${Taxa1}" disabled>
                </div>
                <div class='col-sm-4 ms-auto'>
                    <span class="border-bottom mb-5 fw-bold"}>País:</span>
                    <input  type="text" class="form-control w-auto mt-2" placeholder="${pais2}" disabled>
                    <span class="border-bottom mb-5 fw-bold"}>Mortes:</span>
                    <input  type="text" class="form-control w-auto mt-2" placeholder="${Mortes2}" disabled>
                    <span class="border-bottom mb-5 fw-bold"}>Confirmados:</span>
                    <input  type="text" class="form-control w-auto mt-2" placeholder="${Confirmados2}" disabled>
                    <span class="border-bottom mb-5 fw-bold"}>Taxa de morte:</span>
                    <input  type="text" class="form-control w-auto mt-2" placeholder="${Taxa2}" disabled>
                </div>
            </div>
        </div>
        <div class="alert alert-info text-center" role="alert"> A diferença da taxa de mortes entre ${pais1} e ${pais2} é de ${(Taxa1 - Taxa2).toFixed(3)} </div>
    `
    CountryData.innerHTML = output
}
window.onload(FillList())