<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\tests\validations;

use App\Entity\Visite;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Description of VisiteValidationsTest
 *
 * @author Monica Tevy Sen
 */
class VisiteValidationsTest extends KernelTestCase {
    
    public function getVisite(): Visite {
        return (new Visite())
                ->setVille('Nex York')
                ->setPays('USA');
        ;
    }
    
    public function testValidNoteVisite(){
        $this->assertErrors($this->getVisite()->setNote(0), 0, '0 note valide');
        $this->assertErrors($this->getVisite()->setNote(10), 0, '10 note valide');
        $this->assertErrors($this->getVisite()->setNote(20), 0, '20 note valide');
    }
    
    public function testNonValidNoteVisite() {
        $this->assertErrors($this->getVisite()->setNote(-6), 1, '-6 note non valide');
        $this->assertErrors($this->getVisite()->setNote(-1), 1, '-1 note non valide');
        $this->assertErrors($this->getVisite()->setNote(21), 1, '21 note non valide');
        $this->assertErrors($this->getVisite()->setNote(26), 1, '26 note non valide');
    }
    
    public function testValidTempmaxVisite() {
        $this->assertErrors($this->getVisite()->setTempmin(18)->setTempmax(20), 0, 'min=18 < max=20 valide');
        $this->assertErrors($this->getVisite()->setTempmin(17)->setTempmax(18), 0, 'min=17 < max=18 valide');
    }
    
    public function testNonValidTempmaxVisite() {
        $this->assertErrors($this->getVisite()->setTempmin(20)->setTempmax(11), 1, 'min=20 > max=11 non valide');
        $this->assertErrors($this->getVisite()->setTempmin(12)->setTempmax(12), 1, 'min=12 = max=12 non valide');
    }
    
    public function testValidDatecreationVisite(){
        $today = new \DateTime();
        $dateBefore = $today->sub(new \DateInterval('P10D'));
        $this->assertErrors($this->getVisite()->setDatecreation($today), 0, 'date(aujourd\'hui) valide');
        $this->assertErrors($this->getVisite()->setDatecreation($dateBefore), 0, 'date(antérieure) valide');
    }
    
    public function testNonValidDatecreationVisite(){
        $today = new \DateTime();
        $dayAfter = $today->add(new \DateInterval('P1D'));
        $dateAfter = $today->add(new \DateInterval('P10D'));
        $this->assertErrors($this->getVisite()->setDatecreation($dayAfter), 1, 'date(lendemain) non valide');
        $this->assertErrors($this->getVisite()->setDatecreation($dateAfter), 1, 'date(postérieure) non valide');
    }
    
    public function assertErrors(Visite $visite, int $nbErreursAttendues, string $message="") {
        self::bootKernel();
        $error = self::$container->get('validator')->validate($visite);
        $this->assertCount($nbErreursAttendues, $error, $message);
    }
}
