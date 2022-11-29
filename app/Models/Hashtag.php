<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Hashtag extends Model
{
    use HasFactory;

    protected $table = 'hashtags';

    protected $guarded = ['id'];

    public function hashTagArray()
    {
        return explode(',', $this->first()->hashtag);
    }
}
