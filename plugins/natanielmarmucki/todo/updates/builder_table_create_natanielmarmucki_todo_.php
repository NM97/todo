<?php namespace NatanielMarmucki\Todo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNatanielmarmuckiTodo extends Migration
{
    public function up()
    {
        Schema::create('natanielmarmucki_todo_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->boolean('status');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('natanielmarmucki_todo_');
    }
}
