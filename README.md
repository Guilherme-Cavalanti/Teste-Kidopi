## Requisitos
* MySQL ou MariaDB
* PHP
* Apache

## Banco de Dados

O banco de dados precisa ser MySQL ou MariaDB (Ambos são compativeis com o código), ele precisa estar ligado na porta **3306** (porta padrão).

Ele precisa ter um database chamado **Projeto_Kidopi** e uma tabela nesse database chamada **Acessos**, com os atributos *id*, *data*, *hora* e (pais). Os scripts para criar
o database estão dentro da pasta **src** do projeto, em **/src/sql/create.sql**. 

Não da pra rodar todos de uma vez, primeiro cria o database, depois roda o **USE Projeto_Kidopi** e 
depois cria a tabela, tem 3 inserções teste no arquivo que servem pra saber se ta rodando corretamente o database. Com ele ligado na porta **3306**, já está pronto para a aplicação.

## Backend

O backend precisa ser configurado conforme está no seu computador, ele está dentro da pasta **src** do projeto, é o arquivo **connect.php** as duas primeiras linhas
do código são o que precisa ser modificado, é o *user* e a *password* que você quer estiver usando no seu banco de dados MySQL ou MariaDB. 

Basicamente só alterar os valores de **$mysql_user** para o seu usuário (está como *"root"*) e de **$mysql_password** para a sua senha (está como *"123456"*), de onde está guardados o database criado anteriormente. O servidor tem que estar ligado na porta **3306** (padrão do MySQL) e precisa ter criado o database **Projeto_Kidopi**, se estiver tudo configurado corretamente a conexão será estabelecida com sucesso.

## Servidor

### Apache
O servidor que rodará a aplicação precisa usar o diretorio raiz do projeto, que é a pasta **Projeto-Kidopi**, se for usar o Apache colocar esse diretorio no arquivo de configuração,
o arquivo raiz do seu Apache. Se estiver usando o XAMPP, localize dentro da pasta do XAMPP, o diretorio **htdocs**, esse é o diretorio raiz, só copiar e colar a pasta *Projeto-Kidopi* nele,
inicializar o servidor e navegar até *Projeto-Kidopi*.

Depois que configurar o Apache para hospedar o Projeto-Kidopi, é só abrir o endereço contendo o projeto e navegar até o diretorio **/public**, dai vai abrir o *index.php* direto.

### Servidor PHP
Dependendo da versão do PHP que estiver rodando, da pra ligar um servidor nativo do php, navegue no terminal até o diretorio **Projeto-Kidopi**, e insira o comando:
```
    php -S localhost:3000
```

Isso criará um servidor na porta 3000 (se quiser mudar é só alterar o número depois dos dois pontos), dai é só acessar nesse endereço a pasta **Public**, vai abrir o index.php normalmente.

