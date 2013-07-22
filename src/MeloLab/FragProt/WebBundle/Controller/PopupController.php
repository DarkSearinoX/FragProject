<?php

namespace MeloLab\FragProt\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/popup")
 * 
 */
class PopupController extends Controller
{
    /**
     * @Route("/jmol/{id}",name="fragprot_popup_jmol")
     * @Template()
     */
    public function jmolAction($id)
    {
        $fragment = $this->getDoctrine()->getRepository('MeloLabFragProtWebBundle:Fragment')->findOneById($id);
        
        return array('fragment'=>$fragment);
    }
    
}
