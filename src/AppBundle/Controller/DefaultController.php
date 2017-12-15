<?php
/**
 * Default controller class.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController.
 *
 * @package AppBundle\Controller
 * @link http://epi.uj.edu.pl
 * @author EPI UJ <epi@uj.edu.pl>
 * @copyright (c) 2016
 */
class DefaultController extends Controller
{
    /**
     * Template prefix
     *
     * @var $prefix
     */
    protected $prefix = 'default';

    /**
     * Index action.
     *
     * @Route("/")
     *
     * @param string $name Name
     * @return Response A Response instance
     */
    public function indexAction()
    {
        return $this->view('index');
    }
}
