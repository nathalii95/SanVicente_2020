<?php  
    session_start();
    if (!isset($_SESSION['nombre'])) {
        header('Location: index.php');
    
    }

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    <title>Consultorio Medico "San Vicente"</title>    
            <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/consultorio.png" type="image" >


    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet" media="all">

    <!-- Main CSS-->

</head>
<?php

include ('nav.php');


?>
<body class="animsition">
    <div class="page-wrapper">
        
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                              
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <?php

include ('nav1.php');


?>

                                            </div>
                                            
                                          
                                        </div>
                                    </div>
                                </div>
                                <?php

include ('slide.php');


?>

                            </div>
                        </div>
                    </div>
                </div>

            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT--><br><br>

  <div class=" col-sm-offset- col-lg-12 " >
  
    
<div class="row">
      <div class="col-lg-12">
       <div style="width: 94%; margin-left: 20px; position:relative;top: 40px;" >

          <div class="alert "  style="font-size: 15px; background:rgba(0, 125, 255, 0.5);"><center> <strong style="color:white;">RCETARIO - CONSULTORIO MEDICO "SAN VICENTE"</strong></center>

<!-- /.Informacion-->



          </div>
          
        </div><!-- /.panel-->

        
        <div class="panel panel-default" >
        
          <div class="panel-body">
            <div class="col-md-15" >
  <!-- /.Informacion-->           
<br>


  <div class="hero-unit-table">  




      <!--BUTTON MODAL -->
<button style="color: white; background:grey; font-size: 14px;" type="button" class="btn " data-toggle="modal" data-target="#insertar">
Nuevo Recetario
</button>

<br><br>
<div >
        <div>
                
                    <div class="table-responsive"> 
 <table id="example" class="table table-striped table-bordered table-hover  text-dark" style="text-align: center; font-weight: bold;"   >
                              
 <thead>
 <tr style="background:rgba(0, 125, 255, 1);color:white; text-align: center; ">
                                 <th  scope="col">#</th>
    
               <th scope="col">Fecha</th>


      <th scope="col"  >Paciente</th>
       
       
         <th scope="col">Sintomas</th>
         <th scope="col">medicamento</th>

        <th scope="col">Descripcion</th>

          <th scope="col">Editar</th>
           <th scope="col">Eliminar</th>
                      <th scope="col">Generar</th>

                                    </tr>
                                </thead>
<tbody>
   <!-- REGISTROS DE BD -->                                
   <?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * 
  FROM recetario
ORDER BY id_recetario

  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$cita=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>


<?php
foreach($cita as $row) {?>



            <tr >
              <td><?php echo $row->id_recetario?></td>                                   

      <td><?php echo $row->fecha?></td>
 
     
         <td><?php echo $row->paciente?></td>
         <td><?php echo $row->sintomas?></td>
         <td><?php echo $row->medicamento?></td>

      <td><?php echo $row->descripcion?></td> 
              
<td>  

 <button style="font-size: 14px;" type="button" class="btn btn-info editbtn" data-toggle="modal" data-target="#editar">
                         <i class="fa fa-pencil" aria-hidden="true"></i>        Editar
                            </button></td>

<td><button style="font-size: 14px;" class="btn btn-danger deletebtn " data-toggle="modal" data-target="#eliminar">
           <i class="fa fa-ban" aria-hidden="true"></i>                        Eliminar
                            </button> 

                          </td>
                           

<td> <a style="font-size: 14px;" href="reporte/pdf_reporte_recetario.php?id=<?php echo $row->id_recetario?>" class="btn btn-primary"  target="_blank" ><span class="glyphicon glyphicon-file">Reporte</a> </td>
                                    </tr>
           

  
<?php }?>

 </tbody>
 </table>


<!-- Modal Insertar -->
<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true" style="font-size: 40px;">&times;</span>
        </button> 
           <div style="background:rgba(0, 125, 255, 1);position: absolute;left: 4%; width: 90%; padding: 2%; color:white;letter-spacing: 12px;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white;" class="modal-title" id="exampleModalLabel"><center>AGREGAR RECETARIO</center></h5></strong></div>
       
        <br>
        
        <br>
           
      </div>
     



