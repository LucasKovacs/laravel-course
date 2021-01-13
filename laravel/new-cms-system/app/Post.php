<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mutator for post_image
     *
     * @param string $value
     * @return void
     */
    public function setPostImageAttribute($value): void
    {
        $this->attributes['post_image'] = $value;
    }

    /**
     * Accesor
     *
     * @param string $value
     * @return string
     */
    public function getPostImageAttribute($value): string
    {
        return asset('storage/' . $value);
    }
}
