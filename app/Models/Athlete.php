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
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public_folder";
        $destination_path = "uploads/athletes";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value)->encode('jpg', 90);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }

}