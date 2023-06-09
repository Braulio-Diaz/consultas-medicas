function validarArchivoExcel (){
    document.getElementById("archivo").addEventListener("change", () => {
        var filename = document.getElementById("archivo").value;
        var idxDot = filename.lastIndexOf(".") + 1;
        var extFile = filename.substr(idxDot, filename.length).toLowerCase();
        if (extFile == "xlsx" || extFile == "xlsb") {
            
        } else {
            Swal.fire("MENSAJE DE ADVERTENCIA",  "SOLO SE ACEPTAN ARCHIVOS TXT, SVC Y EXCEL - USTED SUBIÓ UN ARCHIVO CON EXTENSION " +extFile, "WARNING");
            document.getElementById("archivo").value="";
        } 
    });
}

function cargarExcel (){
    let archivo = document.getElementById("archivo").value;
    if (archivo.length == 0) {
        return Swal.fire("MENSAJE DE ADVERTENCIA", "SELECCIONE UN ARCHIVO", "WARNING");
    }
    let formData = new FormData();
    let excel = $("#archivo")[0].files[0];
    formData.append('excel',excel);
    $.ajax({
        url:'leer-archivo.php',
        type:'POST',
        data:formData,
        contentType:false,
        processData:false,
        success:function(resp){
            alert(resp);
        }
    });
    return false;
}