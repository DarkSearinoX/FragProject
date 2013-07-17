<?php

namespace MeloLab\FragProt\WebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fragment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Fragment
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
     * @ORM\Column(name="Sequence", type="string", length=255)
     */
    private $sequence;

    /**
     * @var string
     *
     * @ORM\Column(name="Array", type="string", length=255)
     */
    private $usrArray;

    /**
     * @var string
     *
     * @ORM\Column(name="Chain", type="string", length=255)
     */
    private $chain;

    /**
     * @var integer
     *
     * @ORM\Column(name="Group", type="integer")
     */
    private $group;

    /**
     * @var integer
     *
     * @ORM\Column(name="InitPos", type="integer")
     */
    private $initPos;

    /**
     * @var integer
     *
     * @ORM\Column(name="EndPos", type="integer")
     */
    private $endPos;

    /**
     * @var integer
     *
     * @ORM\Column(name="Size", type="integer")
     */
    private $size;

    /**
     * @var float
     *
     * @ORM\Column(name="RMSD", type="float")
     */
    private $rmsd;

    /**
     * @ORM\ManyToOne(targetEntity="Dataset", inversedBy="fragments")
     * @ORM\JoinColumn(name="datasetId", referencedColumnName="id")
     */
    private $dataset;

    /**
     * @ORM\ManyToOne(targetEntity="FullPDB", inversedBy="fragments")
     * @ORM\JoinColumn(name="pdbId", referencedColumnName="id")
     */
    private $pdb;
    
    /**
     * @ORM\ManyToOne(targetEntity="FragmentType", inversedBy="fragments")
     * @ORM\JoinColumn(name="fragmentTypeId", referencedColumnName="id")
     */
    private $fragmentType;


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
     * Set sequence
     *
     * @param string $sequence
     * @return Fragment
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
    
        return $this;
    }

    /**
     * Get sequence
     *
     * @return string 
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Set usrArray
     *
     * @param string $usrArray
     * @return Fragment
     */
    public function setUsrArray($usrArray)
    {
        $this->usrArray = $usrArray;
    
        return $this;
    }

    /**
     * Get usrArray
     *
     * @return string 
     */
    public function getUsrArray()
    {
        return $this->usrArray;
    }

    /**
     * Set chain
     *
     * @param string $chain
     * @return Fragment
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
     * Set group
     *
     * @param integer $group
     * @return Fragment
     */
    public function setGroup($group)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return integer 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set initPos
     *
     * @param integer $initPos
     * @return Fragment
     */
    public function setInitPos($initPos)
    {
        $this->initPos = $initPos;
    
        return $this;
    }

    /**
     * Get initPos
     *
     * @return integer 
     */
    public function getInitPos()
    {
        return $this->initPos;
    }

    /**
     * Set endPos
     *
     * @param integer $endPos
     * @return Fragment
     */
    public function setEndPos($endPos)
    {
        $this->endPos = $endPos;
    
        return $this;
    }

    /**
     * Get endPos
     *
     * @return integer 
     */
    public function getEndPos()
    {
        return $this->endPos;
    }

    /**
     * Set size
     *
     * @param integer $size
     * @return Fragment
     */
    public function setSize($size)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * Get size
     *
     * @return integer 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set rmsd
     *
     * @param float $rmsd
     * @return Fragment
     */
    public function setRmsd($rmsd)
    {
        $this->rmsd = $rmsd;
    
        return $this;
    }

    /**
     * Get rmsd
     *
     * @return float 
     */
    public function getRmsd()
    {
        return $this->rmsd;
    }

    /**
     * Set dataset
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\Dataset $dataset
     * @return Fragment
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
     * @return Fragment
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

    /**
     * Set fragmentType
     *
     * @param \MeloLab\FragProt\WebBundle\Entity\FragmentType $fragmentType
     * @return Fragment
     */
    public function setFragmentType(\MeloLab\FragProt\WebBundle\Entity\FragmentType $fragmentType = null)
    {
        $this->fragmentType = $fragmentType;
    
        return $this;
    }

    /**
     * Get fragmentType
     *
     * @return \MeloLab\FragProt\WebBundle\Entity\FragmentType 
     */
    public function getFragmentType()
    {
        return $this->fragmentType;
    }
}
