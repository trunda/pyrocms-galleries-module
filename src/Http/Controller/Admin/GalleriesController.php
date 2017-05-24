<?php namespace Signifymedia\GalleriesModule\Http\Controller\Admin;

use Signifymedia\GalleriesModule\Gallery\Form\GalleryFormBuilder;
use Signifymedia\GalleriesModule\Gallery\Table\GalleryTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

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
     * Create a new entry.
     *
     * @param GalleryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(GalleryFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param GalleryFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(GalleryFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
