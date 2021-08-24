<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $fillable = [
        'nama', 'email', 'komentar', 'blog_id'
    ];

    public function blog()
    {
        return $this->belongsTo('App\Blog', 'blog_id');
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        // ->diffForHumans();
        ->translatedFormat('l, d F Y H:i');
    }
}
