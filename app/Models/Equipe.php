<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $table = 'equipe';
    public $timestamps = false;
    public $incrementing = true;
    protected $guarded = [];
    protected $primaryKey = 'ID';
}
