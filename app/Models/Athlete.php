<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Athlete extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;


    /*****GLOBAL VARIABLES*****/

    protected $table = 'athletes';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array(
        'firstname',
        'lastname',
        'date_of_birth',
        'status',
        'image',
        'slug',
        'record_id',
        'trainer_id',
        'discipline_id',
        'trophy_id',
        'division_id',
        'active');

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

    // The slug is created automatically from the "title" field if no slug exists.
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;

        $firstname = $this->firstname();
        $lastname = $this->lastname();

        return $firstname .'_'. $lastname;
    }

    /*****MUTATORS*****/

}