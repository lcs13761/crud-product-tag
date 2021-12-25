#product tag com docker

A aplicação foi desenvolvida em php puro, usando alguns plugin é template do bootstrap.

### Configuração
<div>
Modifique o volume:
<p> - "adicione o caminho do arquivo:/var/www/html/" </p>
</div>
<div>
<p> Modifique as configurações do banco de dados, no arquivo source/boot/config.php e no próprio docker-compose</p>
</div>
<div>
Após modificar os arquivos, é necessario a criação das tabelas no banco de dados, o arquivo bd.sql,
possui as tabelas do projeto.
</div>

### Utilidade

<div> A aplição possui um sistema de login, para pode acessar o dashboard, é necessario registar um usuario.</div>


## Dashboard 

<div> Possui os relatorios relacionados a ultilização das tags para cada produto</div>

## Produtos

<div> lista todos os produtos , com as tags , com a opção de editar o produto e excluir</div>

## tags

<div> lista todas as tags , com a opção de editar a tag e excluir</div>
