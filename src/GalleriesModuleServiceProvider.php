<?php namespace Signifymedia\GalleriesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Assignment\AssignmentRouter;
use Anomaly\Streams\Platform\Field\FieldRouter;
use Signifymedia\GalleriesModule\Http\Controller\Admin\AssignmentsController;
use Signifymedia\GalleriesModule\Http\Controller\Admin\FieldsController;

class GalleriesModuleServiceProvider extends AddonServiceProvider
{

    protected $plugins = [];

    protected $commands = [];

    protected $routes = [
        'admin/galleries'                 => 'Signifymedia\GalleriesModule\Http\Controller\Admin\GalleriesController@index',
        'admin/galleries/create'          => 'Signifymedia\GalleriesModule\Http\Controller\Admin\GalleriesController@create',
        'admin/galleries/edit/{id}'       => 'Signifymedia\GalleriesModule\Http\Controller\Admin\GalleriesController@edit',
        'admin/galleries/items'           => 'Signifymedia\GalleriesModule\Http\Controller\Admin\ItemsController@index',
        'admin/galleries/items/create'    => 'Signifymedia\GalleriesModule\Http\Controller\Admin\ItemsController@create',
        'admin/galleries/items/edit/{id}' => 'Signifymedia\GalleriesModule\Http\Controller\Admin\ItemsController@edit',
        'admin/galleries/types'           => 'Signifymedia\GalleriesModule\Http\Controller\Admin\TypesController@index',
        'admin/galleries/types/create'    => 'Signifymedia\GalleriesModule\Http\Controller\Admin\TypesController@create',
        'admin/galleries/types/edit/{id}' => 'Signifymedia\GalleriesModule\Http\Controller\Admin\TypesController@edit',
    ];

    protected $middleware = [];

    protected $listeners = [];

    protected $aliases = [];

    protected $bindings = [];

    protected $providers = [];

    protected $singletons = [];

    protected $overrides = [];

    protected $mobile = [];

    public function register()
    {
    }

    /**
     * Map the addon.
     *
     * @param FieldRouter $fields
     * @param AssignmentRouter $assignments
     */
    public function map(FieldRouter $fields, AssignmentRouter $assignments)
    {
        $fields->route($this->addon, FieldsController::class);
        $assignments->route($this->addon, AssignmentsController::class);
    }
}
