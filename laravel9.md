# Novidades Laravel 9
> Essas e outras novidades no [site oficial do Laravel](https://laravel.com/docs/master/releases) e no site [UB Social](https://ubsocial.github.io)

## Recursos
- Requer Php 8.1 ou superior (8 para funcionalidades principais, superior para funcionalidades específicas). Com isso, houve-se inclusão de funções String como str_contains(), str_starts_with() e str_ends_with()
- Utilização da library Symfony Mailer no lugar do Swift Mailer para emissões de emails
- Atualização do sistema de gerenciamento de arquivos, Flysystem 3.x
- Adesão à banco de dados Scout (Propriedade Scout) para pequenas/médias bases de dados de cargas de trabalho, com cláusulas 'where like' e índices fullText, ao invés de serviços dedicados, como Algolia ou MeiliSearch
- Laravel Breeze recebeu novo modo de scaffolding 'API' e implementação front-end no Next.js, para que possam ser utilizados em aplicações back-end e API autenticada via Laravel Sanctum para front-end JavaScript
- Pagina de depuração de exceção de código fora redesenhada e com temas personalizados (Light/Dark)
- Saída CLI do route:list fora redesenhada e melhor organizada
- Comando 'php artisan test --coverage --min=80.3' para explorar quantidade de cobertura de código aos testes realizados, com min para limitação de tempo, via Xdebug
- Aprimoramento da documentação do servidor web socket Soketi, parceiro do Laravel, compatível com Laravel e escrito com Node.js
- Suporte aprimorado para Collections IDE, adiciona definições genéricas aprimoradas às collections, aprimorando para IDEs e editores de código, com suporte à análise e estatística
- Arquivo 'server.php' removido, fora incluso dentro do próprio framework, podendo somente ser usado com 'php artisan serve'
- Proteção contra falhas em filas em jobs com 'php artisan queue:flush', como 'php artisan queue:flush --hours=24'
- Tempo limite padrão, em segundos, nas requisições do Guzzle HTTP para timeout como 'Http::timeout(60)->get(...);'
- Inclusão da propriedade 'sticky', no arquivo de configuração do BD, para proteção de escrita / gravação em base de dados, em casos de replicação de dados

## Definir acessores e mutadores do Eloquent
Anteriormente, a maneira de realizar trabalhos com gets e sets ocorria no seguinte formato
~~~php
public function getNameAttribute($value) {
    return strtoupper($value);
}

public function setNameAttribute($value) {
    $this->attributes['name'] = $value;
}
~~~

Agora, a maneira fora simplificada
~~~php
use Illuminate\Database\Eloquent\Casts\Attribute;

public function name(): Attribute {
    return new Attribute(
        get: fn ($value) => strtoupper($value),
        set: fn ($value) => $value,
    );
}
~~~

Além disso, pode-se armazenar, em cache, os valores de objeto que são retornados pelo atributo, assim como classes de conversão
~~~php
use App\Support\Endereco;
use Illuminate\Database\Eloquent\Casts\Attribute;

public function endereco(): Attribute {
    return new Attribute(
        get: fn ($value, $attributes) => new endereco(
            $attributes['endereco_linha_um'],
            $attributes['endereco_linha_dois'],
        ),
        set: fn (Endereco $value) => [
            'endereco_linha_um' => $value->linhaUm,
            'endereco_linha_dois' => $value->linhaDois,
        ],
    );
}
~~~

## Conversão de valores de atributos para Enums
~~~php
use App\Enums\ServerStatus;
/**
 * The attributes that should be cast.
 *
 * @var array
 */
protected $casts = [
    'status' => ServerStatus::class,
];
~~~

Para finalizar a conversão, basta interagir com o mesmo
~~~php
if ($server->status == ServerStatus::provisioned) {
    $server->status = ServerStatus::ready;
    $server->save();
}
~~~

## Enum em definição de rota
Pode-se informar Enum em definição de rota, onde o Laravel o invocará somente no caso de valor válido no URI. Caso contrário, retornará erro 404. Dado o seguinte Enum
~~~php
enum Categoria: string {
    case Frutas = 'frutas';
    case Pessoas = 'pessoas';
}
~~~

Se o segmento da rota Categoria for frutas ou pessoas, a rota será invocada. Caso contrário, retornará erro 404
~~~php
Route::get('/categorias/{categoria}', function(Categoria $categoria) {
    return $categoria->value;
});
~~~

## Associação de escopo ou agrupamento de rotas
Anteriormente, podia-se definir escopos Eloquent aninhados/filhos de outro anterior na definição de rota
~~~php
use App\Models\Post;
use App\Models\User;
Route::get('/users/{user}/posts/{post:slug}', function(User $user, Post $post) {
    return $post;
});
~~~

Agora, pode-se definir as ligações filhas mesmo sem chave de ligação, via método scopeBindings
~~~php
use App\Models\Post;
use App\Models\User;
Route::get('/users/{user}/posts/{post}', function(User $user, Post $post) {
    return $post;
})->scopeBindings();
~~~

Ou via definição do grupo inteiro com associações de escopo
~~~php
Route::scopeBindings()->group(function () {
    Route::get('/users/{user}/posts/{post}', function(User $user, Post $post) {
        return $post;
    });
});
~~~

## Agrupamento de rotas controladoras
Com um controlador comum para todas as rotas do mesmo grupo, basta, ao definir as rotas, fornecer o método controlador para invocá-las
~~~php
use App\Http\Controllers\OrderController;
Route::controller(OrderController::class)->group(function() {
    Route::get('/orders/{id}','show');
    Route::post('/orders','store');
});
~~~

## Índices fullText e cláusulas Where
Via MySQL ou PostgreSQL, o método fullText pode ser adicionado às definições de colunas para gerar índices fullText
~~~php
$table->text('funcao')->fullText();
~~~

Além disso, métodos whereFullText e orWhereFullText podem ser usados para adicionar cláusulas where em queries para colunas fullText ao banco de dados do projeto
~~~php
$users = DB::table('funcionario')
           ->whereFullText('funcao','desenvolvedor laravel')
           ->get();
~~~

## Renderização inline de templates Blade
Para transformar uma String Blade em Html, basta usar o método de renderização
~~~php
use Illuminate\Support\Facades\Blade;
return Blade::render('Olá, {{ $nome }}', ['nome'=>'UB Social']);
~~~

Da mesma forma, pode-se renderizar determinado componente de classe passando sua instância
~~~php
use App\View\Components\HelloComponent;
return Blade::renderComponent(new HelloComponent('UB Social'));
~~~

## Atalhos para Slot Name
Anteriormente, os Slot Names eram fornecidos usando atributo name na tag x-slot
~~~php
<x-alert>
    <x-slot name="title">Server Error</x-slot>
    <p>Erro na comunicação com o servidor!</p>
</x-alert>
~~~

Agora, a maneira fora simplificada
~~~php
<x-slot:title>Server Error</x-slot>
~~~

## Diretivas Blade checadas / selecionadas
Pode-se utilizar diretiva @checked para indicar caixa de seleção Html como marcada
~~~php
<input type="checkbox"
        name="active"
        value="active"
        @checked(old('active',$user->active))/>
~~~

Da mesma forma, utilizar diretiva @selected para indicar caixa de seleção Html como selecionada
~~~php
<select name="version">
    @foreach ($product->versions as $version)
        <option value="{{ $version }}" @selected(old('version') == $version)>
            {{ $version }}
        </option>
    @endforeach
</select>
~~~

## Visões de paginação com Bootstrap 5
Para indicar esse novo formato, ao invés do anterior com Tailwind, basta chamar o método useBootstrapFive no paginador dentro do método de inicialização do AppServiceProvider
~~~php
use Illuminate\Pagination\Paginator;
/**
 * Bootstrap any application services.
 *
 * @return void
 */
public function boot() {
    Paginator::useBootstrapFive();
}
~~~

## Validação aprimorada de dados em matriz aninhada
Para acessar elemento de matriz aninhada, pode-se usar o método Rule::forEach, que aceitará closure invocada a cada nova iteração, pegando o valor do atributo
~~~php
use App\Rules\HasPermission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
 
$validator = Validator::make($request->all(), [
    'companies.*.id' => Rule::forEach(function($value,$attribute) {
        return [
            Rule::exists(Company::class,'id'),
            new HasPermission('manage-company',$value),
        ];
    }),
]);
~~~

## Novos helpers
A função str retorna nova instância para a String fornecida. A função to_route gera resposta HTTP de redirecinamento para determinada rota. Neste caso, se necessário, pode-se informar o código de status HTTP que deve ser atribuído ao redirecionamento e quaisquer headers de respostas adicionais como terceiros e quartos argumentos ao método to_route
~~~php
$string = str('UB')->append(' Social'); //'UB Social'
$snake = str()->snake('UBSocial'); //'UBSocial'

return to_route('users.show',['user'=>1]);
return to_route('users.show',['user'=>1],302,['X-Framework'=>'Laravel']);
~~~

## Migrations anônimas
Para evitar colisão de nomes com classes migrations, fora padronizada a criação de migrations 'php artisan make:migration'
~~~php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up() {
        Schema::table('people', function (Blueprint $table) {
            $table->string('first_name')->nullable();
        });
    }
};
~~~

## Nova interface Query Builder
Essa feature inclui 'lluminate\Contracts\Database\QueryBuilder', 'Illuminate\Database\Eloquent\Concerns\DecoratesQueryBuilder' no lugar da implementação '_call'
~~~php
return Model::query()
    ->whereNotExists(function($query) {
        //$query via Query\Builder
    })
    ->whereHas('relation',function($query) {
        //$query via Eloquent\Builder
    })
    ->with('relation',function($query) {
        //$query via Eloquent\Relation
    });
~~~

## Chaves inválidas em arrays
O Laravel mostrará somente tipos citados elencados ao mesmo array, conforme resposta do código abaixo, onde anteriormente criaria-se novo array com o segundo componente (Mostrará os 2 nomes strings elencados ao único array 1). O método de validação também pode ser utilizado em outros momentos
~~~php
validator(
    [
        'users' => [
            ['name'=>'UB Social', 'id'=>89],
            ['name'=>'Laravel', 'id'=>9],
        ]
    ],
    [
        'users.*.name' => 'string'
    ]
)->validate();
~~~