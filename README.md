# Laravel 9 Course/Tutorials From Aprendible

In this repository I'm saving the tutorials follows for the Laravel 9 Course from Aprendible.com

## Blade Templates

`@dump` Is used for debugging variables on the template

## Routes

## Controllers

Used for the processes, logic, operations...

`php artisan make:controller -i // Creates controller with invoke func`

`php artisan make:controller -r // Creates controller with all requests & forms`

`php artisan make:controller --api // Creates controller with request for apis`

## Migrations

Migrations are used for creating the database tables, columns, etc...

`php artisan migrate` -> Creates the database with the migrations

`php artisan migrate:rollback` -> Rollback to the last batch

`php artisan migrate:fresh` -> Deletes all the migrations, tables, data, & Creates all tables again

`php artisan make:migration create_posts_table` Create a new migration file

`php artisan make:migration add_body_to_posts_table` Adds new DDL to an existed migration

**After** function locates a column after another column

`$table->longText('body')->after('title');`

## Models

This guess that the table is **posts**
`php artisan make:model Post`

`$posts = Post::all();` Gets all posts

For modifying the name of a table for a model we need to change the property in the model:
`protected $table = 'tableName';`

**We can create the model & the migration at the same command**

`php artisan make:model Post -m`

### Tinker

Tinker is a shell for using PHP.

`php artisan tinker`

## Eloquent (ORM)

`Post::all();`

`Post::find(1);` Finds by Id

`$post = Post::find(1);` Saves in memory

`$post->save();` Saves in database

`$post = new Post;` Creates new posts

`$post->title = 'title';`

`$post->body = 'content';`

`$post->save();` Saves or Updates

`$post->delete();` Deletes

## Forms

`@csrf` This annotation is required for the forms

This adds a hidden input with a token for the form.

**The lifetime's token is 2hr for default.**

### Redirections

`return redirect()->route('posts);`

`return to_route('posts');`

## Session Messages

Session Messages are used for adding messages for a single request.

`session()->flash('key', 'value');`

### Return old values in a form

`{{ old('inputName'); }}`

### Validations

[Validations Laravel Documentation](https://laravel.com/docs/10.x/validation#main-content)

## Localization

`php artisan lang:publish`

Creates the **lang** folder with the english language.
We can add more languages.

**We need to modify the config/app.php locale option**

`<?php

return [
'required' => "El campo :attribute es obligatorio"
];
`

**Laravel-Lang - Translated Messages**

(https://github.com/Laraveles/spanish)

### Edit Form
`@method('PATCH')` This annotation indicates that the form sends a patch petition

### Errors from validations
`@error('inputName')    @enderror`

#### Don't repeat yourself

`Post::create([data]);` Creates a new Post

`$post->update([data];` Updates a Post

`$validated = $request->validate([
'title' => ['required', 'min:4'],
'body' => ['required'],
]` Saves validated data in memory

`Post::create($validated);` Creates validated data in DB

`$post->update($validated);` Updates validated data in DB

## Requests

`php artisan make:request SavePostRequest` Makes a form request for a fillable form

## Massive Assignation

This means that a **model** with:

`protected $fillable = [columns]` -> It only saves/creates a Model Object with the columns describe in the **$fillable**

`protected $guarded = [columns]` -> It only saves/creates a Model Object with the columns that are NOT in the **$guarded**

`protected $guarded = []` -> With no arguments means that its disable the massive assignation


## Routes For CRUD
`php artisan route:list --path=blog` Lists all routes with contains 'blog'

`Route::resource('blog', PostController::class, [
'names' => 'posts',
'parameters' => ['blog' => 'post']
]);` Creates the next structure for the routes:

GET|HEAD        blog ............................................................ posts.index › PostController@index

POST            blog ............................................................ posts.store › PostController@store

GET|HEAD        blog/create ................................................... posts.create › PostController@create

GET|HEAD        blog/{post} ....................................................... posts.show › PostController@show

PUT|PATCH       blog/{post} ................................................... posts.update › PostController@update

DELETE          blog/{post} ................................................. posts.destroy › PostController@destroy

GET|HEAD        blog/{post}/edit .................................................. posts.edit › PostController@edit

## Load JS, CSS, SASS

In the public folder we can add JS & CSS and then we can link the CSS & use JS in the blade templates:

Examples -> "/" means public folder:

"/css/app.css"

"/js/app.js"

For SASS we need to use the folders css & js in the **resources** folder

1. `npm install`
2. `npm i sass --save-dev`
3. `npm run dev`
4. Link the resources using `@vite(['resources/css/app.scss', 'resources/js/app.js'])`
5. Compile with `npm run build`

## Install Boostrap 5

`npm i booststrap --save-dev`

`@import 'bootstrap/scss/bootstrap';` Importing in resources/css/app.scss

Importing in resources/js/app.js:

`import '../css/app.scss';` 

`import * as bootstrap from 'bootstrap';`

## Install Tailwind 

(https://tailwindcss.com/docs/guides/laravel)

## Middleware - Route Protection

`Route::view('/about', 'about')->name('about')->middleware('auth');` Login Auth

Define a login route

* auth: Needs Login
* guess: If you aren't login you can't pass

`public function __construct()
{
$this->middleware('auth', ['except' => ['index', 'show']]);
}` 

-> Middleware in Post Controller ('except' => excludes, 'only' => permits)

`@auth ... @endauth` Only shows when is auth

`@guess ... @endguess` Only shows when is NOT auth





