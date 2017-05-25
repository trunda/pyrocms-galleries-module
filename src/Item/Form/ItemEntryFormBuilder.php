<?php
namespace Signifymedia\GalleriesModule\Item\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;
use Signifymedia\GalleriesModule\Entry\Form\EntryFormBuilder;

class ItemEntryFormBuilder extends MultipleFormBuilder
{
    /**
     * The form buttons.
     *
     * @var array
     */
    protected $buttons = [
        'cancel',
    ];


    /**
     * Fired after the entry form is saved.
     *
     * @param EntryFormBuilder $builder
     */
    public function onSavedEntry(EntryFormBuilder $builder)
    {
        /* @var FormBuilder $form */
        $form = $this->forms->get('item');

        $item = $form->getFormEntry();
        $entry = $builder->getFormEntry();

        $item->entry_id   = $entry->getId();
        $item->entry_type = get_class($entry);
    }

    /**
     * Get the contextual entry ID.
     *
     * @return int|mixed|null
     */
    public function getContextualId()
    {
        /* @var FormBuilder $form */
        $form = $this->forms->get('item');

        return $form->getContextualId();
    }
}
