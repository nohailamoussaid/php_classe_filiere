$(document).ready(function () {
        function getCountFrom(url, i) {
            $.ajax({
                url: url,
                data: {op: ''},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    $('h2[class="number"]').eq(i).text(data.length);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('h2[class="number"]').eq(i).text('...');
                }
            });
        }
        getCountFrom('controller/gestionClasse.php', 0);
        getCountFrom('controller/gestionFiliere.php', 1);
    });