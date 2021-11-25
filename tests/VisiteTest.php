<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tests;

use App\Entity\Visite;
use App\Entity\Environnement;
use PHPUnit\Framework\TestCase;

/**
 * Description of VisiteTest
 *
 * @author Monica Tevy Sen
 */
class VisiteTest extends TestCase {
    
    public function testGetDateCreationString(){
        $visite = new Visite();
        $visite->setDatecreation(new \DateTime('2021-06-26'));
        $this->assertEquals('26/06/2021', $visite->getDatecreationString());
    }
    
    public function testAddEnvironnement(){
        $environnement = new Environnement();
        $environnement->setNom("plage");
        $visite = new Visite();
        $visite->addEnvironnement($environnement);
        $nbEnvironnementAvant = $visite->getEnvironnements()->count();
        $visite->addEnvironnement($environnement);
        $nbEnvironnementApres = $visite->getEnvironnements()->count();
        $this->assertEquals($nbEnvironnementAvant, $nbEnvironnementApres, "ajout même environnement devrait échouer");
    }
}
