<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ArticleRequest as StoreRequest;
use App\Http\Requests\ArticleRequest as UpdateRequest;

class AthleteCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        /******BASIC CRUD INFORMATIONS*****/

        $this->crud->setModel("App\Models\Athlete");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin') . '/athlete');
        $this->crud->setEntityNameStrings('athlète', 'athlètes');

        /******COLUMNS AND FIELDS*****/

        /****CRUD COLUMNS****/
        $this->crud->addColumn([
            'name' => 'firstname',
            'label' => 'Prénom'
        ]);

        $this->crud->addColumn([
            'name' => 'lastname',
            'label' => 'Nom'
        ]);

        /****CRUD BUTTONS****/
        $this->crud->addButtonFromModelFunction(
            'line',
            'Ajouter',
            'getOpenButton',
            'beginning');

        /*****CRUD FIELDS*****/
        $this->crud->addField([ // image
            'label' => "Image de l'athlète",
            'name' => "image",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
            // 'disk' => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);

        $this->crud->addField([
            'name' => 'firstname',
            'label' => 'Prénom',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'Entrez votre prénom'
            ]
        ]);

        $this->crud->addField([
            'name' => 'lastname',
            'label' => 'Nom',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'Entrez votre nom'
            ]
        ]);

        $this->crud->addField([
            'name' => 'slug',
            'label' => "Slug (URL)",
            'type' => 'text',
            'hint' => 'Est automatiquement généré à partir du nom-prénom si pas remplit.'
        ]);

        $this->crud->addField([
            'name' => 'date_of_birth',
            'label' => "Date de naissance",
            'type' => 'date_picker',
            // optional:
            'date_picker_options' => [
                'todayBtn' => true,
                'format' => 'dd-mm-yyyy',
                'language' => 'fr'
            ],
        ]);

        $this->crud->addField([
            'name' => 'status',
            'label' => "Statut",
            'type' => 'text'
        ]);
        $this->crud->addField([
            'name' => 'active', // the name of the db column
            'label' => 'Activité', // the input label
            'type' => 'radio',
            'inline' => 'true',
                'options'     => [ // the key will be stored in the db, the value will be shown as label;
        0 => "Actif",
        1 => "Inactif"
    ],
            // optional
            //'inline'      => false, // show the radios all on the same line?
        ]);


    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}