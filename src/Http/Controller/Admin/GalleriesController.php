<?php namespace Signifymedia\GalleriesModule\Http\Controller\Admin;

use Illuminate\Http\Request;
use Signifymedia\GalleriesModule\Gallery\Command\GalleryFromRequest;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryRepositoryInterface;
use Signifymedia\GalleriesModule\Gallery\Form\Command\AddTypeFromGallery;
use Signifymedia\GalleriesModule\Gallery\Form\Command\AddTypeFromRequest;
use Signifymedia\GalleriesModule\Gallery\Form\GalleryFormBuilder;
use Signifymedia\GalleriesModule\Gallery\Table\GalleryTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Signifymedia\GalleriesModule\Http\Middleware\Admin\LoadGalleryMiddleware;
use Signifymedia\GalleriesModule\Type\Contract\TypeRepositoryInterface;

class GalleriesController extends AdminController
{
    /**
     * Display an index of existing entries.
     *
     * @param GalleryTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(GalleryTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the modal for choosing a post type.
     *
     * @param  TypeRepositoryInterface $types
     * @return \Illuminate\View\View
     */
    public function choose(TypeRepositoryInterface $types)
    {
        return $this->view->make('module::admin/galleries/choose', ['types' => $types->all()]);
    }


    /**
     * Create a new entry.
     *
     * @param GalleryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(GalleryFormBuilder $form)
    {
        $this->dispatch(new AddTypeFromRequest($form));

        return $form->render();
    }

    /**
     * Edit an existing entry.
     * @param \Signifymedia\GalleriesModule\Gallery\Form\GalleryFormBuilder $form
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(GalleryFormBuilder $form, Request $request)
    {
        $gallery = $this->dispatch(new GalleryFromRequest($request));
        $this->dispatch(new AddTypeFromGallery($form, $gallery));

        return $form->render($gallery->getId());
    }
}
