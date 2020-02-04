<?php

class LikoviClass implements JsonSerializable {

    private $likID;
    private $film;
    private $nazivLika;
    private $nazivGlumca;
    private $ocena;

    /**
     * @return mixed
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @return mixed
     */
    public function getLikID()
    {
        return $this->likID;
    }

    /**
     * @return mixed
     */
    public function getNazivGlumca()
    {
        return $this->nazivGlumca;
    }

    /**
     * @return mixed
     */
    public function getNazivLika()
    {
        return $this->nazivLika;
    }

    /**
     * @return mixed
     */
    public function getOcena()
    {
        return $this->ocena;
    }

    /**
     * @param mixed $film
     */
    public function setFilm($film)
    {
        $this->film = $film;
    }

    /**
     * @param mixed $likID
     */
    public function setLikID($likID)
    {
        $this->likID = $likID;
    }

    /**
     * @param mixed $nazivGlumca
     */
    public function setNazivGlumca($nazivGlumca)
    {
        $this->nazivGlumca = $nazivGlumca;
    }

    /**
     * @param mixed $nazivLika
     */
    public function setNazivLika($nazivLika)
    {
        $this->nazivLika = $nazivLika;
    }

    /**
     * @param mixed $ocena
     */
    public function setOcena($ocena)
    {
        $this->ocena = $ocena;
    }

    public function pretraziPoFilmu(Mysqli $konekcija, $idFilma)
    {
        $upit = 'SELECT * FROM likovi l join film f on l.film_id = f.film_id where l.film_id = '.$idFilma;

        $rezultat = $konekcija->query($upit);
        $likovi = [];

        while($red = $rezultat->fetch_object()){
            $film = new FilmClass();
            $film->setFilmID($red->film_id);
            $film->setNazivFilma($red->naziv_filma);
            $film->setGodina($red->godina);
            $film->setOpis($red->opis);

            $lik = new LikoviClass();
            $lik->setFilm($film);
            $lik->setLikID($red->lik_id);
            $lik->setNazivGlumca($red->naziv_glumca);
            $lik->setNazivLika($red->naziv_lika);
            $lik->setOcena($red->ocena);

            $likovi[] = $lik;
        }

        return $likovi;
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

    public function sacuvaj(Mysqli $konekcija)
    {
        $upit = "INSERT INTO likovi(film_id,naziv_glumca,naziv_lika,ocena) VALUES (". $this->getFilm()->getFilmID() .", '" .$this->nazivGlumca . "','" . $this->nazivLika . "',". $this->ocena . ")";
        return $konekcija->query($upit);
    }

    public function vratiSve(Mysqli $konekcija)
    {
        $upit = 'SELECT * FROM likovi l join film f on l.film_id = f.film_id';

        $rezultat = $konekcija->query($upit);
        $likovi = [];

        while($red = $rezultat->fetch_object()){
            $film = new FilmClass();
            $film->setFilmID($red->film_id);
            $film->setNazivFilma($red->naziv_filma);
            $film->setGodina($red->godina);
            $film->setOpis($red->opis);

            $lik = new LikoviClass();
            $lik->setFilm($film);
            $lik->setLikID($red->lik_id);
            $lik->setNazivGlumca($red->naziv_glumca);
            $lik->setNazivLika($red->naziv_lika);
            $lik->setOcena($red->ocena);

            $likovi[] = $lik;
        }

        return $likovi;
    }

    public function obrisi(Mysqli $konekcija)
    {
        $upit = "DELETE FROM likovi where lik_id=". $this->getLikID();
        return $konekcija->query($upit);
    }

    public function izmeni(Mysqli $konekcija)
    {
        $upit = "UPDATE likovi SET ocena=" . $this->getOcena() . " where lik_id=". $this->getLikID();
        return $konekcija->query($upit);
    }
}