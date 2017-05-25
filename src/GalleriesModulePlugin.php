<?php
namespace Signifymedia\GalleriesModule;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Signifymedia\GalleriesModule\Gallery\Command\RenderGallery;

class GalleriesModulePlugin extends Plugin
{
    /**
     * Get the plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'gallery',
                function ($slug) {
                    return $this->dispatch(new RenderGallery($slug));
                }
            ),
        ];
    }
}