<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWebSite extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "web_site_id"];

    protected $table = "user_web_site";
}
