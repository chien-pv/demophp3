<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Scopes\ActiveScope;


class Post extends Model
{
    // protected $table = "users";
    use HasFactory;
}
