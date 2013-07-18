<?php

namespace MeloLab\FragProt\WebBundle\Controller;

use MeloLab\FragProt\WebBundle\Form\FragmentFileType;
use MeloLab\FragProt\WebBundle\Form\InformationSearchType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        
        $form = $this->createForm(new InformationSearchType());
        
        return array(
            'form'=>$form->createView()
        );
    }
    
    /**
     * @Route("/upload",name="fragprot_search_upload")
     * @Template()
     */
    public function searchUploadAction(Request $request)
    {
        $form = $this->createForm(new FragmentFileType);

        return array(
            'form'=>$form->createView()
        );
       
    }
    
    
    /**
     * @Route("/results",name="fragprot_search_results")
     * @Template()
     * @Method("POST")
     */
    public function showFragmentsAction(Request $request)
    {
        $data = array();
        
        if($this->get('request')->isMethod('post') && $this->get('request')->get('info_search')) {
        
            $form = $this->createForm(new InformationSearchType());
            $form->bind($this->get('request'));
            
            $data['dataset'] = $form->get('dataset')->getData();
            $data['sequence'] = $form->get('sequence')->getData();
            
            $fragments = array('1'=>'asdf','2'=>'qwer');
            
            return array(
                'fragments'=>$fragments,
             );
            
//            if($data['sequence'] = '')
//            {
//                echo "Nada llego";
//            }
            
        }
        else if($this->get('request')->isMethod('post') && $this->get('request')->get('file_search'))
        {
            $form = $this->createForm(new FragmentFileType());
            $form->bind($this->get('request'));
            
            $fragments = array('1'=>'asdf','2'=>'qwer');
            
            return array(
                'fragments'=>$fragments,
             );
        }
        else
        {
            return array('form'=>'null'); 
        }
                
    }
    
    

    
}
