<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['start_date','name','task','product','scheduled_time','actual_time','finish_date'];
    public $timestamps = false;
    use HasFactory;
}
