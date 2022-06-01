<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'text', 'web_site_id'];

    public function web_site()
    {
        return $this->belongsTo(WebSite::class, 'web_site_id');
    }
}
