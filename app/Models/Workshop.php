<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Workshop
 *
 * @property $id
 * @property $title
 * @property $location
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Workshop extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'location', 'description', 'image'];


}
