<?php

class KorisnikUlogovan
{
    
    public $id;
   
    public $imejl;
    public $lozinka;

    
    public function __construct($id = null, $imejl = null, $lozinka = null)
    {
        $this->id = $id;
        $this->imejl = $imejl;
        $this->lozinka = $lozinka;
    }

    public static function ulogujKorisnika($korisnik, mysqli $conn)
    {
        $query = "SELECT * FROM users WHERE email='$korisnik->imejl' and password='$korisnik->lozinka'";
        return $conn->query($query);
    }
}
