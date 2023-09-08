<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// gambarannya untuk membaca/menghubungkan table member
class Member extends Authenticatable
{
    use HasFactory;
}

// yang datang dari folder vendor itu semua dari composer