<br>


      <div class="modal-body">
       <!----- Formulario  ---->
<form style=" color: black; font-size: 15px;" action="guardarecetario.php" method="POST" enctype="multipart/form-data">





<div class="form-group">
     <?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * 
  FROM 
  paciente



  ;");
//FecthAll va devolver todas las filas de la base de dato (::)accede a elemtos estatico y costantes y metodos de una clase , fecth_obl devuelve la fila de cada columna 
$pa=$sentencia->fetchAll(PDO::FETCH_OBJ);

//print_r($var);

?>
<br>

<div class="form-group">
<label for="">FECHA</label>
<input   style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px;  " class="form-control" type="date" name="fecha" class="form-control" required>

 </div>
<br>
            <label>Paciente</label>


            <select  style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px;  " name="nombre"  class="form-control">
            <option  required value="">Agregue paciente</option>

                <?php foreach($pa as $row): ?>
                    <option required value="<?php echo $row->nombre_apellido; ?>"><?php echo $row->nombre_apellido; ?></option>
                <?php endforeach; ?>
            </select>
        </div>



<br>

<div class="form-group">
 <label>Sintomas</label>
                        <textarea  style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px;  " placeholder="Sintomas:" minlength="1" maxlength="50"  name="sintomas"  required class="form-control"></textarea>
</div>
<br>
<div class="form-group">
 <label>Medicamento</label>
                        <textarea  style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px;  " placeholder="Medicamento:" minlength="1" maxlength="50"  name="medicamento" required class="form-control"></textarea>
</div>
<br>
<div class="form-group">
 <label>Descripcion</label>
                        <textarea  style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px;  " placeholder="Observacion:" minlength="1" maxlength="50" name="descripcion" required class="form-control"></textarea>
</div>  
 
    

       <br>     
  <div class="modal-footer">       <br>
        
        <button 

style="color: black; bheight: 40px; font-size: 14px; "


         type="submit" class="btn btn-warning "> <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
      </div>

</form>  <!----- Formulario  ---->
</div>  <!----- Div form-group  ---->

    </div>
  </div>
</div>


<!-- /.Termina modal Insertar-->



<!-- Modal Editar -->
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div   class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true" style="font-size: 40px;">&times;</span>
        </button> 
           <div style="background:rgba(0, 125, 255, 0.5);color:white;letter-spacing: 10px;position: absolute;left: 4%; width: 90%; padding: 2%;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" id="exampleModalLabel"><center>EDITAR RECETARIO</center></h5></strong></div>
       
        <br>
        
        <br>
           
      </div>
     



      <div class="modal-body">
       <!----- Formulario  ---->
<form style=" color: black; font-size: 15px;" action="editar_recetario.php" method="POST" >


<input type="hidden" name="id" id="update_id">



 <br>

<div class="form-group">
<label for="">FECHA</label>
<input  style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px; " class="form-control" type="date" name="fecha" id="fecha" class="form-control">

 </div>
 <br>
<div class="form-group">
<label for=""> PACIENTE</label>
<input style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px; " type="text" name="nombre" id="nombre" class="form-control" placeholder="Editar Nombre Paciente" required readonly >





 </div>


 <br>

<div class="form-group">
 <label>Sintomas</label>
                        <textarea style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px; " placeholder="Sintomas:" name="sintomas" id="sintomas" class="form-control"></textarea>
</div>

   <br>
<div class="form-group">
 <label>Medicamento</label>
                        <textarea style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px; "  placeholder="Medicamento:" name="medicamento" id="medicamento" class="form-control"></textarea>
</div>

   <br>
<div class="form-group">
 <label>Descripcion</label>
                        <textarea style="margin:-40px 0px 0px 115px; width:75%; color: black; height: 40px; font-size: 13px; " placeholder="Descripcion:" name="descripcion" id="descripcion" class="form-control"></textarea>
