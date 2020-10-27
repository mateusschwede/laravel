<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/* Migrations:
Comandos de gestão de BD de dentro do Laravel, usando php
> Up: Comando de envio ao BD (ex: Create table)
> Down: Exatamente o contrário de Up, comando de retorno/desfazer ao BD (ex: Drop table). Down é o método, criado automaticamente, contrário ao criado no Up
Importante que as Migrations sejam criadas em ordem, de acordo com o BD, com relação às tables dependentes. Migrations são executadas em ordem crescente por criação.

Criar Migration:
Comando, no diretório do projeto, via terminal.
Criar nova table(Create Table):
php artisan make:migration comando_nomeTable_table(ex: create_users_table) --create=nomeTable(sintaxe de criação(create) à table nomeTable)

Adicionar novo campo à table existente(Alter Table):
php artisan make:migration comando_nomeTable_table --table=nomeTable

Criar BD após criadas as Migrations:
php artisan migrate (executa todos os arquivos de migrate criados pendentes)

Desfazer criação no BD:
php artisan migrate:rollback (desfaz todas as alterações no BD)
php artisan migrate:rollback --step=2 (No caso, desfazer os últimos 2 passos, ex: desfazer as últimas 2 migrations criadas no BD)

No final, em ambiente empresarial, faço commit de tudo, e a pessoa que trabalhará com o prjeto somente executa o 'php artisan migrate', e todo o BD será gerado/atualizado automaticamente
*/

class CreateCategoriesTable extends Migration {

    public function up() {
        //Esquema de create table 'categories'
        Schema::create('categories', function (Blueprint $table) {
            //Campos da Table
            $table->id(); //Id da table(bigint(20) auto_increment PK)
            $table->string('title'); //Campo string(varchar) chamado 'title'
            $table->string('slug'); //Tipo um 'title' no padrão de url(sem acentuação e espaços...)
            $table->text('description')->nullable(); //Campo text(text) possui maior volume do que varchar. Nullable aceita null. unique() para campos únicos, autoincrement(), default($value)...
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('categories');
    }
}