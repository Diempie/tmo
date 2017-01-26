<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;




/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NieuwsRepository")
 * @ORM\Table(name="nieuws")
 */
class Nieuws
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string" , nullable=true)
     */
    public $titel;

    /**
     * @ORM\Column(type="string" , nullable=true)
     */
    public $img_thumbnail;


    /**
     * @ORM\Column(type="string" , nullable=true)
     */
    private $bericht;

    /**
     * @ORM\Column(type="string" , nullable=true)
     */
    private $url;



    /**
     * @return mixed
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->img_thumbnail;
    }

    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getBericht()
    {
        return $this->bericht;
    }


    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }





}