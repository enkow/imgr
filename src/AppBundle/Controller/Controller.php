<?php
/**
 * Controller.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as Base;

/**
 * Class Controller.
 *
 * @package AppBundle\Controller
 */
class Controller extends Base
{
    /**
     * Template prefix
     *
     * @var $prefix
     */
    protected $prefix = null;

    /**
     * Render view
     *
     * @param string $template Name of rendered template
     * @param array  $data     Array of parameters passed to template
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     */
    protected function view($template, $data = [])
    {
        if (isset($this->prefix) && $this->prefix !== null) {
            $template = sprintf("%s/%s", $this->prefix, $template);
        }

        if (isset($data['form']) && is_object($data['form'])) {
            $data['form'] = $data['form']->createView();
        }

        return $this->render(
            sprintf('%s.html.twig', $template),
            $data
        );
    }
}
