<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class ComposeEmailModel extends Model
{
    use HasFactory;

    protected $table = 'compose_email';
}