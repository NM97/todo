<?php

use natanielmarmucki\todo\models\todo;
use Illuminate\Http\Request;

Route::get('api/populate', function(){
    $faker = Faker\Factory::create();

    for($i = 0; $i < 20; $i++){
        Todo::create([
            'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $faker->text($maxNbChars = 200),
            'status' => $faker->boolean($chanceOfGettingTrue = 50),
            'created_at' => $faker->date($format = 'Y-m-d H:i:s', $max = 'now')
        ]);
    }

    return "Todos Created!";
});

Route::get('api/todos', function() {
    $todos = Todo::all();

    return $todos;
});

Route::post('api/add-todo', function(Request $req){
    $data = $req->input();

    Todo::create([
        'name' => $data['name'],
        'description' => $data['description'],
        'status' => $data['status']
    ]);
});

Route::post('api/delete-todo', function(Request $req){
    $data = $req->input();

    Todo::destroy($data['id']);
});

Route::post('api/toggle-todo', function(Request $req){
    $data = $req->input();

    Todo::where('id', $data['id'])->update(['status' => $data['status']]);
});

Route::post('api/update-todo', function(Request $req){
    $data = $req->input();

    Todo::where('id', $data['id'])
    ->update([
        'status' => $data['status'],
        'name' => $data['name'],
        'description' => $data['description']
    ]);
});


?>