
<br><div class="row">
    <h2 class="col-sm-10">Editar cliente</h2>
    <a href="index.html" class="btn btn-primary col-sm-2">Regresar</a>
</div>

<?php $Id_Cliente = $_GET['Id']; ?>
<input type="text" id="idCliente" name="idCliente" style="display:none;" value="<?= $Id_Cliente ?>" >

<div class="container">
    <br>
    <div class="row">
        <h2 class="col-sm-11">Actualizar cliente</h2>
        <button type="submit" class="btn btn-danger col-sm-1" id="salirForm">Salir</button>
    </div>
    <br>
    <form method="" enctype="multipart/form-data" id="formClienteEditar">
        
        <div class="row g-3">
            <div class="col-sm">
                <input type="text" class="form-control" id="formName" name="name" placeholder="Nombre(s) *" maxlength="50" required>
            </div>
            <div class="col-sm">
                <input type="text" class="form-control" id="formApellidop" name="apellidoP" placeholder="Apellido Paterno *" maxlength="50" required>
            </div>
            <div class="col-sm">
                <input type="text" class="form-control" id="formApellidom" name="apellidoM" placeholder="Apellido Materno" maxlength="50" >
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col">
                <input type="text" class="form-control" id="formDomicilio" name="domicilio" placeholder="Ingresa tu domicilio *"  maxlength="100" required>
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col">
                <input type="email" class="form-control" id="formCorreo" name="correo" aria-describedby="correoHelp" placeholder="Ingresa tu correo electr&oacute;nico *" maxlength="50" required>
            </div>
        </div>
        <br>
        <p>Los campos con * son requeridos</p>
        <button type="submit" class="btn btn-primary" id="enviar">Registrar</button>
        <span id = "status"></span>
    </form>
</div>

<script type="text/javascript">
    $( document ).ready(function() {
        const _idCliente = document.getElementById('idCliente').value;
        const Url = "http://localhost:8080/api/clientes.php?Id=" + _idCliente;
        $.ajax({
            url: Url,
            type: 'GET',
            dataType: 'json',
            success: function(respuesta) {
                $('#formName').val(respuesta[0].nombre);
                $('#formApellidop').val(respuesta[0].apellidop);
                $('#formApellidom').val(respuesta[0].apellidom);
                $('#formDomicilio').val(respuesta[0].domicilio);
                $('#formCorreo').val(respuesta[0].email);
            },
            error: function() {
                console.error("No es posible completar la operación");
            }
        });

        // Este es para enviar el formulario al servidor mediante ajax
        $("#formClienteEditar").on("submit", function(e){
            e.preventDefault()
            var formData = new FormData(document.getElementById("formClienteEditar"));
            formData.append('Id', _idCliente);
            //console.log(formData);

            var jsonData = {};
            formData.forEach((value, key) => jsonData[key] = value);
            debugger
            $.ajax({
                url: "http://localhost:8080/api/clientes.php/" + _idCliente,
                type: "PUT",
                //dataType: "json",
                //encode: true,
                data: jsonData,
                cache: false,
                contentType: 'application/json',
                processData: false
            })
                .done(function(res){
                    alert(res);
                    window.location = "http://localhost:8080";
                })
                .fail(function(res){
                    alert(res);
                    window.location = "http://localhost:8080/registrar.php";
                })
                
        });
    });
</script>