<?php

namespace FragProject\FragBundle\Entity;

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
    private $Sequence;

    /**
     * @var string
     *
     * @ORM\Column(name="Array", type="string", length=255)
     */
    private $Array;

    /**
     * @var string
     *
     * @ORM\Column(name="Chain", type="string", length=255)
     */
    private $Chain;

    /**
     * @var integer
     *
     * @ORM\Column(name="Group", type="integer")
     */
    private $Group;

    /**
     * @var integer
     *
     * @ORM\Column(name="InitPos", type="integer")
     */
    private $InitPos;

    /**
     * @var integer
     *
     * @ORM\Column(name="EndPos", type="integer")
     */
    private $EndPos;

    /**
     * @var integer
     *
     * @ORM\Column(name="Size", type="integer")
     */
    private $Size;

    /**
     * @var float
     *
     * @ORM\Column(name="RMSD", type="float")
     */
    private $RMSD;

    /**
     * @ORM\ManyToOne(targetEntity="Dataset", inversedBy="fragments")
     * @ORM\JoinColumn(name="datasetId", referencedColumnName="id")
     */
    private $dataset;
    
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
     * Set Sequence
     *
     * @param string $sequence
     * @return Fragment
     */
    public function setSequence($sequence)
    {
        $this->Sequence = $sequence;
    
        return $this;
    }

    /**
     * Get Sequence
     *
     * @return string 
     */
    public function getSequence()
    {
        return $this->Sequence;
    }

    /**
     * Set Array
     *
     * @param string $array
     * @return Fragment
     */
    public function setArray($array)
    {
        $this->Array = $array;
    
        return $this;
    }

    /**
     * Get Array
     *
     * @return string 
     */
    public function getArray()
    {
        return $this->Array;
    }

    /**
     * Set Chain
     *
     * @param string $chain
     * @return Fragment
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
     * Set Group
     *
     * @param integer $group
     * @return Fragment
     */
    public function setGroup($group)
    {
        $this->Group = $group;
    
        return $this;
    }

    /**
     * Get Group
     *
     * @return integer 
     */
    public function getGroup()
    {
        return $this->Group;
    }

    /**
     * Set InitPos
     *
     * @param integer $initPos
     * @return Fragment
     */
    public function setInitPos($initPos)
    {
        $this->InitPos = $initPos;
    
        return $this;
    }

    /**
     * Get InitPos
     *
     * @return integer 
     */
    public function getInitPos()
    {
        return $this->InitPos;
    }

    /**
     * Set EndPos
     *
     * @param integer $endPos
     * @return Fragment
     */
    public function setEndPos($endPos)
    {
        $this->EndPos = $endPos;
    
        return $this;
    }

    /**
     * Get EndPos
     *
     * @return integer 
     */
    public function getEndPos()
    {
        return $this->EndPos;
    }

    /**
     * Set Size
     *
     * @param integer $size
     * @return Fragment
     */
    public function setSize($size)
    {
        $this->Size = $size;
    
        return $this;
    }

    /**
     * Get Size
     *
     * @return integer 
     */
    public function getSize()
    {
        return $this->Size;
    }

    /**
     * Set RMSD
     *
     * @param float $rMSD
     * @return Fragment
     */
    public function setRMSD($rMSD)
    {
        $this->RMSD = $rMSD;
    
        return $this;
    }

    /**
     * Get RMSD
     *
     * @return float 
     */
    public function getRMSD()
    {
        return $this->RMSD;
    }

    /**
     * Set dataset
     *
     * @param \FragProject\FragBundle\Entity\Dataset $dataset
     * @return Fragment
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

    /**
     * Set fragmentType
     *
     * @param \FragProject\FragBundle\Entity\FragmentType $fragmentType
     * @return Fragment
     */
    public function setFragmentType(\FragProject\FragBundle\Entity\FragmentType $fragmentType = null)
    {
        $this->fragmentType = $fragmentType;
    
        return $this;
    }

    /**
     * Get fragmentType
     *
     * @return \FragProject\FragBundle\Entity\FragmentType 
     */
    public function getFragmentType()
    {
        return $this->fragmentType;
    }
}