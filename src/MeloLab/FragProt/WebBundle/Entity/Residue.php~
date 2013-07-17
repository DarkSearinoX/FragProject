<?php

namespace MeloLab\FragProt\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Residue
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Residue
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
     * @var string
     *
     * @ORM\Column(name="Chain", type="string", length=255)
     */
    private $chain;

    /**
     * @var integer
     *
     * @ORM\Column(name="Position", type="integer")
     */
    private $position;

    /**
     * @var float
     *
     * @ORM\Column(name="TotalAsa", type="float")
     */
    private $totalAsa;

    /**
     * @var float
     *
     * @ORM\Column(name="TotalAsaRel", type="float")
     */
    private $totalAsaRel;

    /**
     * @var float
     *
     * @ORM\Column(name="SidechainAsa", type="float")
     */
    private $sidechainAsa;

    /**
     * @var float
     *
     * @ORM\Column(name="SidechainAsaRel", type="float")
     */
    private $sidechainAsaRel;

    /**
     * @ORM\ManyToOne(targetEntity="Aminoacid", inversedBy="residues")
     * @ORM\JoinColumn(name="aminoacidId", referencedColumnName="id")
     */
    private $aminoacid;

    /**
     * @ORM\ManyToOne(targetEntity="Dataset", inversedBy="residues")
     * @ORM\JoinColumn(name="datasetId", referencedColumnName="id")
     */
    private $dataset;

    /**
     * @ORM\ManyToOne(targetEntity="FullPDB", inversedBy="residues")
     * @ORM\JoinColumn(name="pdbId", referencedColumnName="id")
     */
    private $pdb;
    


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
     * Set chain
     *
     * @param string $chain
     * @return Residue
     */
    public function setChain($chain)
    {
        $this->chain = $chain;
    
        return $this;
    }

    /**
     * Get chain
     *
     * @return string 
     */
    public function getChain()
    {
        return $this->chain;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Residue
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set totalAsa
     *
     * @param float $totalAsa
     * @return Residue
     */
    public function setTotalAsa($totalAsa)
    {
        $this->totalAsa = $totalAsa;
    
        return $this;
    }

    /**
     * Get totalAsa
     *
     * @return float 
     */
    public function getTotalAsa()
    {
        return $this->totalAsa;
    }

    /**
     * Set totalAsaRel
     *
     * @param float $totalAsaRel
     * @return Residue
     */
    public function setTotalAsaRel($totalAsaRel)
    {
        $this->totalAsaRel = $totalAsaRel;
    
        return $this;
    }

    /**
     * Get totalAsaRel
     *
     * @return float 
     */
    public function getTotalAsaRel()
    {
        return $this->totalAsaRel;
    }

    /**
     * Set sidechainAsa
     *
     * @param float $sidechainAsa
     * @return Residue
     */
    public function setSidechainAsa($sidechainAsa)
    {
        $this->sidechainAsa = $sidechainAsa;
    
        return $this;
    }

    /**
     * Get sidechainAsa
     *
     * @return float 
     */
    public function getSidechainAsa()
    {
        return $this->sidechainAsa;
    }

    /**
     * Set sidechainAsaRel
     *
     * @param float $sidechainAsaRel
     * @return Residue
     */
    public function setSidechainAsaRel($sidechainAsaRel)
    {
        $this->sidechainAsaRel = $sidechainAsaRel;
    
        return $this;
    }

    /**
     * Get sidechainAsaRel
     *
     * @return float 
     */
    public function getSidechainAsaRel()
    {
        return $this->sidechainAsaRel;
    }

    /**
     * Set aminoacid
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\Aminoacid $aminoacid
     * @return Residue
     */
    public function setAminoacid(\MeloLab\FragProt\WebBundle\Entity\Aminoacid $aminoacid = null)
    {
        $this->aminoacid = $aminoacid;
    
        return $this;
    }

    /**
     * Get aminoacid
     *
     * @return \MeloLab\FragProt\WebBundle\Entity\Aminoacid 
     */
    public function getAminoacid()
    {
        return $this->aminoacid;
    }

    /**
     * Set dataset
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\Dataset $dataset
     * @return Residue
     */
    public function setDataset(\MeloLab\FragProt\WebBundle\Entity\Dataset $dataset = null)
    {
        $this->dataset = $dataset;
    
        return $this;
    }

    /**
     * Get dataset
     *
     * @return \MeloLab\FragProt\WebBundle\Entity\Dataset 
     */
    public function getDataset()
    {
        return $this->dataset;
    }

    /**
     * Set pdb
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\FullPDB $pdb
     * @return Residue
     */
    public function setPdb(\MeloLab\FragProt\WebBundle\Entity\FullPDB $pdb = null)
    {
        $this->pdb = $pdb;
    
        return $this;
    }

    /**
     * Get pdb
     *
     * @return \MeloLab\FragProt\WebBundle\Entity\FullPDB 
     */
    public function getPdb()
    {
        return $this->pdb;
    }
}
