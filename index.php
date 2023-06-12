<?php

require 'config.php';
require 'modeli/destinacija.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$podaci = Destinacija::getAll($conn);
if (!$podaci) {
    echo "Nastala je greška pri preuzimanju podataka";
    die();
}

$rezultat = mysqli_query($conn, "SELECT * FROM destinacije");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>

<nav class="navbar navbar-light" style="background-color: #98c8a0;">
    <div class="container-fluid">
        <div style="display: flex; align-items: center;">
            <img src="slike/airplane.png" alt="Logo" style="width: 70px; height: 70px; margin-right: 10px;">
            <h1 style="margin: 0;">TurPlus</h1>
        </div>
        <div style="display: flex; align-items: right;">
            <input type="text" id="mojInput" onkeyup="pretrazi()" placeholder="Pretraži destinacije.." title="Upiši naziv">
            <a href="logout.php" class="btn btn-secondary" style="min-width: 90px; border-radius: 8px; border: none;">Odjavi se</a>
        </div>
    </div>
</nav>

    <br>
   
    <br>
    <div class="container " >
        <div class="table-wrapper" >
            <div class="table-title" >
                <div class="row" >
                    <div class="col-sm-6" >
                        <h2>Upravljaj <b>destinacijama</b></h2>
                    </div>
                    <div class="col-sm-6">
                    <button id="btn-sortiraj" class="btn btn-normal" onclick="sortirajTabelu()" style="background-color: #88c492;">Sortiraj</button>
                    <button id="btn-dodaj" data-bs-target="#dodajDestinacijuModal" class="btn btn-second" data-bs-toggle="modal" style="background-color: #88c492;"> <span>Dodaj novu destinaciju</span></button>
                    <button type="button" data-bs-target="#obrisiDestinacijuModal" class="btn btn-second" data-bs-toggle="modal" style="background-color: #88c492;"> <span>Obriši</span></button>
                    </div>
                </div>
            </div>

            <table id="mojaTabela" class="table table-striped table-hover">
                <thead class="thead">
                    <tr>
                        <th>Selektuj</th>
                        <th>Naziv</th>
                        <th>Datum polaska</th>
                        <th>Trajanje</th>
                        <th>Transport</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    while ($red = mysqli_fetch_array($rezultat)) { //čita iz baze sve dok ima šta (dokle god red nije prazan)
                    ?>
                        <tr>
                            <td>
                                <label class="form-check-label">
                                    <input type="checkbox" name="cekirana" value="<?php echo $red['id']; ?> ">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td><?php echo $red["naziv"]; ?></td>
                            <td><?php echo $red["datum"]; ?></td>
                            <td><?php echo $red["trajanje"]; ?></td>
                            <td><?php echo $red["transport"]; ?></td>
                            <td>
                            <a href="#izmeniDestinacijuModal" class="edit" data-bs-toggle="modal"><i class="btn-izmeni material-icons" data-bs-toggle="tooltip" title="Izmeni" style="color: #88c492;">&#xE254;</i></a>
                            <a href="#obrisiDestinacijuModal" class="delete" data-bs-toggle="modal"><i class="material-icons" data-bs-toggle="tooltip" title="Obriši" style="color: #88c492;">&#xE872;</i></a>
                            </td>
                        </tr>
                    <?php
                    
                } //zatvaranje while petlje otvorene na liniji 111

                ?>
                <?php

                //zatvori konekciju sa bazom
                mysqli_close($conn);
                ?>
                  
                </tbody>
            </table>

        </div>
    </div>

     <!-- Dodaj Modal HTML -->
     <div id="dodajDestinacijuModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="#" id="dodajForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Dodaj destinaciju</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Naziv</label>
                            <input type="text" class="form-control" name="naziv" placeholder="Unesi naziv" required style="border-radius: 7px;">
                        </div>
                        <div class="form-group">
                            <label>Datum</label>
                            <input type="datetime-local" class="form-control" name="datum" placeholder="Unesi datum" required style="border-radius: 7px;">
                        </div>
                        <div class="form-group">
                            <label>Trajanje</label>
                            <input type="text" class="form-control" name="trajanje" placeholder="Unesi trajanje" required style="border-radius: 7px;">
                        </div>
                        <div class="form-group">
                            <label>Transport</label>
                            <input type="text" class="form-control" name="transport" placeholder="Unesi vrstu transporta" required style="border-radius: 7px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Otkaži">
                        <button id="btnDodaj" type="submit" class="btn" style="background-color: #62d78f; border-radius: 7px;">Dodaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Izmeni Modal HTML -->
    <div id="izmeniDestinacijuModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="izmeniForm" method="post" action="#">
                    <div class="modal-header">
                        <h4 class="modal-title">Izmeni destinaciju</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Id</label>
                            <input id="id" class="form-control" name="id" value="" type="text" readonly style="border-radius: 7px;">
                        </div>
                        <div class="form-group">
                            <label>Naziv</label>
                            <input id="naziv" type="text" class="form-control" name="naziv" value="" required style="border-radius: 7px;">
                        </div>
                        <div class="form-group">
                            <label>Datum</label>
                            <input id="datum" class="form-control" name="datum" value="" type="datetime-local" required style="border-radius: 7px;">

                        </div>
                        <div class="form-group">
                            <label>Trajanje</label>
                            <input id="trajanje" class="form-control" name="trajanje" value="" type="text" required style="border-radius: 7px;">
                        </div>
                        <div class="form-group">
                            <label>Transport</label>
                            <input id="transport" class="form-control" name="transport" value="" type="text" required style="border-radius: 7px;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Otkaži">
                        <button id="btnIzmeni" type="submit" class="btn" style="background-color: #62d78f; border-radius: 7px;">Sačuvaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <!-- Obriši Modal HTML -->
     <div id="obrisiDestinacijuModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="post" id="obrisiForm">
                    <div class="modal-header">
                        <h4 class="modal-title">Obriši destinaciju</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Da li ste sigurni da želite da obrišete ovo?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Otkaži">
                        <button id="btn-obrisi" formmethod="POST" class="btn" style="background-color: #62d78f; border-radius: 7px;">Obriši</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>


   

</body>

</html>