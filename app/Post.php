<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    // Table name
    protected $table = 'posts';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    // Below is a function to output a date in readable format
    public static function parseDate($value) {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
