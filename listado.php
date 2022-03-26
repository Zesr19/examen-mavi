<br><div class="row">
    <h2 class="col-sm-10">Listado de Clientes</h2>
    <a href="registrar.php" class="btn btn-primary col-sm-2">Registrar Cliente</a>
</div>


<script type="text/javascript">
    $( document ).ready(function() {
        $.ajax({
            url: 'http://localhost:8080/api/clientes.php',
            type: 'GET',
            dataType: 'json',
            success: function(respuesta) {
                respuesta.forEach(element => {
                    $('#tablaClientes').append('<tr>' + 
                        '<td>' + element.nombre + '</td>' +
                        '<td>' + element.apellidop + '</td>' +
                        '<td>' + element.apellidom + '</td>' +
                        '<td>' + element.domicilio + '</td>' +
                        '<td>' + element.email + '</td>' +
                        '<td><button onclick="editarCliente('+ element.id_cliente + ')" class="btn btn-info">Editar</button></td>' +
                        '<td><button onclick="eliminarCliente('+ element.id_cliente + ')" class="btn btn-secondary">Eliminar</button></td>' + 
                        '</tr>');
                });
            },
            error: function() {
                console.error("No es posible completar la operación");
            }
        });
    });
</script>

<table class="table" id="tablaClientes">
    <thead class="thead-dark">
        <tr>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Domicilio</th>
        <th>Correo</th>
        <th></th>
        <th></th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>