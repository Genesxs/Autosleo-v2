var url = 'http://autosleo.local';

// This function get specify sparePart
function showSparepart(id){
    $.ajax({
        url: url+'/repuestos/'+id,
        type: 'GET',
        success: function(sparePart){
            if ((sparePart  == null) || (sparePart == undefined) || (sparePart.length == 0)) {
                alert("El repuesto no se encontró, refresque la página");
            } else {

            rep = JSON.parse(sparePart);
            
            $("#sparePartModal .modal-content .modal-header #image").prop("src", rep.image);
            $("#sparePartModal .modal-content #name").html(rep.name);
            $("#sparePartModal .modal-content .modal-body #description").html('Descripción: ' + rep.description);
            $("#sparePartModal").modal("show");

            }
        }, error: function (res) {
            console.log(res)
         }
    });
}