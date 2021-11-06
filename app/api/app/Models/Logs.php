<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'expression', 
        'result',
    ];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = [];
    
}
