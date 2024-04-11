const GetLastAccess = async () => {
    const response = await fetch("../src/connect.php");
    const texto = await response.text()
    return texto
}
const AcessCountry = async (country) => {
    const response = await fetch(`../src/connect.php?country=${country}`);
    const texto = await response.text()
    return texto
}

const GetCountryList = async () => {
    const response = await fetch("https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1")
    const texto = await response.text()
    return texto
}

const DirectAcessCountry = async (country) => {
    const response = await fetch(`https://dev.kidopilabs.com.br/exercicio/covid.php?pais=${country}`)
    const texto = await response.text()
    return texto
}
