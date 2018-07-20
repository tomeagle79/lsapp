<?php
// namespace App\Helpers;

use Carbon\Carbon;


function parseDate($value) 
{ 
  return Carbon::parse($value)->format('F j, Y'); 
}