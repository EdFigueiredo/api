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
   - Siga as instruções fornecidas anteriormente para importar as configurações da API usando os arquivos `insomnia_requests.json` e `insomnia_environment.json` do diretório `arquivosInstalacao`.

3. **Faça requisições à API:**
   - Após configurar o Insomnia, você pode começar a fazer requisições à API conforme descrito nas instruções anteriores.
   - Certifique-se de que o servidor PHP e o servidor MySQL estejam em execução enquanto você faz as requisições.

### Arquivo de Instalação do Banco de Dados

- O arquivo `query.sql` no diretório `arquivosInstalacao` contém o script SQL necessário para instalar o banco de dados com as tabelas de clientes e usuários, incluindo os campos necessários para o funcionamento completo da API.