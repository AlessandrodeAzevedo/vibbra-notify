## Vibbra Notify

Para este projeto utilizei o framework cakephp por ter mais afinidade com ele, decidi não usar um framework front-end devido o tempo para entrega ser muito curto, para o servidor utilizei o nginx mais nada impede de utilizar o apache caso seja a necessidade
## Instalação

Para a instalação é necessário o php 7.2 ou superior estável, para realizar o projeto utilizei o 7.4 que vem por padrão no sistema operacional ubuntu 20.04 porém o sistema também foi testado no ubuntu 18.04 e php 7.2.

Para o banco utilizei o Mysql(MariaDB 10.3) que é largamente utilizado neste tipo de projeto também.

Para funcionar é necessário a instalação de algumas bibliotecas do php:

*Utilizado pelo Cakephp*

- intl
- mbstring

*Utilizado para rodar os testes unitários*

sudo apt install php-sqlite3 -y

Também será necessário rodar o composer na raiz do projeto
```
$ composer install --ignore-platform-reqs
```

Após a instalação do composer na raiz do projeto precisamos rodar os migrations para assim serem criadas as tabelas com o banco de dados

```
$ bin/cake migrations migrate
```

Para funcionar o php é necessário a instalação do [WkHtmlToPdf](https://wkhtmltopdf.org/downloads.html), a instalação é bem simples e sua utilização é bem comum

Se tudo der certo o sistema estará pronto para uso nesse ponto

**Caso utilize o nginx acrescentei na raiz do projeto um arquivo de configuração default, nele é só alterar o root e o server se necessário**

###Observações

####Instalação via Vagrant

Existe um Vagrantfile que gera todo o sistema operacional e as instalações de banco, php e biblioteca para o pdf, restando apenas rodar o comando do composer e os migrations

*Caso você utilize docker provavelmente vai precisar alterar algumas configurações da sua máquina*

Você pode acessar o servidor gerado pelo vagrant através do comando

```
$ vagrant ssh
```

####Arquivo Bootstrap

Existe também na raiz do projeto um arquivo bootstrap.sh que é utilizado na instalação do Vagrantfile porém é um arquivo .sh comum e pode ser utilizado como referência ou executado em qualquer maquina linux (inclusive no docker)



