var url = 'http://autosleo.local';

// This function get specify provider
function showProviders(id){

    $.ajax({
        url: url+'/proveedores/'+id,
        type: 'GET',
        success: function(provider){
            if ((provider == null) || (provider == undefined) || (provider.length == 0)) {
                alert("El Provedor no se encontró, refresque la página");
            } else {

            prov =  JSON.parse(provider);
            $("#providerModal .modal-content .modal-header #logo").prop("src", prov.logo);
            $("#providerModal .modal-content #name").html(prov.name);
            $("#providerModal .modal-content .modal-body #description").html('Descripción: ' + prov.description);
            $("#providerModal .modal-content .modal-body #email").html('Correo: ' + prov.email);
            $("#providerModal .modal-content .modal-body #page").html('Página: ' + prov.page);
            $("#providerModal").modal("show");

            }
        }, error: function (res) {
            console.log(res)
         }
    });
}

