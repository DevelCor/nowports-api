<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsByLetter extends Model
{
    use HasFactory;

    protected $table = 'goods_by_letter';

    protected $fillable = ['id_instruction_card', 'id_mercancia', 'quantity'];

}
