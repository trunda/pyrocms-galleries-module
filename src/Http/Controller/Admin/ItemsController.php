<?php namespace Signifymedia\GalleriesModule\Http\Controller\Admin;

use Signifymedia\GalleriesModule\Item\Form\ItemFormBuilder;
use Signifymedia\GalleriesModule\Item\Table\ItemTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class ItemsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ItemTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ItemTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ItemFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ItemFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ItemFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ItemFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
