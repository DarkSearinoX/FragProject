<?php

namespace MeloLab\FragProt\WebBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MeloLab\FragProt\WebBundle\Entity\Aminoacid;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Load aminoacid data into the database.
 * @author Felipe Rodriguez <ferodriguez.mbl@gmail.com>
 */
class LoadAminoacidData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $em = $this->container->get('doctrine')->getManager();
        
        // Reset ID column
        $tableName = $em->getClassMetadata('MeloLabFragProtWebBundle:Aminoacid')->getTableName();
        $em->getConnection()->exec("ALTER TABLE $tableName AUTO_INCREMENT = 1;");

        /* 01 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Alanine');
        $e->setThreeLetterAminoacid('Ala');
        $e->setOneLetterAminoacid('A');
        $e->setHidrophCw(0.66);
        $e->setHidrophB(0.169);
        $manager->persist($e);
        
        
        /* 02 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Arginine');
        $e->setThreeLetterAminoacid('Arg');
        $e->setOneLetterAminoacid('R');
        $e->setHidrophCw(0.176);
        $e->setHidrophB(0);
        $manager->persist($e);
        
        /* 03 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Asparagine');
        $e->setThreeLetterAminoacid('Asn');
        $e->setOneLetterAminoacid('N');
        $e->setHidrophCw(0.306);
        $e->setHidrophB(0.257);
        $manager->persist($e);

        
        /* 04 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Aspartic Acid');
        $e->setThreeLetterAminoacid('Asp');
        $e->setOneLetterAminoacid('D');
        $e->setHidrophCw(0.433);
        $e->setHidrophB(0.099);
        $manager->persist($e);
        
        /* 05 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Cysteine');
        $e->setThreeLetterAminoacid('Cys');
        $e->setOneLetterAminoacid('C');
        $e->setHidrophCw(0.763);
        $e->setHidrophB(0.169);
        $manager->persist($e);
        
        /* 06 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Glutamine');
        $e->setThreeLetterAminoacid('Gln');
        $e->setOneLetterAminoacid('Q');
        $e->setHidrophCw(0.323);
        $e->setHidrophB(0.257);
        $manager->persist($e);
        
        /* 07 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Glutamic Acid');
        $e->setThreeLetterAminoacid('Glu');
        $e->setOneLetterAminoacid('E');
        $e->setHidrophCw(0.467);
        $e->setHidrophB(0.099);
        $manager->persist($e);
        
        /* 08 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Glycine');
        $e->setThreeLetterAminoacid('Gly');
        $e->setOneLetterAminoacid('G');
        $e->setHidrophCw(0.557);
        $e->setHidrophB(0.109);
        $manager->persist($e);
        
        /* 09 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Histidine');
        $e->setThreeLetterAminoacid('His');
        $e->setOneLetterAminoacid('H');
        $e->setHidrophCw(0);
        $e->setHidrophB(0.109);
        $manager->persist($e);
        
        /* 10 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Isoleucine');
        $e->setThreeLetterAminoacid('Ile');
        $e->setOneLetterAminoacid('I');
        $e->setHidrophCw(1);
        $e->setHidrophB(0.264);
        $manager->persist($e);
        
        /* 11 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Leucine');
        $e->setThreeLetterAminoacid('Leu');
        $e->setOneLetterAminoacid('L');
        $e->setHidrophCw(0.998);
        $e->setHidrophB(0.264);
        $manager->persist($e);
        
        /* 12 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Lysine');
        $e->setThreeLetterAminoacid('Lys');
        $e->setOneLetterAminoacid('K');
        $e->setHidrophCw(0.061);
        $e->setHidrophB(0);
        $manager->persist($e);
        
        /* 13 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Methionine');
        $e->setThreeLetterAminoacid('Met');
        $e->setOneLetterAminoacid('M');
        $e->setHidrophCw(0.846);
        $e->setHidrophB(0.169);
        $manager->persist($e);
        
        /* 14 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Phenilalanine');
        $e->setThreeLetterAminoacid('Phe');
        $e->setOneLetterAminoacid('F');
        $e->setHidrophCw(0.983);
        $e->setHidrophB(0.796);
        $manager->persist($e);
        
        /* 15 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Proline');
        $e->setThreeLetterAminoacid('Pro');
        $e->setOneLetterAminoacid('P');
        $e->setHidrophCw(0.768);
        $e->setHidrophB(0.169);
        $manager->persist($e);
        
        /* 16 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Serine');
        $e->setThreeLetterAminoacid('Ser');
        $e->setOneLetterAminoacid('S');
        $e->setHidrophCw(0.401);
        $e->setHidrophB(0.109);
        $manager->persist($e);

        /* 17 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Threonine');
        $e->setThreeLetterAminoacid('Thr');
        $e->setOneLetterAminoacid('T');
        $e->setHidrophCw(0.494);
        $e->setHidrophB(0.169);
        $manager->persist($e);
        
        /* 18 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Triptophane');
        $e->setThreeLetterAminoacid('Trp');
        $e->setOneLetterAminoacid('W');
        $e->setHidrophCw(0.914);
        $e->setHidrophB(1);
        $manager->persist($e);
        
        /* 19 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Tyrosine');
        $e->setThreeLetterAminoacid('Tyr');
        $e->setOneLetterAminoacid('Y');
        $e->setHidrophCw(0.682);
        $e->setHidrophB(0.87);
        $manager->persist($e);
        
        /* 20 */ 
        $e = new Aminoacid(); 
        $e->setFullName('Valine');
        $e->setThreeLetterAminoacid('Val');
        $e->setOneLetterAminoacid('V');
        $e->setHidrophCw(0.682);
        $e->setHidrophB(0.87);
        $manager->persist($e);
        
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder() {
        return 1; // the order in which fixtures will be loaded
    }    
}