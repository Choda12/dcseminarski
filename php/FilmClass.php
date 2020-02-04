<?php

class FilmClass implements JsonSerializable {
    private $filmID;
    private $nazivFilma;
    private $godina;
    private $opis;

    /**
     * @return mixed
     */
    public function getFilmID()
    {
        return $this->filmID;
    }

    /**
     * @return mixed
     */
    public function getGodina()
    {
        return $this->godina;
    }

    /**
     * @return mixed
     */
    public function getNazivFilma()
    {
        return $this->nazivFilma;
    }

    /**
     * @return mixed
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * @param mixed $filmID
     */
    public function setFilmID($filmID)
    {
        $this->filmID = $filmID;
    }

    /**
     * @param mixed $godina
     */
    public function setGodina($godina)
    {
        $this->godina = $godina;
    }

    /**
     * @param mixed $nazivFilma
     */
    public function setNazivFilma($nazivFilma)
    {
        $this->nazivFilma = $nazivFilma;
    }

    /**
     * @param mixed $opis
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;
    }

    public function vratiFilmoveSortirane(Mysqli $konekcija, $sort)
    {
        $upit = 'SELECT * FROM film order by godina '.$sort;

        $rezultat = $konekcija->query($upit);
        $filmovi = [];

        while($red = $rezultat->fetch_object()){
            $film = new FilmClass();
            $film->setFilmID($red->film_id);
            $film->setNazivFilma($red->naziv_filma);
            $film->setGodina($red->godina);
            $film->setOpis($red->opis);
            $filmovi[] = $film;
        }

        return $filmovi;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}