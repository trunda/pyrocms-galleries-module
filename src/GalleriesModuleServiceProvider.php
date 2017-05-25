<?php namespace Signifymedia\GalleriesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Assignment\AssignmentRouter;
use Anomaly\Streams\Platform\Field\FieldRouter;
use Anomaly\Streams\Platform\Model\Galleries\GalleriesGalleriesEntryModel;
use Anomaly\Streams\Platform\Model\Galleries\GalleriesItemsEntryModel;
use Anomaly\Streams\Platform\Model\Galleries\GalleriesTypesEntryModel;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryRepositoryInterface;
use Signifymedia\GalleriesModule\Gallery\GalleryModel;
use Signifymedia\GalleriesModule\Gallery\GalleryRepository;
use Signifymedia\GalleriesModule\Http\Controller\Admin\AssignmentsController;
use Signifymedia\GalleriesModule\Http\Controller\Admin\FieldsController;
use Signifymedia\GalleriesModule\Item\Contract\ItemRepositoryInterface;
use Signifymedia\GalleriesModule\Item\ItemModel;
use Signifymedia\GalleriesModule\Item\ItemRepository;
use Signifymedia\GalleriesModule\Type\Contract\TypeRepositoryInterface;
use Signifymedia\GalleriesModule\Type\TypeModel;
use Signifymedia\GalleriesModule\Type\TypeRepository;

/**
 * Class GalleriesModuleServiceProvider
 * @package Signifymedia\GalleriesModule
 */
class GalleriesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * Plugins definition
     * @var array
     */
    protected $plugins = [
        GalleriesModulePlugin::class,
    ];

    /**
     * Class binfings definition
     * @var array
     */
    protected $bindings = [
        GalleriesGalleriesEntryModel::class => GalleryModel::class,
        GalleriesItemsEntryModel::class     => ItemModel::class,
        GalleriesTypesEntryModel::class     => TypeModel::class,
    ];

    /**
     * Singletons definition
     * @var array
     */
    protected $singletons = [
        TypeRepositoryInterface::class    => TypeRepository::class,
        GalleryRepositoryInterface::class => GalleryRepository::class,
        ItemRepositoryInterface::class    => ItemRepository::class,
    ];

    /**
     * Routes definition
     * @var array
     */
    protected $routes = [
        'admin/galleries'                           => 'Signifymedia\GalleriesModule\Http\Controller\Admin\GalleriesController@index',
        'admin/galleries/choose'                    => 'Signifymedia\GalleriesModule\Http\Controller\Admin\GalleriesController@choose',
        'admin/galleries/create'                    => 'Signifymedia\GalleriesModule\Http\Controller\Admin\GalleriesController@create',
        'admin/galleries/edit/{gallery}'            => 'Signifymedia\GalleriesModule\Http\Controller\Admin\GalleriesController@edit',
        'admin/galleries/items/{gallery}'           => 'Signifymedia\GalleriesModule\Http\Controller\Admin\ItemsController@index',
        'admin/galleries/items/{gallery}/create'    => 'Signifymedia\GalleriesModule\Http\Controller\Admin\ItemsController@create',
        'admin/galleries/items/{gallery}/edit/{id}' => 'Signifymedia\GalleriesModule\Http\Controller\Admin\ItemsController@edit',
        'admin/galleries/types'                     => 'Signifymedia\GalleriesModule\Http\Controller\Admin\TypesController@index',
        'admin/galleries/types/create'              => 'Signifymedia\GalleriesModule\Http\Controller\Admin\TypesController@create',
        'admin/galleries/types/edit/{id}'           => 'Signifymedia\GalleriesModule\Http\Controller\Admin\TypesController@edit',
    ];

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
