<?php

namespace MeloLab\FragProt\WebBundle\Controller;

use MeloLab\FragProt\WebBundle\Classes\PDB2USR\PdbUsrTools;
use MeloLab\FragProt\WebBundle\Entity\FragmentFile;
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
    public function searchInformationAction()
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
    public function searchUploadAction()
    {
        $file = new FragmentFile();
        $form = $this->createForm(new FragmentFileType(),$file);

        return array(
            'form'=>$form->createView()
        );
       
    }
    
    /**
     * @Route("/results",name="fragprot_search_results")
     * @Template()
     * @Method("GET")
     */
    public function showFragmentsAction(Request $request)
    {
        $data = array();
        
        
        if($this->get('request')->isMethod('get') && $this->get('request')->get('info_search')) {
        
            $form = $this->createForm(new InformationSearchType());
            $form->bind($this->get('request'));
            
            //Start search engine ASDF
            $em = $this->getDoctrine()->getManager();
            $qb = $em->createQueryBuilder();
            $qb->select('f');
            $qb->from('MeloLabFragProtWebBundle:Fragment','f');
            
            //Filter by Dataset
            $data['dataset'] = $form->get('dataset')->getData();
//            
            $qb->leftJoin('f.dataset','d');
            $qb->where('d.id = :dataset');
            $qb->setParameter('dataset',$data['dataset']->getId());
            
            //Filter by sequence
            $data['sequence'] = $form->get('sequence')->getData();
            
            if($data['sequence']!='')
            {
                
                $qb->andWhere('f.sequence = :sequence');
                $qb->setParameter('sequence',$data['sequence']);
            }
            
            //Filter by pdb_code
            $data['pdb_code'] = $form->get('pdb_code')->getData();
            
            if($data['pdb_code']!='')
            {
                $qb->join('f.pdb','pdb');
                $qb->andWhere('pdb.fourLetterName = :pdb');
                $qb->setParameter('pdb', strtoupper($data['pdb_code']));
            }
            
            //Filter by init_pos
            $data['init_pos'] = $form->get('init_pos')->getData();
            
            if($data['init_pos']!='')
            {
                $qb->andWhere('f.initPos = :init_pos');
                $qb->setParameter('init_pos',$data['init_pos']);
            }
            
            //Filter by end_pos
            $data['end_pos'] = $form->get('end_pos')->getData();
            
            if($data['end_pos']!='')
            {
                $qb->andWhere('f.endPos = :end_pos');
                $qb->setParameter('end_pos',$data['end_pos']);
            }
            
            //Filter by chain
            $data['chain'] = $form->get('chain')->getData();
            
            if($data['chain']!='')
            {
                $qb->andWhere('f.chain = :chain');
                $qb->setParameter('chain',$data['chain']);
            }
            
            //Filter by group
            $data['group'] = $form->get('group')->getData();
            
            if($data['group']!='')
            {
                $qb->andWhere('f.group = :group');
                $qb->setParameter('group',$data['group']);
            }
//            
            $query = true;
            //Set KNP paginator
            $page = $this->get('request')->query->get('page', 1);
            $paginator = $this->get('knp_paginator');
            $fragments = $paginator->paginate(
                $qb->getQuery(),
                $page, /*page number*/
                30 /*limit per page*/
            );
            
//            var_dump($fragments);
            
        }
        else if($this->get('request')->isMethod('get') && $this->get('request')->get('file_search'))
        {
            $query = false;
            
            
            $fragmentFile = new FragmentFile();
            
            $form = $this->createForm(new FragmentFileType(),$fragmentFile);
            $form->bind($this->get('request'));
        
            $this->container->get('vich_uploader.storage')->upload($fragmentFile);
            
//            echo "aer";
//            echo "[".$fragmentFile->getFragmentPdb()."]";
//            echo "<".$fragmentFile->getFragmentPdbName().">";
//            
            //#### FUCKING VICH UPLOADER DOESNT WORK #####
            
            $em->persist($fragmentFile);
            $em->flush();
            
            //Call to PDB USR 
            $usrTools = new PdbUsrTools();
            $usr = $usrTools->convertUploadedFile($fragmentFile);
            
            $usrResults = array();
            //############## TO DO ##################

        }
               
        
        return array(
            'fragments'=>$fragments,
            'query'=>$query,
         );            
    }
}
