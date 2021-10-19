<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recepteurs extends Model
{
    protected $table = 'recepteurs';
    use HasFactory;
    protected $primaryKey = 'recepteur_id';

}
