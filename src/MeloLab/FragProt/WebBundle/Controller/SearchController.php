<?php

namespace MeloLab\FragProt\WebBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MeloLab\FragProt\WebBundle\Form\InformationSearchType;

/**
 * 
 * @Route("/search")
 * 
 */
class SearchController extends Controller
{
    /**
     * @Route("/",name="fragprot_search_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/information",name="fragprot_search_information")
     * @Template()
     */
    public function searchInformationAction(Request $request)
    {
        $data = array();
        
        $data['sequence']='';
        
        $form = $this->createForm(new InformationSearchType(), $data);
        
        return array(
            'form'=>$form->createView()
        );
    }
    
    /**
     * @Route("/results",name="fragprot_search_results")
     * @Template()
     */
    public function showFragmentsAction(Request $request)
    {
         $form = $this->createForm(new InformationSearchType(), $data);
        
        if ($this->get('request')->isMethod('get') && $this->get('request')->get('SequenceSearch')) {
            $form->bind($this->get('request'));
            $data['sequence'] = $form->get('sequence')->getData();
        }
        
        return array('form'=>null); 
    }
    
    
    /**
     * @Route("/upload",name="fragprot_search_upload")
     * @Template()
     */
    public function searchUploadAction(Request $request)
    {
       return array('form'=>null); 
    }
    
}
