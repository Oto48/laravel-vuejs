<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $table = 'statistics';
    protected $fillable = ['start_date','name','statistics_name','dimension','quantity','quota','note'];
    public $timestamps = false;
    use HasFactory;
}
