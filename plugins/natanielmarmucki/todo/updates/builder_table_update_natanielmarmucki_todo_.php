<?php namespace NatanielMarmucki\Todo\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNatanielmarmuckiTodo extends Migration
{
    public function up()
    {
        Schema::table('natanielmarmucki_todo_', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('natanielmarmucki_todo_', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
