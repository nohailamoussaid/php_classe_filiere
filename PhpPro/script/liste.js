$(document).ready(function () {
    var filiere = $("#filiere");
    $.ajax({
        url: 'controller/gestionFiliere.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisi une filiere</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].abr + '">' + data[i].abr + '</option>';
                
            }
            filiere.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    $('#btn').click(function () {
        if ($('#btn').text() == 'Chercher') {
            
            
            $.ajax({
                url: 'controller/gestionClasse.php',
                data: {op: 'select', id_fil: filiere.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                    
                    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }
    });
     function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
            ligne += '<tr><th scope="row">' + data[i].id + '</th>';
            ligne += '<td>' + data[i].code + '</td>';
            ligne += '<td>' + data[i].nom + '</td>';
            ligne += '<td>' + data[i].id_fil + '</td>';
            
        }
        contenu.html(ligne);
    }
});


