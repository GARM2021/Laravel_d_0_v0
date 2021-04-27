02:18 p. m. 24/02/2021
composer create-project laravel/laravel Laravel-desde-Cero 

D:\xampp\htdocs\Laravel-desde-Cero>php artisan server

D:\xampp\htdocs\Laravel-desde-Cero>php artisan make:migration CreateProductsTable

D:\xampp\htdocs\Laravel-desde-Cero>php artisan migrate:fresh 

D:\xampp\htdocs\Laravel-desde-Cero>php artisan make:model Product

D:\xampp\htdocs\Laravel-desde-Cero>php artisan make:factory ProductFactory --model=Product

D:\xampp\htdocs\Laravel-desde-Cero>php artisan thinker
>>> App\Models\Product::Factory()-> make(); 
=> App\Models\Product {#3385
     title: "Voluptas hic.",
     description: "Provident ex unde odit ut quos.",
     price: 64.22,
     stock: 1,
     status: "avialable",
}
>>> App\Models\Product::Factory()-> create();
=> App\Models\Product {#3386
     title: "Possimus excepturi quos.",
     description: "Suscipit id rerum et ut provident. Voluptatem cumque facere et qui fugit explicabo.",
     price: 92.62,
     stock: 9,
     status: "unavailable",
     updated_at: "2021-02-26 23:27:27",
     created_at: "2021-02-26 23:27:27",
     id: 1,
   }
>>> App\Models\Product::Factory()->count(10)-> create();
=> Illuminate\Database\Eloquent\Collection {#3348
     all: [
       App\Models\Product {#3389
         title: "Placeat cupiditate deleniti.",
         description: "Doloribus sint facere ducimus voluptatum quaerat beatae. Mollitia consectetur aut ipsa esse unde est iure.",
         price: 65.11,
         stock: 2,
         status: "unavailable",
         updated_at: "2021-02-26 23:28:55",
         created_at: "2021-02-26 23:28:55",
         id: 2,
       },
     .........................
       App\Models\Product {#4119
         title: "Culpa odit deleniti illum.",
         description: "Nihil iusto aut veniam sit illum. Eum autem unde reiciendis quod eaque.",
         price: 53.09,
         stock: 6,
         status: "unavailable",
         updated_at: "2021-02-26 23:28:56",
         created_at: "2021-02-26 23:28:56",
         id: 11,
       },
     ],
   }
 ///////////Se modifica el DatabaseSeeder.php 

 $products = Product::factory(50)->create();

y se ejecuta 

D:\xampp\htdocs\Laravel-desde-Cero>php artisan migrate:fresh --seed
Dropped all tables successfully.
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (1,241.32ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (183.97ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (195.46ms)
Migrating: 2021_02_26_200925_create_products_table
Migrated:  2021_02_26_200925_create_products_table (113.39ms)
Database seeding completed successfully.

/////////// se adicionan 50 registros mas con 
D:\xampp\htdocs\Laravel-desde-Cero>php artisan db:seed

views layouts/master.blade.php

///// Permite generar el modelo a partir de codigo SQL de SQLServer 

https://laravelarticle.com/laravel-migration-generator-online

///  Las sesiones se pueden manejar en cokies solo implementado, en base de datos y en archivo esto lo defines en 

.env -> SESSION_DRIVER=file  

si es por archivo esta en storage/framework/sessions

en /config/session.php  

  el tiempo de duración de la sesión es decir después de cuánto tiempo puede expirar o no si se va a expirar

Clase 43 
D:\xampp\htdocs\Laravel-desde-Cero>composer require laravel/ui //re run en casa

D:\xampp\htdocs\Laravel-desde-Cero>php artisan ui --help  //re run en casa

D:\xampp\htdocs\Laravel-desde-Cero>php artisan ui bootstrap --auth  //re run en casa

D:\xampp\htdocs\Laravel-desde-Cero>php artisan migrate:fresh --seed  // genera los usuarios y refresca los productos //re run en casa

Clase 45
npm --version

npm install 

npm run dev  // me marco error y lo volvi a correr y ya termino successfully //re run en casa

Clase 49
D:\xampp\htdocs\Laravel-desde-Cero>php artisan make:request ProductRequest // crea en app/Request 

\ProductRequest.php
 public function authorize()
    {
        return true;//! c49 esta como false y deve ser true se debe cambiar porque lo genera como false
    }
    
20210417
Para ubicar el programa en casa esta en 
C:\xampp\htdocs\Laravel_d_0_v0  y el worksapce es este esl el directorio de casa
WS_LARAVELDESDECEROOFICINA(WORKSAPCE)  20210417 

Clase 50 

C:\xampp\htdocs\Laravel_d_0_v0 php artisan make:model Image -a
Controller created successfully. //si se tardo un buen 


Clase 52

D:\xampp\htdocs\Laravel-desde-Cero // oficina

php artisan migrate // genera las nuevas tablas. Oficina

php aritsan migrate:fresh --seed  // actualiza campos de user 

Clase 54

D:\xampp\htdocs\Laravel-desde-Cero // oficina

php artisan tinker

>>> $instance = App\Cart::factory()->make();

>>>  $instance = App\Models\Cart::factory()->create();
  $instance = App\Models\Order::factory()->create();
   $instance = App\Models\Payment::factory()->create();
   $instance = App\Models\User::factory()->create();
   $instance = App\Models\Image::factory()->create();

Clase 55
$cart = App\Cart::factory()->make();

Clase 56

D:\xampp\htdocs\Laravel-desde-Cero>php artisan migrate:fresh --seed //C56

php artisan tinker

$order = App\Models\Order::factory()->make();

$payment  = App\Models\Payment::factory()->make(['order_id' => $order->id]); 

$order = App\Models\Order::factory()->make();

$payment  = App\Models\Payment::factory()->make(['order_id' => $order->id]); // aqui batalle porque habia puesto order_id como order-id

----como comprobacion : ---------------------------------------------------------------------------------------------------------------
>>> $order -> payment;
=> App\Models\Payment {#4354
     id: "4",
     amount: "132.45",
     payed_at: "2020-06-06 23:19:41",
     order_id: "4",
     created_at: "2021-04-20 21:10:05",
     updated_at: "2021-04-20 21:10:05",
   }
>>> $payment -> order;
=> App\Models\Order {#4358
     id: "4",
     status: "pending",
     created_at: "2021-04-20 21:09:59",
     updated_at: "2021-04-20 21:09:59",
   }
>>>  
-------------------------------------------------------------------------------------------------------------------                                     
Clase 56
php artisan tinker
 $user = App\Models\User::factory()->create();
 $order = App\Models\Order::factory()->create(['user_id' => $user->id]);
-------------------------------------------------------------------------------------------------------------------
 Clase 57
 >>> $user = App\Models\User::factory()->create(); 
>>> $user->orders()->save(App\Models\Order::factory()->make());  
>>> $user->orders; 
>>> $user = App\Models\User::first(); 
>>> $order->user;
-------------------------------------------------------------------------------------------------------------------
 Clase 58

 php artisan make:migration CreateCartProductTable
 php artisan make:migration CreateOrderProductTable

 //se modifican los modelos para que existan las relaciones con las tablas pivote

 php aritsan migrate:fresh --seed
  $user = App\Models\User::factory()->create();
 $order = App\Models\Order::factory()->create(['user_id' => $user->id]);
$cart = App\Models\Cart::factory()->create();

$order->products()->attach([1 =>['quantity' => 4], 2 =>['quantity' => 5], 3 => ['quantity' =>3]]);

$order->products;

$order = $order-fresh();