</div>






       <br>     
  <div class="modal-footer">       <br>
        <button style="color: white; font-weight: bold; font-size: 15px; " type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
   
   <button style="color: black; background:rgba(0, 125, 255, 0.5);  font-size: 15px;" type="submit"  class="btn "><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar</button>

      </div>

</form>
 </div>
</div>

    
    </div>
  </div>
</div>


<!-- /.Termina modal editar-->







<!-- Modal Eliminar -->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true" style="font-size: 40px;">&times;</span>
        </button> 
           <div  style="background:rgba(0, 125, 255, 0.5);color:white;letter-spacing: 10px;position: absolute;left: 4%; width: 90%; padding: 2%;" class="alert "><strong> <h5 style="font-size:15px;  font-weight: bold; color:white" class="modal-title" 
id="exampleModalLabel"><center>ELIMINAR RECETARIO</center></h5></strong></div>
       
        <br>
        
        <br>
            
      </div>
     

      <div class="modal-body">
       <!----- Formulario  ---->
<form action="eliminar_recetario.php" method="POST" >

<input type="hidden" name="id" id="delete_id" >


<center>
<p style="font-size: 22px;"   >Estas Seguro de Eliminar  <strong>  </strong> ?</p>

</center>
       <br>     
  <div class="modal-footer">       <br>
        <button style="color: white; font-weight: bold; font-size: 14px;width: 70px;" type="button" class="btn btn-danger" data-dismiss="modal">No</button>
   
   <button type="submit" style="color: black; background:rgba(0, 125, 255, 0.5); font-size: 14px;width: 70px;" class="btn ">Si</button>

      </div>

</form>

</div>

    
    </div>
  </div>
</div>



<!-- /.Termina modal ELIMINAR-->






 </div>











<center>

  <div  class="col-sm-12">
        <p style="color: black;" class="back-link">Consultorio Medico " San Vicente "   </p>
      </div>
</center>

            </div>
          </div>
        </div><!-- /.panel-->
      </div><!-- /.col-->
      <br>
  <div>
      <!--<div class="col-sm-12"><br>
        <p class="back-link">Fundación Conexión Vital   <a href="index.php">Andrea Hernandez Gerente</a></p>
      </div>
-->
    

</div>
    </div><!-- /.row -->
  </div><!--/.main-->
  
                       <div class="col-sm-12">
                

                        <div class="row">
                            <div class="col-md-12">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>


    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
<script src="js/js/jquery-1.11.1.min.js"></script>
  <script src="js/js/bootstrap.min.js"></script>
  <script src="js/js/chart.min.js"></script>
  <script src="js/js/chart-data.js"></script>
  <script src="js/js/easypiechart.js"></script>
  <script src="js/js/easypiechart-data.js"></script>
  <script src="js/js/bootstrap-datepicker.js"></script>
  <script src="js/js/custom.js"></script>
  
<!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>   
<script type="text/javascript" src="js/js/main.js"></script>  
<script>
  
$('.editbtn').on('click',function () {

$tr=$(this).closest('tr');

var datos=$tr.children("td").map(function () {

return $(this).text();

});

$('#update_id').val(datos[0]);

$('#fecha').val(datos[1]);

$('#nombre').val(datos[2]);


$('#sintomas').val(datos[3]);

$('#medicamento').val(datos[4]);

$('#descripcion').val(datos[5]);

});



</script>




<script>
  
$('.deletebtn').on('click',function () {

$tr=$(this).closest('tr');

var datos=$tr.children("td").map(function () {

return $(this).text();

});

$('#delete_id').val(datos[0]);


});







</script>


<script >
  

//Se utiliza para que el campo de texto solo acepte numeros
function SoloNumeros(evt){
 if(window.event){//asignamos el valor de la tecla a keynum
  keynum = evt.keyCode; //IE
 }
 else{
  keynum = evt.which; //FF
 } 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){

  return true;
 }
 else{ 
  alert('Tecla de texto no aceptada');
  return false;
 }
}









</script>

<script >//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
alert('Tecla numerica no aceptada');
        return false;
      }
}</script>


</body>

</html>
<!-- end document-->
