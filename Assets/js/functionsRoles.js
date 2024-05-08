var tableRoles;
document.addEventListener('DOMContentLoaded', function(){

        tableRoles = $('#tableRoles').dataTable( {
            "aProcessing":true,
            "aServerSide":true,
            "language": {
                url: " "+base_url+"Assets/js/es-ES.json",
            },
            "ajax":{
                "url": " "+base_url+"Roles/getRoles",
                "dataSrc":""
            },
            "columns":[
                {"data":"idrol"},
                {"data":"nombrerol"},
                {"data":"descripcion"},
                {"data":"status"},
                {"data":"acciones"}
            ],
            "resonsieve":true,
            "bDestroy": true,
            "iDisplayLength": 10,
            "order":[[0,"desc"]]  
        });
    

    //NUEVO ROL
    var formRol = document.querySelector("#formRol");
    formRol.onsubmit = function(e) {
        e.preventDefault();

        var intIdRol = document.querySelector('#idRol').value;
        var strNombre = document.querySelector('#txtNombre').value;
        var strDescripcion = document.querySelector('#txtDescripcion').value;
        var intStatus = document.querySelector('#listStatus').value;        
        if(strNombre == '' || strDescripcion == '' || intStatus == '')
        {
            Swal.fire({
                title:"Atención",
                text: "Todos los campos son obligatorios." ,
                icon: "error"});
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'Roles/setRol'; 
        var formData = new FormData(formRol);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
           if(request.readyState == 4 && request.status == 200){
                
                var objData = JSON.parse(request.responseText);
                if(objData.status)
                {
                    $('#modalFormRol').modal("hide");
                    formRol.reset();
                    Swal.fire({
                        title: "Roles de usuario", 
                        text: objData.msg,
                        icon:"success"});
                        tableRoles.api().ajax.reload();
                }else{
                    formRol.reset();
                    Swal.fire({
                        title:"Error", 
                        text:objData.msg, 
                        icon:"error"});
                }              
            } 
            return false;
        }   
    }
});

//$('#tableRoles').dataTable();
$('#tableRoles').dataTable();

function openModal(){

    document.querySelector('#idRol').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
    document.querySelector("#formRol").reset();
	$('#modalFormRol').modal('show');
}

window.addEventListener('load', function() {
    /*fntEditRol();
    fntDelRol();*/
    fntPermisos();
}, false);

function fntEditRol(idrol){
    document.querySelector('#titleModal').innerHTML ="Actualizar Rol";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    var idrol = idrol;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl  = base_url+'Roles/getRol/'+idrol;
    request.open("GET",ajaxUrl ,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idRol").value = objData.data.idrol;
                document.querySelector("#txtNombre").value = objData.data.nombrerol;
                document.querySelector("#txtDescripcion").value = objData.data.descripcion;

                if(objData.data.status == 1)
                {
                    var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                }else{
                    var optionSelect = '<option value="0" selected class="notBlock">Inactivo</option>';
                }
                var htmlSelect = `${optionSelect}
                                  <option value="1">Activo</option>
                                  <option value="0">Inactivo</option>
                                `;
                document.querySelector("#listStatus").innerHTML = htmlSelect;
                $('#modalFormRol').modal('show');
            }else{
                Swal.fire({
                    titke:"Error", 
                    text: objData.msg , 
                    icon:"error"});
            }
        }
    }
}

function fntDelRol(idrol){
    var idrol = idrol;
    Swal.fire({
        title: "Eliminar Rol",
        text: "¿Realmente quiere eliminar el Rol?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }).then((isConfirm) => {
        if (isConfirm.isConfirmed) 
        {

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'Roles/delRol/';
            var strData = "idrol="+idrol;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    var objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        Swal.fire({
                            title:"Eliminar!", 
                            text: objData.msg , 
                            icon:"success"});
                        tableRoles.api().ajax.reload(function(){
                       
                        });
                    }else{
                        Swal.fire({
                            title:"Atención!",
                            text: objData.msg,
                            icon: "error"});
                    }
                }
            }
        }

    });
}

function fntPermisos(idrol){
    var idrol = idrol;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Permisos/getPermisosRol/'+idrol;
    request.open("GET",ajaxUrl,true);
    request.send();

    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            document.querySelector('#contentAjax').innerHTML = request.responseText;
            $('.modalPermisos').modal('show');
            document.querySelector('#formPermisos').addEventListener('submit',fntSavePermisos,false);
        }
    }
}

function fntSavePermisos(e){
    
    e.preventDefault();
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url+'Permisos/setPermisos'; 
    var formElement = document.querySelector("#formPermisos");
    var formData = new FormData(formElement);
    request.open("POST",ajaxUrl,true);
    request.send(formData);
   
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            console.log(request.responseTex);
            
            var objData = JSON.parse(request.responseText);
           
            if(objData.status)
            {
                Swal.fire({
                    title:"Permisos de usuario",
                    text: objData.msg ,
                    ico:"success"});
            }else{
                Swal.fire({
                    title:"Error",
                    text: objData.msg ,
                    icon: "error"});
            }
        }
    }
    
}