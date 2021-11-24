<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Contact
 *
 * @author Monica Tevy Sen
 */
class Contact {
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $nom;
    
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;
    
    /**
     * @var string|null
     * @Assert\NotBlank()
     */
    private $message;
    
    function getNom(): ?string {
        return $this->nom;
    }

    function getEmail(): ?string {
        return $this->email;
    }

    function getMessage(): ?string {
        return $this->message;
    }

    function setNom(?string $nom) {
        $this->nom = $nom;
        return $this;
    }

    function setEmail(?string $email) {
        $this->email = $email;
        return $this;
    }

    function setMessage(?string $message) {
        $this->message = $message;
        return $this;
    }
}
