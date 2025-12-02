# README — Passo a passo

Abaixo está um guia prático para subir o projeto online-library com Laravel + Docker + PostgreSQL.


1- O Projeto estará em um arquivo .zip, de acordo com as instruções repassadas anteriormente. Ao descompactar, rode:
<pre>
    docker compose up -d --build
</pre>

2- Para instalar as dependencias do composer dentro do container, execute:
<pre>
    docker compose exec app composer install
</pre>

3- Para criação do banco, execução das migrations e seed, execute:
<pre>
    docker compose exec app php artisan migrate
    docker compose exec app php artisan db:seed
</pre>

A aplicação estará disponível na porta:
<pre>
    http://localhost:8000
</pre>

* obsevação: deixarei um arquivo .env pronto, mas caso ele não estiver em seu diretório, crie o arquivo com e copie o conteúdo do
.env.example para ele.

Se tiver alguma dúvida, entre em contato.