<?php
/**
 * Created by PhpStorm.
 * User: heshamelarj
 * Date: 1/29/20
 * Time: 8:47 PM
 */
namespace App\Traits;

trait Timestamps {

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\PrePersist()
     */
    public function createdAt(){
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }
    /**
     * @ORM\PreUpdate()
     */
    public function updatedAt(){
        $this->updatedAt = new \DateTime();
    }
}