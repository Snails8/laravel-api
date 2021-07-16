<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\Models
 */
class Company extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    use HasFactory;
}
