### Backend

O backend ta na pasta **src**, é só o arquivo **connect.php**, ajustar as variáveis **$mysql_user** e **$mysql_password** nas duas primeiras linhas, os códigos para a criação do database tão na pasta **sql**.

### Frontend

O frontend ta na pasta **public**, são os arquivos **index.php** e **bonus.php**. 

O **index.php** é a aplicação principal onde você escolhe 3 países e visualiza os dados recebidos da API, além de ter comunicação com o database e mostrar o último acesso que pode ser atualizado em tempo real.

O **bonus.php** é a página bônus, nela você escolhe 2 paises disponibilizados na API e compara a taxa de morte de ambos.


### Inicializando

Se estiver tudo configurado, é só rodar o comando **php -S localhost:3000** nesse diretório e abrir a porta 3000 no localhost, ou configurar o Apache para hospedar esse diretório. Abrir o endereço na pasta **public**, vai abrir o **index.php**, se não, navegue até **/public/index.php** no endereço onde o projeto ta hospedado.