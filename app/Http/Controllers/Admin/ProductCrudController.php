<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use App\Models\Product;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;

use App\Http\Requests\ProductRequest;

class ProductCrudController extends CrudController
{

    public function __construct()
    {
        $this->middleware(['role:admin']);
        
        parent::__construct();
    }
    
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin') . '/product');
        $this->crud->setEntityNameStrings('product', 'products');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();

        // ------ CRUD FIELDS
        //
        $this->crud->addField([
                                'name' => 'title',
                                'label' => 'Title',
                                'type' => 'text',
                                'count_down' => 70,
                                'attributes' => ['maxlength' => 70],
                                'placeholder' => 'Your title here',
                            ]);
        $this->crud->addField([
                                'name' => 'content',
                                'label' => 'Content',
                                'type' => 'textarea',
                            ]);
         $this->crud->addField([
                                'name' => 'price',
                                'label' => 'Price',
                                'type' => 'number',
                                'attributes' => ["step" => "any"],
                            ]);

        $this->crud->addField([
                                'name' => 'image',
                                'label' => 'Image',
                                'type' => 'image',
                                'upload' => true,
                                'crop' => true,
                                'aspect_ratio' => 1,
                                'disk' => 'uploads'
                            ]);
        $this->crud->addField([
                                'label' => 'Category',
                                'type' => 'select',
                                'name' => 'category_id',
                                'entity' => 'category',
                                'attribute' => 'name',
                                'model' => "App\Models\Category",
                            ]);
        $this->crud->addField([
                                'name' => 'slug',
                                'label' => 'Slug (URL)',
                                'type' => 'text',
                                'hint' => 'Будет автоматически сгенерирован из вашего названия, если он оставлен пустым.',
                                // 'disabled' => 'disabled'
                            ]);
        $this->crud->addField([
                                'name' => 'count',
                                'label' => 'Count',
                                'type' => 'number',
                            ]);
//        $this->crud->addField([
//                                'name' => 'color',
//                                'label' => 'Color',
//                                'type' => 'text',
//                            ]);
//        $this->crud->addField([
//                                'name' => 'weight',
//                                'label' => 'Weight',
//                                'type' => 'number',
//                                'attributes' => ["step" => "any"],
//                            ]);
        $this->crud->addField([
                                'name' => 'attributes',
                                'label' => 'Attributes',
                                'type' => 'table',
                                'entity_singular' => 'option', // used on the "Add X" button
                                'columns' => [
                                    'name' => 'Name',
                                    'desc' => 'Description'
                                ],
                                'max' => 0, // maximum rows allowed in the table
                                'min' => 0 // minimum rows allowed in the table
                            ]);

        $this->crud->addField([
                                'name' => 'status',
                                'label' => 'Status',
                                'type' => 'enum',
                            ]);
        //$this->crud->enableAjaxTable();

        
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'id',
                                'label' => 'ID',
                                'type' => 'integer'
                            ]);

        //
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Title',
                                'type' => 'text',
                                'count_down' => 70,
                                'attributes' => ['maxlength' => 70],
                                'placeholder' => 'Your title here',
                            ]);
        $this->crud->addColumn([
                                'name' => 'price',
                                'label' => 'Price',
                                'type' => 'integer'
                            ]);
        $this->crud->addColumn([
                                'name' => 'count',
                                'label' => 'Count',
                                'type' => 'integer'
                            ]);
        //
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
         $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete', 'show']);
         //$this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
         $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
