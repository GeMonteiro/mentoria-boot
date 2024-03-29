# SQL Injection
Este laboratório é vulnerável a ataques de SQL Injection. O foco é explorar essa vulnerabilidade e posteriormente implementar medidas corretivas.

## Aplicativo
O aplicativo consiste em uma página de login desenvolvida em PHP, onde os usuários podem inserir seu nome de usuário e senha para acessar uma área restrita. No entanto, o código PHP que processa o formulário de login é vulnerável a ataques de injeção de SQL.

`Docker Compose`
O arquivo docker-compose.yml é utilizado para iniciar a aplicação web junto com um banco de dados MySQL utilizando Docker Compose.

**1. Versão**

```
version: '3'
```
Define a versão do formato do arquivo docker-compose.yml. A versão 3 é a versão atualmente recomendada.

**2. Serviços**
A seção services define os serviços que serão executados no ambiente Docker Compose.

`web`:
Build: Instrui o Docker Compose a construir a imagem do serviço web a partir do Dockerfile localizado no diretório atual.
Ports: Mapeia a porta 80 do container para a porta 80 da máquina host, possibilitando acesso externo à aplicação web.
Volumes: Monta o diretório local ./site no diretório /var/www/html dentro do container, tornando o conteúdo do diretório local acessível à aplicação web.
Networks: Define que o serviço web deve participar da rede app-network.

`mysql`:
Image: Utiliza a imagem oficial do MySQL versão 5.7.
Environment: Define variáveis de ambiente para o container MySQL.
Ports: Mapeia a porta 3306 do container para a porta 3306 da máquina host, permitindo acesso externo ao banco de dados MySQL.
Volumes: Monta o diretório local ./data no diretório /var/lib/mysql dentro do container, persistindo os dados do banco de dados entre reinicializações do container.
Networks: Define que o serviço mysql deve participar da rede app-network.

**3. Redes**
A seção networks define as redes virtuais que os serviços podem utilizar para se comunicarem entre si.

`app-network`:
Driver: Define o driver da rede (bridge), que cria uma rede virtual conectada à rede física da máquina host.

**4. Como Iniciar a Aplicação**
Pré-requisitos: Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina.

Posicione o arquivo: Salve o conteúdo do docker-compose.yml no diretório do seu projeto.
Ajuste as Variáveis: Se necessário, modifique as variáveis de ambiente do serviço mysql de acordo com suas preferências.
Iniciar os Serviços: Abra um terminal no diretório do projeto e execute o seguinte comando:
```
docker-compose up -d
```
Este comando executa o Docker Compose e inicia os serviços definidos no arquivo docker-compose.yml. Os serviços serão executados em segundo plano (detached mode).

# Documentação da Aplicação

## Aplicação Vulnerável
A aplicação vulnerável consiste em uma página de login desenvolvida em PHP, onde os usuários podem inserir seu nome de usuário e senha para acessar uma área restrita.  
No entanto, o código PHP que processa o formulário de login é vulnerável a ataques de injeção de SQL.  
Isso significa que um invasor pode manipular os campos de entrada para inserir instruções SQL maliciosas, comprometendo a integridade do banco de dados e potencialmente obtendo acesso não autorizado à aplicação.

## Aplicação Bind
A aplicação Bind é uma versão segura da aplicação vulnerável. Ela utiliza boas práticas de segurança, como a preparação de consultas SQL parametrizadas para mitigar os riscos de injeção de SQL.  
As consultas parametrizadas garantem que os dados de entrada fornecidos pelos usuários sejam tratados de forma segura e não interpretados como comandos SQL maliciosos.

## Aplicação Segura
A aplicação segura é uma versão ainda mais robusta da aplicação Bind, que implementa medidas adicionais de segurança, como validação de entrada e autenticação multifator.  
Essas camadas extras de segurança garantem que apenas usuários autorizados possam acessar a aplicação e que os dados fornecidos sejam devidamente validados antes de serem processados pelo sistema.
