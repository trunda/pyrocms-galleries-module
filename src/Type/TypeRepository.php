<?php namespace Signifymedia\GalleriesModule\Type;

use Signifymedia\GalleriesModule\Type\Command\DeleteTypeStream;
use Signifymedia\GalleriesModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class TypeRepository extends EntryRepository implements TypeRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var TypeModel
     */
    protected $model;

    /**
     * Create a new TypeRepository instance.
     *
     * @param TypeModel $model
     */
    public function __construct(TypeModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a category by it's slug.
     *
     * @param $slug
     * @return null|TypeInterface
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Truncate the entries.
     *
     * @return $this
     */
    public function truncate()
    {
        parent::truncate();

        foreach ($this->model->all() as $entry)
        {
            $this->dispatch(new DeleteTypeStream($entry));
        }

        return $this;
    }
}
