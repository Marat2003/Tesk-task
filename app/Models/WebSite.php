<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSite extends Model
{
    protected $fillable = ["title", "description", "company_name"];

    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class, 'web_site_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "user_web_site");
    }
}
