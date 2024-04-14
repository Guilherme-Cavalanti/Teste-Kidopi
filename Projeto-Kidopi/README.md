### Backend

O backend ta na pasta **src**, é só o arquivo **connect.php**, ajustar as variáveis **$mysql_user** e **$mysql_password** nas duas primeiras linhas, os códigos para a criação do database tão na pasta **sql**.

### Frontend

O frontend ta na pasta **public**, são os arquivos **main.php** e **bonus.php**. 

O **main.php** é a aplicação principal onde você escolhe 3 países e visualiza os dados recebidos da API, além de ter comunicação com o database e mostrar o último acesso que pode ser atualizado em tempo real.

O **bonus.php** é a página bônus, nela você escolhe 2 paises disponibilizados na API e compara a taxa de morte de ambos.

O **index.php** serve pra redirecionar para o */public/main.php* se abrir o servidor no diretório raiz.

### Inicializando

Se estiver tudo configurado, é só rodar o comando **php -S localhost:3000** nesse diretório e abrir a porta 3000 no localhost, ou configurar o Apache para hospedar esse diretório. Acessar o endereço,  vai abrir o **index.php** que vai redirecionar para **/public** que deve abrir a página princiapl, se não, navegue até **/public/main.php** no endereço onde o projeto ta hospedado.