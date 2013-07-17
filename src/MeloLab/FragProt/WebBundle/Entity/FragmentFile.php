<?php

namespace MeloLab\FragProt\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Fragment File
 * @ORM\Entity
 * @Vich\Uploadable
 */
class FragmentFile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Assert\File(maxSize="1M")
     * @Vich\UploadableField(mapping="fragment_pdb", fileNameProperty="fragmentPdbName")
     * @var File $fragment_pdb
     */
    protected $fragment_pdb;

    /**
     * @ORM\Column(type="string", length=255, name="pdb_name")
     *
     * @var string $pdbName
     */
    protected $pdbName;
    
    /**
     * @ORM\OneToOne(targetEntity="Fragment")
     * @ORM\JoinColumn(name="fragmentId", referencedColumnName="id")
     */
    private $fragment;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pdbName
     *
     * @param string $pdbName
     * @return FragmentFile
     */
    public function setPdbName($pdbName)
    {
        $this->pdbName = $pdbName;
    
        return $this;
    }

    /**
     * Get pdbName
     *
     * @return string 
     */
    public function getPdbName()
    {
        return $this->pdbName;
    }

    /**
     * Set fragment
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\Fragment $fragment
     * @return FragmentFile
     */
    public function setFragment(\MeloLab\FragProt\WebBundle\Entity\Fragment $fragment = null)
    {
        $this->fragment = $fragment;
    
        return $this;
    }

    /**
     * Get fragment
     *
     * @return \MeloLab\FragProt\WebBundle\Entity\Fragment 
     */
    public function getFragment()
    {
        return $this->fragment;
    }
}