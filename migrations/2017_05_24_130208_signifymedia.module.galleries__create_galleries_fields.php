<?php

use Anomaly\FilesModule\Disk\Contract\DiskRepositoryInterface;
use Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface;
use Anomaly\Streams\Platform\Database\Migration\Migration;

class SignifymediaModuleGalleriesCreateGalleriesFields extends Migration
{

    /**
     * @var FolderRepositoryInterface
     */
    private $folderRepository;
    /**
     * @var DiskRepositoryInterface
     */
    private $diskRepository;

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name'         => [
            'type' => 'anomaly.field_type.text',
        ],
        'slug'         => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name',
                'type'    => '_',
            ],

        ],
        'image'        => [
            'type'   => 'anomaly.field_type.image',
            'config' => [
                'folders' => ['galleries_images'],
            ],
        ],
        'description'  => [
            'type' => 'anomaly.field_type.textarea',
        ],
        'layout'       => [
            'type'   => 'anomaly.field_type.editor',
            'config' => [
                'default_value' => '{{  }}',
                'mode'          => 'twig',
            ],
        ],
        'type'         => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Signifymedia\GalleriesModule\Type\TypeModel',
            ],
        ],
    ];

    /**
     * SignifymediaModuleEmployeesCreateEmployeesFields constructor.
     * @param \Anomaly\FilesModule\Folder\Contract\FolderRepositoryInterface $folderRepository
     * @param \Anomaly\FilesModule\Disk\Contract\DiskRepositoryInterface $diskRepository
     */
    public function __construct(FolderRepositoryInterface $folderRepository, DiskRepositoryInterface $diskRepository)
    {
        $this->folderRepository = $folderRepository;
        $this->diskRepository = $diskRepository;
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ($disk = $this->diskRepository->findBySlug('local')) {
            if (!$this->folderRepository->findBySlug('galleries_images')) {
                $this->folderRepository->create([
                    'name'          => 'Fotogalerie',
                    'description'   => 'Složka pro fotky fotogalerií',
                    'slug'          => 'galleries_images',
                    'disk'          => $disk,
                    'allowed_types' => ['png', 'jpeg', 'jpg', 'gif'],
                ]);
            }
        }
    }
}
