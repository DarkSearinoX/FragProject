<?php

namespace FragProject\FragBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/")
 * 
 */
class DefaultController extends Controller
{
    /**
     * @Route("/fragprot",name="fragprot_home")
     * @Template()
     */
    public function indexAction()
    {
        
        return array();
    }
}
