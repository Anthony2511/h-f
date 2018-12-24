<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Athlete extends Model 
{
    use CrudTrait;
    use Sluggable,SluggableScopeHelpers;


    /*****GLOBAL VARIABLES*****/
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }

    /*****FUNCTIONS*****/

    /*****RELATIONS*****/

    /*****SCOPES*****/

    /*****ACCESORS*****/

    /*****MUTATORS*****/

}