$(document).ready(function () {
    table = $('#tsearch').DataTable({
        scrollX: true,
        cache: false,
        ajax: "",
        ajax: {
            url: "controller/addClasse.php",
            type: "POST",
            dataSrc: "",
            data: {
                "op": ""
            }
        },
        "columns": [{
                "data": "classe"
            }
        ]
    });

    var filiere = $("#filiere");
    $.ajax({
        url: 'controller/addFiliere.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option value="-1">Choisir une filiere</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].libelle + '">' + data[i].libelle + '</option>';
            }
            filiere.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    $('#btns').click(function () {
        var filiere = $("#filiere");
        if ($('#btns').text() === 'Rechercher') {
            if ($("#filiere").val() === '-1') {
                table.ajax.reload();
            } else {
                console.log($("#filiere").val());
                $.ajax({

                    url: 'controller/addClasse.php',
                    data: {op: 'findclasses', filiere: filiere.val()},
                    type: 'POST',
                    async: false,
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                        console.log(data[1].classe);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        }
        function remplir(data) {
            var contenu = $('#tablec2');
            var ligne = "";
            for (i = 0; i < data.length; i++) {
                ligne += '<tr><th scope="row">' + data[i].classe + '</th>';
            }
            contenu.html(ligne);
        }
    });





}
);



