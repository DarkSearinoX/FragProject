<?php

namespace FragProject\FragBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FragProject\FragBundle\Form\SequenceSearchType;

/**
 * 
 * @Route("/search")
 * 
 */
class SearchController extends Controller
{
    /**
     * @Route("/",name="fragprot_search_home")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/seq_search",name="fragprot_seq_search_home")
     * @Template()
     */
    public function seqSearchAction(Request $request)
    {
        $data = array();
        
        $data['sequence']='';
        
        $form = $this->createForm(new SequenceSearchType(), $data);
        
        if ($this->get('request')->isMethod('get') && $this->get('request')->get('PIDateRange')) {
            $form->bind($this->get('request'));
            $data['sequence'] = $form->get('sequence')->getData();
        }
        
        return array(
            'form'=>$form->createView()
        );
    }
    
}
