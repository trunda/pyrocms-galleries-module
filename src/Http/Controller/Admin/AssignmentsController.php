<?php

namespace Signifymedia\GalleriesModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AssignmentsController as BaseAssignmentsController;

/**
 * Class AssignmentsController
 *
 * @package Signifymedia\GalleriesModule\Http\Controller\Admin
 */
class AssignmentsController extends BaseAssignmentsController
{

    /**
     * The streams namespace.
     *
     * @var string
     */
    protected $namespace = 'galleries';

}
