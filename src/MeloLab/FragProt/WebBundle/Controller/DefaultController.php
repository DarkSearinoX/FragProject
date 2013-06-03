<?php

namespace MeloLab\FragProt\WebBundle\Controller;

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
     * @Route("/",name="fragprot_home")
     * @Template()
     */
    public function indexAction()
    {
        
        return array();
    }
}
