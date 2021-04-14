
$(document).ready( function () {
    table = $('#tableclasse').DataTable({
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
                "data": "id"
            },
            {
                "data": "classe"
            },
            {
                "data": "filiere"
            },
            {
                "render" : function (){ return '<button type="button" class="btn btn-outline-danger supprimerclasse">Supprimer</button>';}
            },
            {
                "render" : function (){ return '<button type="button" class="btn btn-outline-secondary modifierclasse">Modifier</button>';}
            }
        ]
    });
    
    $.ajax({
        url: 'controller/addClasse.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    $.ajax({
        url: 'controller/addFiliere.php',
        data: { op: "affiche"},
        type: 'POST',
        dataType: 'json',
        success: function (data, textStatus, jqXHR) {
            remplirSelect(data);
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(textStatus);
        }
        
    });
    
    $('#btn2').click(function () {
        var classe = $("#c");
        var filiere = $("#f");
        if ($('#btn2').text() == 'Ajouter') {
            $.ajax({
                url: 'controller/addClasse.php',
                data: {op: 'add', classe: classe.val(), filiere: filiere.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                    classe.val('');
                    filiere.val('Open this select menu');
                    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }

    });
    $(document).on('click', '#supprimer', function () {
        var id = $(this).closest('tr').find('th').text();
        $.ajax({
            url: 'controller/addClasse.php',
            data: {op: 'delete', id: id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                remplir(data);
                //console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
        
    });
    $(document).on('click', '#modifier', function () {
        var btn = $('#btn2');
        var id = $(this).closest('tr').find('th').text();
        var classe = $(this).closest('tr').find('td').eq(0).text();
        var filiere = $(this).closest('tr').find('td').eq(1).text();
        btn.text('Modifier');
        $("#c").val(classe);
        $("#f").val(filiere);
        $("#id").val(id);


        btn.click(function () {
            if ($('#btn2').text() == 'Modifier') {
                classe = $("#c").val();
                filiere = $("#f").val();
                $.ajax({
                    url: 'controller/addClasse.php',
                    data: {op: 'update', id: id, filiere: filiere , classe: classe},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                        $("#c").val('');
                        $("#f").val('Open this select menu');
                        btn.text('Ajouter');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        });
    });

    function remplir(data){

        var content = $("#tablec");
        var ligne = '';
        for(let i =0; i< data.length ; i++){
            ligne += '<tr><th scope="row">' + data[i].id + '</th>';
            ligne += '<td name="codec">' + data[i].classe + '</td>';
            ligne += '<td name="filiere">' + data[i].filiere + '</td>';
            ligne += '<td><button id="supprimer" type="button"' + 'name="' + data[i].id + '" class="btn btn-outline-danger supprimerclasse">Supprimer</button></td>';
            ligne += '<td><button id="modifier" type="button" class="btn btn-outline-secondary modifierclasse" name="' + data[i].filiere.id + '">Modifier</button></td></tr>';
    
        }
    
        content.html(ligne);
    };
    
    function remplirSelect(data){
        var content = $(".custom-select");
        var ligne = "<option>Open this select menu</option>";
        for(let i =0; i< data.length ; i++){
            ligne += '<option name="' + data[i].id + '">' + data[i].libelle + '</option>'
        }
    
        content.html(ligne);
    
    }
    
    function initialize(){
        $(".custom-select").children().each(function() {
            if(this.selected){
                select = $(this);
                select.attr('selected', false);
            }
        });
    }
    

});

