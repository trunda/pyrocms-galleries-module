<?php namespace Signifymedia\GalleriesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Routing\UrlGenerator;
use Illuminate\Http\Request;
use Signifymedia\GalleriesModule\Entry\Form\EntryFormBuilder;
use Signifymedia\GalleriesModule\Gallery\Command\GalleryFromRequest;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryRepositoryInterface;
use Signifymedia\GalleriesModule\Gallery\GalleryModel;
use Signifymedia\GalleriesModule\Http\Middleware\Admin\LoadGalleryMiddleware;
use Signifymedia\GalleriesModule\Item\Contract\ItemInterface;
use Signifymedia\GalleriesModule\Item\Contract\ItemRepositoryInterface;
use Signifymedia\GalleriesModule\Item\Form\Command\AddEntryForm;
use Signifymedia\GalleriesModule\Item\Form\Command\AddEntryFormFromItem;
use Signifymedia\GalleriesModule\Item\Form\Command\AddItemForm;
use Signifymedia\GalleriesModule\Item\Form\Command\AddItemFormFromItem;
use Signifymedia\GalleriesModule\Item\Form\ItemEntryFormBuilder;
use Signifymedia\GalleriesModule\Item\Form\ItemFormBuilder;
use Signifymedia\GalleriesModule\Item\Table\ItemTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ItemsController extends AdminController
{
    /**
     * @var GalleryInterface
     */
    protected $gallery;

    /**
     * ItemsController constructor.
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct();

        if (!$this->gallery = $this->dispatch(new GalleryFromRequest($request))) {
            throw new NotFoundHttpException("Gallery does not exist");
        }
    }

    /**
     * Display an index of existing entries.
     *
     * @param ItemTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ItemTableBuilder $table)
    {
        return $table->setEntries($this->gallery->items)->render();
    }

    /**
     * Create a new entry.
     *
     * @param ItemEntryFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ItemEntryFormBuilder $form)
    {
        $this->dispatch(new AddEntryForm($form, $this->gallery));
        $this->dispatch(new AddItemForm($form, $this->gallery));

        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ItemEntryFormBuilder $form
     * @param Request $request
     * @param ItemRepositoryInterface $items
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ItemEntryFormBuilder $form, Request $request, ItemRepositoryInterface $items)
    {
        /** @var $item ItemInterface */
        if (!$item = $items->find($request->route('id'))) {
            throw new NotFoundHttpException("Item does not exist");
        }

        $this->dispatch(new AddEntryFormFromItem($form, $this->gallery, $item));
        $this->dispatch(new AddItemFormFromItem($form, $this->gallery, $item));

        return $form->render($item->getId());
    }
}
