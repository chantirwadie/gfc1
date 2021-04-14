
$(document).ready(function () {
    table = $('#tfiliere').DataTable({
        scrollX: true,
        cache: false,
        ajax: "",
        ajax: {
            url: "controller/addFiliere.php",
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
                "data": "code"
            },
            {
                "data": "libelle"
            },
            {
                "render" : function (){ return '<button type="button" class="btn btn-outline-danger " id="supprimer" >Supprimer</button>';}
            },
            {
                "render" : function (){ return '<button type="button" class="btn btn-outline-secondary modifier">Modifier</button>';}
            }
        ]
    });
    $.ajax({
        url: 'controller/addFiliere.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            remplir(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
    
    
    
    
    $('#btn').click(function () {
        var code = $("#code");
        var libelle = $("#libelle");
        if ($('#btn').text() == 'Ajouter') {
            $.ajax({
                url: 'controller/addFiliere.php',
                data: {op: 'add', libelle: libelle.val(), code: code.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    remplir(data);
                    code.val('');
                    libelle.val('');
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
            url: 'controller/addFiliere.php',
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

    $(document).on('click', '.modifier', function () {
        var btn = $('#btn');
        
        var id = $(this).closest('tr').find('th').text();
        
        var code = $(this).closest('tr').find('td').eq(0).text();
        var libelle = $(this).closest('tr').find('td').eq(1).text();
        btn.text('Modifier');
        $("#code").val(code);
        $("#libelle").val(libelle);
        $("#id").val(id);


        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
                code = $("#code").val();
                libelle = $("#libelle").val();
                $.ajax({
                    url: 'controller/addFiliere.php',
                    data: {op: 'update', id: id, libelle: libelle , code: code},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                        $("#code").val('');
                        $("#libelle").val('');
                        btn.text('Ajouter');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        });
    });
    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
            ligne += '<tr><th scope="row"  value="' + data[i].id + '">' + data[i].id + '</th>';
            ligne += '<td  value="' + data[i].code + '">' + data[i].code + '</td>';
            ligne += '<td  value="' + data[i].libelle + '">' + data[i].libelle + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger " id="supprimer" >Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';
        }
        contenu.html(ligne);
    }

});