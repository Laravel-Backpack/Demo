<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UploaderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\Pro\Http\Controllers\Operations\AjaxUploadOperation;

class UploaderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use AjaxUploadOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Uploader::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/uploader');
        CRUD::setEntityNameStrings('uploader', 'uploaders');
    }

    protected function setupListOperation()
    {
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(UploaderRequest::class);

        CRUD::field('image')->type('image');
        CRUD::field('upload')->type('upload')->withFiles();
        CRUD::field('upload_required')->type('upload')->withFiles();
        CRUD::field('upload_multiple')->type('upload_multiple')->withFiles();
        CRUD::field('upload_multiple_required')->type('upload_multiple')->withFiles();
        CRUD::field('dropzone')->type('dropzone')->withFiles();
        CRUD::field('dropzone_required')->type('dropzone')->withFiles();
        CRUD::field('easymde')->type('easymde')->withFiles();

        CRUD::field('gallery')->type('repeatable')->subfields([
            [
                'name' => 'title',
            ],
            [
                'name'          => 'upload',
                'type'          => 'upload',
                'withFiles'     => true,
                'wrapper'       => [
                    'class' => 'form-group form-control col-md-7 col-xs-12',
                ],
            ],
            [
                'name'      => 'upload_multiple',
                'type'      => 'upload_multiple',
                'withFiles' => true,
                'wrapper'   => [
                    'class' => 'form-group form-control col-md-7 col-xs-12',
                ],
            ],
            [
                'name'    => 'image',
                'type'    => 'image',
                'wrapper' => [
                    'class' => 'form-group form-control col-md-7 col-xs-12',
                ],
                'withFiles' => true,
            ],
            [
                'name'      => 'dropzone',
                'type'      => 'dropzone',
                'withFiles' => true,
                'wrapper'   => [
                    'class' => 'form-group form-control col-md-7 col-xs-12',
                ],
            ],
            [
                'name'      => 'easymde',
                'type'      => 'easymde',
                'withFiles' => true,
                'wrapper'   => [
                    'class' => 'form-group form-control col-md-7 col-xs-12',
                ],
            ],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
