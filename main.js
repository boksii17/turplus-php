$('#dodajForm').submit(function(event){
    event.preventDefault();
    
    const $forma =$(this);
    const $unos = $forma.find('input, select, button');

    const serijalizacija = $forma.serialize();
    console.log(serijalizacija);

    $unos.prop('disabled', true); 

    
    zahtev = $.ajax({ 
        url: 'handler/dodaj.php',
        type:'post',
        data: serijalizacija
    });
    
    zahtev.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("Destinacija uspešno dodata");
            location.reload(true); 
        }else console.log("Destinacija nije dodata "+res );
    });

    zahtev.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeća greška se desila> '+textStatus, errorThrown)
    });
});


$('#btn-obrisi').click(function(){
    const oznacena = $('input[name=cekirana]:checked');
    
    zahtev = $.ajax({
        url: 'handler/obrisi.php',
        type:'post', 
        data: {'id':oznacena.val()}
    });
    
    zahtev.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
           oznacena.closest('tr').remove();
           console.log('Obrisana');
        }else {
        console.log("Destinacija nije obrisana "+res);
        }
        console.log(res);
    });

});


$('.btn-izmeni').click(function () {
    
    const oznacena = $('input[name=cekirana]:checked');
    
    zahtev = $.ajax({
        url: 'handler/pokupiInfo.php',
        type: 'post',
        dataType: "json",
        data: {'id': oznacena.val()}
    });
   
    zahtev.done(function (response, textStatus, jqXHR) {
        console.log('Popunjena');
        $('#naziv').val(response[0]['naziv']);
        console.log(response[0]['naziv']);

        $('#datum').val(response[0]['datum'].trim());
        console.log(response[0]['datum'].trim());

        $('#trajanje').val(response[0]['trajanje'].trim());
        console.log(response[0]['trajanje'].trim());

        $('#transport').val(response[0]['transport'].trim());
        console.log(response[0]['transport'].trim());

        $('#id').val(oznacena.val());

        console.log(response);
    });

   zahtev.fail(function (jqXHR, textStatus, errorThrown) {
       console.error('Desila se sledeća greška: ' + textStatus, errorThrown);
   });

});

$('#izmeniForm').submit(function (event) {
    event.preventDefault();
    console.log("Izmene");
    const $forma = $(this);
    const $unos = $forma.find('input, select, button');
    const serijalizacija = $forma.serialize();
    console.log(serijalizacija);
    $unos.prop('disabled', true);

    zahtev = $.ajax({
        url: 'handler/azuriraj.php',
        type: 'post',
        data: serijalizacija
      
    });
    
     zahtev.done(function(response, textStatus, jqXHR) {
       
          if (response ='Success') {
                console.log('Destinacija je izmenjena');
                alert('Destinacija je izmenjena');
                location.reload(true);
                $('#izmeniForm').reset;
            }
            else  {console.log('Destinacija nije izmenjena ' + response);
            alert('Destinacija nije izmenjena');
        }
            console.log(response);
        });
    

    zahtev.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Desila se sledeća greška: ' + textStatus, errorThrown);
    });

$('#izmeniDestinacijuModal').modal('hide'); 
});


$('#btnDodaj').submit(function () {
    $('#dodajDestinacijuModal').modal('toggle');
    return false;
});

$('.btnIzmeni').submit(function () {
    $('#izmeniDestinacijuModal').modal('toggle');
    return false;
});
$('#btnObrisi').submit(function () {
    $('#obrisiDestinacijuModal').modal('toggle');
    return false;
});