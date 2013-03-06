<?php

namespace FragProject\FragBundle\Entity;

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
    private $Chain;

    /**
     * @var integer
     *
     * @ORM\Column(name="Position", type="integer")
     */
    private $Position;

    /**
     * @var float
     *
     * @ORM\Column(name="TotalAsa", type="float")
     */
    private $TotalAsa;

    /**
     * @var float
     *
     * @ORM\Column(name="TotalAsaRel", type="float")
     */
    private $TotalAsaRel;

    /**
     * @var float
     *
     * @ORM\Column(name="SidechainAsa", type="float")
     */
    private $SidechainAsa;

    /**
     * @var float
     *
     * @ORM\Column(name="SidechainAsaRel", type="float")
     */
    private $SidechainAsaRel;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Chain
     *
     * @param string $chain
     * @return Residue
     */
    public function setChain($chain)
    {
        $this->Chain = $chain;
    
        return $this;
    }

    /**
     * Get Chain
     *
     * @return string 
     */
    public function getChain()
    {
        return $this->Chain;
    }

    /**
     * Set Position
     *
     * @param integer $position
     * @return Residue
     */
    public function setPosition($position)
    {
        $this->Position = $position;
    
        return $this;
    }

    /**
     * Get Position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->Position;
    }

    /**
     * Set TotalAsa
     *
     * @param float $totalAsa
     * @return Residue
     */
    public function setTotalAsa($totalAsa)
    {
        $this->TotalAsa = $totalAsa;
    
        return $this;
    }

    /**
     * Get TotalAsa
     *
     * @return float 
     */
    public function getTotalAsa()
    {
        return $this->TotalAsa;
    }

    /**
     * Set TotalAsaRel
     *
     * @param float $totalAsaRel
     * @return Residue
     */
    public function setTotalAsaRel($totalAsaRel)
    {
        $this->TotalAsaRel = $totalAsaRel;
    
        return $this;
    }

    /**
     * Get TotalAsaRel
     *
     * @return float 
     */
    public function getTotalAsaRel()
    {
        return $this->TotalAsaRel;
    }

    /**
     * Set SidechainAsa
     *
     * @param float $sidechainAsa
     * @return Residue
     */
    public function setSidechainAsa($sidechainAsa)
    {
        $this->SidechainAsa = $sidechainAsa;
    
        return $this;
    }

    /**
     * Get SidechainAsa
     *
     * @return float 
     */
    public function getSidechainAsa()
    {
        return $this->SidechainAsa;
    }

    /**
     * Set SidechainAsaRel
     *
     * @param float $sidechainAsaRel
     * @return Residue
     */
    public function setSidechainAsaRel($sidechainAsaRel)
    {
        $this->SidechainAsaRel = $sidechainAsaRel;
    
        return $this;
    }

    /**
     * Get SidechainAsaRel
     *
     * @return float 
     */
    public function getSidechainAsaRel()
    {
        return $this->SidechainAsaRel;
    }

    /**
     * Set aminoacid
     *
     * @param \FragProject\FragBundle\Entity\Aminoacid $aminoacid
     * @return Residue
     */
    public function setAminoacid(\FragProject\FragBundle\Entity\Aminoacid $aminoacid = null)
    {
        $this->aminoacid = $aminoacid;
    
        return $this;
    }

    /**
     * Get aminoacid
     *
     * @return \FragProject\FragBundle\Entity\Aminoacid 
     */
    public function getAminoacid()
    {
        return $this->aminoacid;
    }

    /**
     * Set dataset
     *
     * @param \FragProject\FragBundle\Entity\Dataset $dataset
     * @return Residue
     */
    public function setDataset(\FragProject\FragBundle\Entity\Dataset $dataset = null)
    {
        $this->dataset = $dataset;
    
        return $this;
    }

    /**
     * Get dataset
     *
     * @return \FragProject\FragBundle\Entity\Dataset 
     */
    public function getDataset()
    {
        return $this->dataset;
    }
}