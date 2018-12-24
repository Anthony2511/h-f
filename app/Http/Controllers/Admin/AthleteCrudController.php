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
        $this->crud->setEntityNameStrings('athlete', 'athletes');

        /******COLUMNS AND FIELDS*****/

        /****COLUMNS****/
        $this->crud->addColumn([
            'name' => 'firstname',
            'label' => 'Prénom'
        ]);

        $this->crud->addColumn([
            'name' => 'lastname',
            'label' => 'Nom'
        ]);

        /*****FIELDS*****/
        $this->crud->addField([
            'name' => 'firstname',
            'label' => 'Prénom',
            'type' => 'text',
            'placeholder' => 'Entrez votre prénom'
        ]);

        $this->crud->addField([
            'name' => 'lastname',
            'label' => 'Nom',
            'type' => 'text',
            'placeholder' => 'Entrez votre nom'
        ]);

        $this->crud->addField([
            'name' => 'slug',
            'label' => "Slug (URL)",
            'type' => 'text',
            'hint' => 'Est automatiquement généré à partir du nom-prénom si pas remplit.'
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