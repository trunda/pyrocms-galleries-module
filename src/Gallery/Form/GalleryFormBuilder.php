<?php
namespace Signifymedia\GalleriesModule\Gallery\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;

class GalleryFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [
        '*',
        'slug' => [
            'disabled' => 'edit'
        ]
    ];

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'type'
    ];

    /**
     * @var TypeInterface
     */
    protected $type;

    /**
     * Get the type.
     *
     * @return TypeInterface|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the type.
     *
     * @param  TypeInterface $type
     * @return $this
     */
    public function setType(TypeInterface $type)
    {
        $this->type = $type;

        return $this;
    }


    /**
     * Fired when the builder is ready to build.
     *
     * @throws \Exception
     */
    public function onReady()
    {
        if (!$this->getType()) {
            throw new \Exception('The $type parameter is required when creating a post.');
        }
    }

    /**
     * Save the entry id
     */
    public function onSaving()
    {
        $entry = $this->getFormEntry();
        if (!$entry->type_id) {
            $entry->type_id = $this->getType()->getId();
        }
    }

}
