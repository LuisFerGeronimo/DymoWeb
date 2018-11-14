
  <?php include('header.php'); 
    require 'conex/conexion.php';
    
  ?>
  <body class="fondo_general">
    <div class="container">
      <h1 class="ntarriba"><span class="input-group-addon derecha"><i class="far fa-user"></i></span>CONDUCTORES</h1>
    </div>

    <div class="container ntarriba">
      <div class="row justify-content-end">
        <button type="button" class="btn btn-outline-success" onclick="dirigir();"><i class="icon ion-md-contacts derecha"></i> + Conductor</button>
      </div>
      <br /><br />
      <table class="table table-striped ntarriba table-responsive">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido paterno</th>
            <th scope="col">Apellido Materno</th>
             <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php

    do{ ?>
      <tr> <td><?php echo 1; ?> </td>
        <td><?php echo 'nombre' ?>   </td>
        <td><?php echo 'apellidoP'; ?>   </td>
        <td><?php echo 'apellidoM'; ?>   </td>
        <td>
              <a href="#"><span class="input-group-addon derecha"><i class="fas fa-pencil-alt"></i></span></a>
              <a name="borrar" id="borrar" href="#">
                <span class="input-group-addon">
                <i class="fas fa-trash-alt"></i></span>
              </a>
        </td>

    </tr>

  <?php
 }while ($row_consulta=mysqli_fetch_assoc($consulta)); ?>
         
        </tbody>
      </table>
    </div>

    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

    <script>

        alert('Probando');
        function dirigir () {
          window.location.href="agregar_conductor.php";
        }

        $('body').on('click','#borrar', function(){
          if(confirm('¿Está seguro que desea eliminar este registro?')){ 

        }
        });
     

    </script>


    <?php include('footer.php'); ?>
  </body>
</html>