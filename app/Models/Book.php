<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Book extends Model
{
    use HasFactory;

    public $table = 'books';

    protected $dates = [
        'created_at',
        'updated_at',
        'release_date',
    ];

    protected $fillable = [
        'name',
        'isbn',
        'authors',
        'country',
        'publisher',
        'release_date',
        'number_of_pages',
        'created_at',
        'updated_at',
    ];

    protected $cast = [
        'authors'   => 'array',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getReleaseDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function setReleaseDateAttribute($value)
    {
        $this->attributes['release_date'] = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');
    }

    public function getAuthorsAttribute($value)
    {
        return json_decode($value);
    }

    public function setAuthorsAttribute($value)
    {
        $this->attributes['authors'] = json_encode($value);
    }

    public function scopeInfo($m)
    {
        return $m;
    }
}
