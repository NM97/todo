<?php namespace NatanielMarmucki\Todo\Models;

use Model;

/**
 * Model
 */
class ToDo extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'natanielmarmucki_todo_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $fillable = ['name','description','status'];
}
