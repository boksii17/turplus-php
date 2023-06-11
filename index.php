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
                  
                </tbody>
            </table>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>


   

</body>

</html>