const GetLastAccess = async () => {
    const response = await fetch("../src/connect.php");
    console.log(response)
    const texto = await response.text()
    return texto
}
const AcessCountry = async (country) => {
    //const country = document.getElementById("pais_acesso").value
    const response = await fetch(`../src/connect.php?country=${country}`);
    const texto = await response.text()
    return texto
}