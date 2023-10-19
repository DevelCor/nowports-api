<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructionCards extends Model
{
    use HasFactory;

    protected $table = 'instruction_cards';

    protected $fillable = ['id_sender_user', 'id_receiver_user', 'emission_date', 'reception_date', 'state'];
}
