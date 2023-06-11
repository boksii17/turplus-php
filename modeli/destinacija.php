<?php
class Destinacija
{
    public $id;
    public $naziv;
    public $datum;
    public $trajanje;
    public $transport;
    public $userid;

    public function __construct($id = null, $naziv = null, $datum = null, $trajanje = null, $transport = null, $userid = null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->datum = $datum;
        $this->trajanje = $trajanje;
        $this->transport = $transport;
        $this->userid = $userid;
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM destinacije";
        return $conn->query($query);
    }

    public static function getById($id, mysqli $conn)
    {
        $query = "SELECT * FROM destinacije WHERE id=$id";

        $myObj = array();
        if ($msqlObj = $conn->query($query)) {
            while ($red = $msqlObj->fetch_array(1)) { 
            }
        }

        return $myObj;
    }


    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM destinacije WHERE id=$this->id";
        return $conn->query($query);
    }

    public function update($id, mysqli $conn)
    {
        $query = "UPDATE destinacije set naziv = '$this->naziv',datum = '$this->datum'
       ,trajanje = '$this->trajanje',transport = '$this->transport' WHERE id='$id'";
        return $conn->query($query);
    }


    public static function add(Destinacija $destinacija, mysqli $conn)
    {
        $query = "INSERT INTO destinacije(naziv, datum, trajanje, transport,userid) VALUES('$destinacija->naziv','$destinacija->datum','$destinacija->trajanje','$destinacija->transport','$destinacija->userid')";
        return $conn->query($query);
    }
}
