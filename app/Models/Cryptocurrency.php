<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptocurrency extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "crypto_img",
        "value",
        "address",
        "abbr",
        "r_value",
        "cap"
    ];
}
