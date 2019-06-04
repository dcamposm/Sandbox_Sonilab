function formTable(){
    //alert($(this).attr('type'));
    if ($(this).attr('type') == 'button'){
        var content = $(this).parent().next();

        var value = content.text();
        var id = content.attr('id');
        var idArray = id.split("-");
        //alert(content.attr('id'));
        if (idArray[1] == 'S'){
            var select = document.createElement("select");

            if (idArray[2] == 'P') {
                $(select).attr("name", "id_"+idArray[0]);
                $(select).attr("id", "id_"+idArray[0]);
            } else {
                $(select).attr("name", idArray[0]);
                $(select).attr("id", idArray[0]);
            }
            $(select).attr("class", "form-control");

            if (idArray[0] == 'estat'){
                $(select).append('<option value="Pendent"'+("Pendent" == registre[idArray[0]] ? "selected" : "")+'>Pendent</option>');
                $(select).append('<option value="Finalitzada"'+("Finalitzada" == registre[idArray[0]] ? "selected" : "")+'>Finalitzada</option>');
                $(select).append('<option value="Cancel·lada"'+("Cancel·lada" == registre[idArray[0]] ? "selected" : "")+'>Cancel·lada</option>');
            } else if (idArray[0] == 'retakes'){ 
                $(select).append('<option value="No"'+("No" == registre[idArray[0]] ? "selected" : "")+'>No</option>');
                $(select).append('<option value="Si"'+("Si" == registre[idArray[0]] ? "selected" : "")+'>Sí</option>');
                $(select).append('<option value="Fet"'+("Fet" == registre[idArray[0]] ? "selected" : "")+'>Fet</option>');
            } else if (idArray[0] == 'inserts'){ 
                $(select).append('<option value="No cal fer"'+("No cal fer" == registre[idArray[0]] ? "selected" : "")+'>No cal fer</option>');
                $(select).append('<option value="Cal fer"'+("Cal fer" == registre[idArray[0]] ? "selected" : "")+'>Cal fer</option>');
                $(select).append('<option value="Fet"'+("Fet" == registre[idArray[0]] ? "selected" : "")+'>Fet</option>');
            } /*else if (idArray[0] == 'id_registre_entrada'){
                
                $.each(regEntrada, function( key, entrada ) {
                    $(select).append('<option value="'+entrada['id_registre_entrada']+'"'+(entrada['id_registre_entrada'] == registre[idArray[0]] ? "selected" : "")+'>'+entrada['id_registre_entrada']+' '+entrada['titol']+'</option>');
                });
            }*/ else if (idArray[2] == 'P'){ 
                $(select).append('<option></option>');
                $.each(empleatsCarrec, function( key, empleat ) {
                    $.each(empleat['carrec'], function( key1, carrec ) {
                        if (idArray[0] == 'tecnic_mix'){
                            if (carrec['id_tarifa'] == 3 || carrec['id_tarifa'] == 4){
                                $(select).append('<option value="'+empleat['id_empleat']+'" '+(empleat['id_empleat'] == (empleats.hasOwnProperty(idArray[0]) ? empleats[idArray[0]].id_empleat : '') ? "selected" : "")+'>'+empleat.nom_empleat+' '+empleat.cognom1_empleat+' '+empleat.cognom2_empleat+'</option>');
                                return false;
                            }
                        } else if (idArray[0] == 'director') {
                            if (carrec['id_tarifa'] == 1 || carrec['id_tarifa'] == 2){
                                $(select).append('<option value="'+empleat['id_empleat']+'" '+(empleat['id_empleat'] == (empleats.hasOwnProperty(idArray[0]) ? empleats[idArray[0]].id_empleat : '') ? "selected" : "")+'>'+empleat.nom_empleat+' '+empleat.cognom1_empleat+' '+empleat.cognom2_empleat+'</option>');
                                return false;
                            }
                        } else if (idArray[0] == 'linguista') {
                            if (carrec['id_tarifa'] == 14){
                                $(select).append('<option value="'+empleat['id_empleat']+'" '+(empleat['id_empleat'] == (empleats.hasOwnProperty(idArray[0]) ? empleats[idArray[0]].id_empleat : '') ? "selected" : "")+'>'+empleat.nom_empleat+' '+empleat.cognom1_empleat+' '+empleat.cognom2_empleat+'</option>');
                                return false;
                            }
                        } else if (idArray[0] == 'ajustador') {
                            if (carrec['id_tarifa'] == 13){
                                $(select).append('<option value="'+empleat['id_empleat']+'" '+(empleat['id_empleat'] == (empleats.hasOwnProperty(idArray[0]) ? empleats[idArray[0]].id_empleat : '') ? "selected" : "")+'>'+empleat.nom_empleat+' '+empleat.cognom1_empleat+' '+empleat.cognom2_empleat+'</option>');
                                return false;
                            }
                        } else if (idArray[0] == 'traductor') {
                            if (carrec['id_tarifa'] == 12){
                                $(select).append('<option value="'+empleat['id_empleat']+'" '+(empleat['id_empleat'] == (empleats.hasOwnProperty(idArray[0]) ? empleats[idArray[0]].id_empleat : '') ? "selected" : "")+'>'+empleat.nom_empleat+' '+empleat.cognom1_empleat+' '+empleat.cognom2_empleat+'</option>');
                                return false;
                            }
                        }
                    });
                });
            } else {
                $(select).append('<option value="0"'+("0" == registre[idArray[0]] ? "selected" : "")+'></option>');
                $(select).append('<option value="1"'+("1" == registre[idArray[0]] ? "selected" : "")+'>FET</option>');
            }              
            /*<td class="col"></td>*/
            content.text('');
            content.append(select);
        } else if (idArray[1] == 'D'){
            content.text('');
            content.append('<input type="date" name="'+idArray[0]+'" id="'+idArray[0]+'" class="form-control" value="'+(!registre[idArray[0]] ? '' : registre[idArray[0]].split(' ')[0])+'">');
        }else if (idArray[1] == 'N') {
            content.text('');
            content.append('<input type="number" name="'+idArray[0]+'" id="'+idArray[0]+'" class="form-control" value="'+value+'">');
        } else if (idArray[1] == 'I') {
            if (idArray[0] == 'id_registre_entrada'){
                content.text('');
                content.append('<input id="searchEntrada" name="'+idArray[0]+'" class="form-control" value="'+registre[idArray[0]]+'"/>');

                $.each(regEntrada, function( key, entrada ) {
                    if (entrada['id_registre_entrada'] == registre[idArray[0]]) {
                       $("#searchEntrada").val(entrada['id_registre_entrada']+" "+entrada['titol']);   
                    }
                });

                var options = {
                    url:  rutaSearchEntrada,

                    getValue: "referencia_titol",

                    list: {
                            match: {
                                enabled: true
                            }, onChooseEvent: function() {
                                var selectedPost = $("#searchEntrada").getSelectedItemData();
                                $('#searchEntrada').attr("value", selectedPost.id_registre_entrada);
                                $('#searchEntrada').addClass("is-valid");
                                $("#searchEntrada").val(selectedPost.id_registre_entrada+" "+selectedPost.titol).trigger("change");
                            }
                    },

                    template: {
                            type: "custom",
                            method: function(value, item) {
                                    return value;
                            }
                    }
                };

                $("#searchEntrada").easyAutocomplete(options);
            } else if (idArray[2] == 'P'){ 
                if (idArray[0] == 'traductor') {
                    content.text('');
                    content.append('<input id="searchTraductor" name="'+idArray[0]+'" class="form-control" value="'+empleats[idArray[0]].id_empleat+'"/>');
                    
                    $.each(empleatsCarrec, function( key, empleat ) {
                        $.each(empleat['carrec'], function( key1, carrec ) {
                            if (empleat['id_empleat'] == empleats[idArray[0]].id_empleat) {
                                $("#searchTraductor").val(empleat.nom_empleat+' '+empleat.cognom1_empleat+' '+empleat.cognom2_empleat);
                            }
                        });
                    });
                    
                    var options = {
                    url:  rutaSearchTraductor,

                    getValue: "nom_cognom",

                    list: {
                            match: {
                                enabled: true
                            }, onChooseEvent: function() {
                                var selectedPost = $("#searchTraductor").getSelectedItemData();
                                $('#searchTraductor').attr("value", selectedPost.id_empleat);
                                $('#searchTraductor').addClass("is-valid");
                                $("#searchTraductor").val(selectedPost.nom_cognom).trigger("change");
                            }
                    },

                    template: {
                            type: "custom",
                            method: function(value, item) {
                                    return value;
                            }
                    }
                };

                $("#searchTraductor").easyAutocomplete(options);
                }
            }  
        }  else {
            content.text('');
            content.append('<input type="text" name="'+idArray[0]+'" id="'+idArray[0]+'" class="form-control" value="'+value+'">');
        }
        //alert(textArray[0]);
        $('#botoTornar').attr('href', '#');
        $('#botoTornar').attr('data-toggle', 'modal');
        $('#botoTornar').attr('data-target', '#modalTornar');
        setEventsValidator();
        $('#botonForm').show();
    }
};
$('button').click(formTable);
//----------------Funcions per validar els camps----------------
function setEventsValidator(){
    $('input').change(validarInput);
    $('input').keyup(validarInput);
    $('select').change(validarSelect);

    function validarInput(){
        console.log($(this).attr('id'));
        if ($(this).attr('type') == 'number') {
            var pattern = /^\d*$/;
            if ($(this).val() == ''){
                removeValid(this);
            } else {
                if (pattern.test($(this).val())){
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                } else {
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                }
            }
        } else if ($(this).attr('type') == 'text'){
            var pattern = /^\w*$/;
            if ($(this).val() == ''){
                removeValid(this);
            } else {
                if (pattern.test($(this).val())){
                    $(this).removeClass("is-invalid");
                    $(this).addClass("is-valid");
                } else {
                    $(this).removeClass("is-valid");
                    $(this).addClass("is-invalid");
                }
            }
        } else if ($(this).attr('type') == 'date'){
            if ($(this).val() == ''){
                removeValid(this);
            } else {
                $(this).addClass("is-valid");
            }
        }
    }

    function validarSelect(){
        //console.log($(this).children(":selected").val());
        if ($(this).children(":selected").val() == '' || $(this).children(":selected").val() == '0'){
            removeValid(this);
        } else {
            $(this).addClass("is-valid");
        }
    }

    function removeValid(input){
        //console.log(input);
        $(input).removeClass("is-valid");
        $(input).removeClass("is-invalid");
    } 
}
