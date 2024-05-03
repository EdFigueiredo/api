### Instalação do PHP e MySQL

1. **PHP:**
   - Baixe e instale o PHP a partir do [site oficial do PHP](https://www.php.net/downloads).
   - Siga as instruções específicas para o seu sistema operacional (Windows, macOS, Linux).
   - Após a instalação, verifique se o PHP foi instalado corretamente executando `php -v` no terminal ou prompt de comando.

2. **MySQL:**
   - Baixe e instale o MySQL a partir do [site oficial do MySQL Community Server](https://dev.mysql.com/downloads/mysql/).
   - Siga as instruções específicas para o seu sistema operacional.
   - Durante a instalação, defina uma senha para o usuário root do MySQL.
   - Após a instalação, inicie o servidor MySQL e verifique se está em execução.

### Configuração do Servidor Web (Apache ou Nginx)

1. **Apache:**
   - Se você estiver usando o Apache, verifique se o módulo PHP está habilitado no arquivo de configuração do Apache.
   - Para Linux, o arquivo de configuração geralmente está localizado em `/etc/apache2/apache2.conf` ou `/etc/httpd/httpd.conf`.
   - Para Windows, geralmente está em `C:\xampp\apache\conf\httpd.conf` se você estiver usando XAMPP.
   - Certifique-se de que o diretório raiz do seu servidor web esteja configurado corretamente para servir arquivos PHP.

2. **Nginx:**
   - Se você estiver usando o Nginx, configure-o para trabalhar com PHP instalando o pacote `php-fpm`.
   - Siga as instruções específicas para o seu sistema operacional para instalar o `php-fpm` e configurar o Nginx para usá-lo.

### Importação do Banco de Dados

1. **HeidiSQL (ou outra ferramenta de gerenciamento de banco de dados):**
   - Baixe e instale o HeidiSQL a partir do [site oficial](https://www.heidisql.com/download.php).
   - Abra o HeidiSQL e conecte-se ao servidor MySQL local usando o nome de usuário e senha que você configurou durante a instalação.
   - Crie um novo banco de dados chamado `api`.
   - Abra o arquivo SQL fornecido no diretório `arquivosInstalacao`.
   - Execute o script SQL para criar o banco de dados, as tabelas e inserir os dados de exemplo.

### Configuração do Insomnia e Teste da API

1. **Baixe e instale o Insomnia:**
   - Baixe e instale o Insomnia a partir do [site oficial](https://insomnia.rest/download).
   - Após a instalação, abra o Insomnia.

2. **Importe as configurações da API:**
   - Siga as instruções fornecidas anteriormente para importar as configurações da API usando os arquivos `insomnia_requests.json` do diretório `arquivosInstalacao`.

### Extensão "REST Client" para Visual Studio Code

A extensão "REST Client" para o Visual Studio Code é uma ferramenta poderosa que permite fazer requisições HTTP diretamente do seu editor de código. Abaixo estão algumas instruções sobre como instalar e usar essa extensão:

## Instalação da Extensão

1. Abra o Visual Studio Code.
2. Na barra lateral esquerda, clique no ícone de extensões (ou pressione Ctrl+Shift+X).
3. No campo de pesquisa, digite "REST Client".
4. A extensão "REST Client" deve aparecer nos resultados. Clique no botão "Instalar".

## Como Usar

1. Arquivo com a extensão `.http` no repositório do projeto.
2. Dentro deste arquivo, temos algumas das requisições HTTP usando uma sintaxe simples e amigável.
3. As requisições podem ser organizadas em blocos, cada um começando com um comentário indicando o método HTTP e o endpoint da requisição.
4. Você pode adicionar parâmetros, headers, corpo da requisição e até mesmo variáveis.
5. Para enviar uma requisição, coloque o cursor na linha da requisição e pressione Ctrl+Alt+R.

![image](https://github.com/EdFigueiredo/api/assets/86436713/7780296b-d578-43b0-b7e7-8824b35b64e7)


### Arquivo de Instalação do Banco de Dados

- O arquivo `query.sql` no diretório `arquivosInstalacao` contém o script SQL necessário para instalar o banco de dados com as tabelas de clientes e usuários, incluindo os campos necessários para o funcionamento completo da API.

## Agora você está pronto para começar a fazer requisições à API!

#### Fazendo Requisições

**Autenticação:**
1. Se você ainda não possui um usuário, primeiro deve se cadastrar usando o endpoint `/usuarios/cadastrar`.
   - Selecione a requisição `/usuarios/cadastrar`.
   - Insira os detalhes do usuário no corpo da requisição (por exemplo, login e senha).
   - Envie a requisição.

2. Após o cadastro, faça login para obter um token de acesso usando o endpoint `/usuarios/login`.
   - Selecione a requisição `/usuarios/login`.
   - Insira as credenciais do usuário no corpo da requisição (por exemplo, login e senha).
   - Envie a requisição.
   - Copie o token gerado na resposta.

**Configurando o Header Authorization:**
- Com o token de acesso copiado, abra qualquer outra requisição que você queira fazer à API.
- Clique na aba "Headers" na parte inferior da requisição.
- Adicione um novo header com a chave "Authorization" e o valor "Bearer [TOKEN]", substituindo `[TOKEN]` pelo token que você copiou.

#### Endpoints Disponíveis:
- `/usuarios/login` (POST): Endpoint para autenticar um usuário e obter um token de acesso.
- `/usuarios/cadastrar` (POST): Endpoint para cadastrar um novo usuário.
- `/clientes/listar` (GET): Endpoint para listar todos os clientes.
- `/clientes/listar/{id}` (GET): Endpoint para listar um cliente específico pelo ID.
- `/clientes/adiciona` (POST): Endpoint para adicionar um novo cliente.
- `/clientes/atualizar/{id}` (PUT): Endpoint para atualizar um cliente existente pelo ID.
- `/clientes/deletar/{id}` (DELETE): Endpoint para deletar um cliente existente pelo ID.

**Classe JWT**
Autor: Neuman Vong neuman@twilio.com

Descrição
Esta é uma implementação mínima de JSON Web Token (JWT) usada pela autenticação em tempo real, com base na especificação encontrada neste documento: http://self-issued.info/docs/draft-jones-json-web-token-01.html. 

A classe JWT fornece métodos para codificar e decodificar JWTs.
Dentro desse reamde informar que o arquivo para a instalção do banco com as tabelas clientes e usuarios com os campos necessários para a execução do CRUD da API
