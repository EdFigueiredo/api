API
Este é o repositório oficial da API.

Descrição
A API fornece endpoints para manipulação de usuários e clientes. Este README contém instruções sobre como baixar e configurar o Insomnia para fazer requisições aos diferentes endpoints da API.

Configurando o Insomnia
Baixando o Insomnia:
Baixe e instale o Insomnia a partir do site oficial.
Importando as configurações da API:
Abra o Insomnia.
Clique em "Insomnia" no canto superior esquerdo.
Selecione "Preferences".
Na guia "Data", clique em "Import Data" e depois em "From File".
Navegue até o diretório onde você baixou o repositório da API.
Selecione o arquivo insomnia_requests.json.
Clique em "Import".
Configurando as variáveis de ambiente:
No Insomnia, clique no ícone de engrenagem para abrir as configurações.
Selecione "Manage Environments".
Clique em "Import".
Selecione o arquivo insomnia_environment.json.
Clique em "Import".
Agora você está pronto para começar a fazer requisições à API!

Fazendo Requisições
Autenticação:
Se você ainda não possui um usuário, primeiro deve se cadastrar usando o endpoint /usuarios/cadastrar.
Selecione a requisição /usuarios/cadastrar.
Insira os detalhes do usuário no corpo da requisição (por exemplo, login e senha).
Envie a requisição.
Após o cadastro, faça login para obter um token de acesso usando o endpoint /usuarios/login.
Selecione a requisição /usuarios/login.
Insira as credenciais do usuário no corpo da requisição (por exemplo, login e senha).
Envie a requisição.
Copie o token gerado na resposta.
Configurando o Header Authorization:
Com o token de acesso copiado, abra qualquer outra requisição que você queira fazer à API.
Clique na aba "Headers" na parte inferior da requisição.
Adicione um novo header com a chave "Authorization" e o valor "Bearer [TOKEN]", substituindo [TOKEN] pelo token que você copiou.
Endpoints Disponíveis:
/usuarios/login (POST): Endpoint para autenticar um usuário e obter um token de acesso.
/usuarios/cadastrar (POST): Endpoint para cadastrar um novo usuário.
/clientes/listar (GET): Endpoint para listar todos os clientes.
/clientes/listar/{id} (GET): Endpoint para listar um cliente específico pelo ID.
/clientes/adiciona (POST): Endpoint para adicionar um novo cliente.
/clientes/atualizar/{id} (PUT): Endpoint para atualizar um cliente existente pelo ID.
/clientes/deletar/{id} (DELETE): Endpoint para deletar um cliente existente pelo ID.
Consulte a documentação da API para obter detalhes sobre os parâmetros necessários e as respostas esperadas para cada endpoint.
