<?php
// namespace App\Helpers;

use Carbon\Carbon;

if( !function_exists( 'parseDate' ) ){
  function parseDate($value) 
  { 
    return Carbon::parse($value)->format('F j, Y'); 
  }
}