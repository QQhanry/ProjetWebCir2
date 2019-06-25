<?php


class voyage
{

    private $libelle;
    private $description;
    private $duree;
    private $cout;
    private $reference;
    private $code_pays;
    //private $image;

    /**
     /* @return mixed
     */
   /* public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     
    public function setImage($image)
    {
        $this->image = $image;
    }
*/
    /**
     /* @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getCout()
    {
        return $this->cout;
    }

    /**
     * @param mixed $cout
     */
    public function setCout($cout)
    {
        $this->cout = $cout;
    }

    /**
     * @return mixed
     */

    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $ref
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getCodePays()
    {
        return $this->code_pays;
    }

    /**
     * @param mixed $code_pays
     */
    public function setCodePays($code_pays)
    {
        $this->code_pays = $code_pays;
    }


}

