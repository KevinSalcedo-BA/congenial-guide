  <!-- Page -->
 
<?php 

require("classes/users.class.php");
require("classes/clients.class.php");
require_once("classes/tickets.class.php");
require_once("classes/tasks.class.php");
require_once("classes/utility.class.php");
require_once("classes/notifications.class.php");

$user = new Users();
$us=$user->getUserById($_SESSION['auth_user_id']);
$dpto=$user->getDepartmentById($us['id_department']);
$hoy = getdate();

$tickets = new Tickets();
$dateDif=$tickets->GetTicketInfo($_SESSION['auth_user_id']);
$pend=$tickets->getTicketsPend($_SESSION["auth_user_id"]);
$depaTi=$tickets->getTicketsDepartment($us['id_department']);
$stat=$tickets->GetStatusProcess($us['id_department']);
$stat2=$tickets->GetPartialStatus($us['id_department']);
$stat3=$tickets->GetBadStatus($us['id_department']);
$stat4=$tickets->GetFinishStatus($us['id_department']);
$stat5=$tickets->FinalStatus($us['id_department']);
$statuss=$tickets->CreatedTickets($us['id_department']);

$task = new Tasks();
$task_pend = $task->getTasksPend($_SESSION["auth_user_id"]);

$notifications = new Notifications();
$allnot = $notifications->GetAllNotifi($us['id_department']);
$allnott = $notifications->GetAllNotifications($us['id_department']);
$pendN = $notifications->GetNumNotify($us['id_department']);
/* PARA TRAER REPUTACION SERVIDORES */

$utility = new Utility();
$reputation=$utility->getReputationInfo();

/* FIN PARA TRAER REPUTACION SERVIDORES */
?>

  <div class="page">
    <div class="page-header padding-0">
      <div class="widget widget-article type-flex">
        <div class="widget-header cover overlay">
          <img class="cover-image height-100" src=""
          alt="">
          <div class="overlay-panel text-center vertical-align">
            <div class="widget-metas vertical-align-middle blue-grey-800">
              <div class="widget-title font-size-50 margin-bottom-35 blue-grey-800"><?php //var_dump($_SESSION);?></div>
              <ul class="list-inline font-size-14">
                <li>
                  <i class="icon wb-map margin-right-5" aria-hidden="true"></i>Bogotá                  
                </li>       
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-content container-fluid">
      <div class="row" data-plugin="matchHeight" data-by-row="true">
        <div class="col-xlg-3 col-lg-4 col-md-12">
          <!-- Panel Web Designer -->
          <div class="widget widget-shadow">
            <div class="widget-content widget-radius text-center bg-white padding-40">
              <div class="avatar avatar-100 margin-bottom-20">
                <img src="<?php echo _DOMAIN;?>assets/portraits/user.png" alt="">
              </div>
              <p class="font-size-20 blue-grey-700"><?php echo $us['name']." ".$us['lastname']; ?></p>
              <p class="blue-grey-400 margin-bottom-20"><?php echo $user->getRolesByUser($us['id'])." - ".$dpto['name']; ?></p>
          
              <p class="margin-bottom-45">

                <ul>
                  <li><b>Tickets pendientes: <?php echo $pend; ?></b></li>
                  <li><b>Tareas  pendientes: <?php echo $task_pend;?></b></li>
                
               <div id="count-reputation-dash" style="display: none;">
                 <?php if ($dpto['id']==4 || $dpto['id']==1): ?>
                  <br><br><li><b><strong>Reputacion de servidores:</strong><br> 
                      <?php
                     foreach ($reputation as $rep => $rep_value) {
                       //print_r($rep_value);
                       echo "<br>IP: " . $rep_value['ip'] . "<br> Reputation: " . $rep_value[1] . "<br> Fecha actualización: " . $rep_value[3] . "<br><br>";
                      }
                      ?></b></li>
                  <?php endif ?> 
                  </div>
                </ul>
              </p>
              <a  href='index.php?page=editausuario&user_id=<?php echo $us[id];?>' class="btn btn-primary padding-horizontal-40">Editar Datos</a><br><br>
              <button class="btn btn-primary padding-horizontal-40" id="action2">Reputacion de servidores</button><br>
            </div>
          </div>
          <!-- End Panel Web Designer -->
        </div>

        <div class="col-xlg-6 col-lg-8 col-md-12">
          <!-- Panel Traffic -->
          <div class="widget widget-shadow example-responsive" id="widgetLinearea">
            <div class="widget-content bg-white padding-30" style="min-width:480px;">
              <div class="row padding-bottom-20" style="height:calc(100% - 322px);">
                <div class="col-sm-8 col-xs-6">
                
                </div>
                <div class="col-sm-4 col-xs-6">
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="counter counter-md">
                        <div class="counter-number-group text-nowrap">
                          <span class="counter-number">76</span>
                          <span class="counter-number-related">%</span>
                        </div>
                        <div class="counter-label blue-grey-400">PC Browser</div>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="counter counter-md">
                        <div class="counter-number-group text-nowrap">
                          <span class="counter-number">24</span>
                          <span class="counter-number-related">%</span>
                        </div>
                        <div class="counter-label blue-grey-400">Mobile Phone</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ct-chart margin-bottom-30" style="height:270px;"></div>
              <ul class="list-inline text-center margin-bottom-0">
                <li>
                  <i class="icon wb-large-point blue-200 margin-right-10" aria-hidden="true"></i>                  PC BROWSER
                </li>
                <li class="margin-left-35">
                  <i class="icon wb-large-point teal-200 margin-right-10" aria-hidden="true"></i>                  MOBILE PHONE
                </li>
              </ul>
            </div>
          </div>
          <!-- End Panel Traffic -->
        </div>

        <div class="col-xlg-3 col-md-12">
          <div class="row height-full">
            <div class="col-xlg-12 col-md-6" style="height:50%;">
              <!-- Panel Overall Sales -->
              <div class="widget widget-shadow">
                <div class="widget-content widget-radius padding-30 bg-blue-600 white">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-50">
                      <div>Bienvenido! a INTRANET PAXZU</div>
                      <div class="blue-200">Agencia de Marketing Digital</div>
                    </div>
                    <div class="counter-number-group margin-bottom-10">
                      <span class="counter-number-related">Hora:</span>
                      <span class="counter-number" id="reloj"></span>
                    </div>
                    <div class="counter-label">
                      <div class="progress progress-xs margin-bottom-10 bg-blue-800">
                        <?php $yday=$hoy['yday']; 
                              $valor=round((($yday/365)*100), 0);  
                        ?>
                       
                        <div class="progress-bar progress-bar-info bg-white" style="width: <?php echo $valor.'%'?>" aria-valuemax="100"
                        aria-valuemin="0" aria-valuenow='<?php echo $valor ?>' role="progressbar">
                          
                        </div>
                      </div>
                      <div class="counter counter-sm text-left">
                        <div class="counter-number-group">
                          <span class="counter-number font-size-14"></span>
                           <span class="sr-only"><?php echo $yday; ?> </span>
                          <span class="counter-number-related font-size-14">FECHA:</span>
                          <span class="counter-number-related font-size-14"><?php echo $hoy['mday']."/".$hoy['month']."/".$hoy['year']; ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Overall Sales -->
            </div>

            <div class="col-xlg-12 col-md-6" style="height:50%;">
              <!-- Panel Today's Sales -->
              <div class="widget widget-shadow">
                <div class="widget-content widget-radius padding-30 bg-red-600 white">
                  <div class="counter counter-lg counter-inverse text-left">
                    <div class="counter-label margin-bottom-20">
                      <div>ANUNCIOS IMPORTANTES</div>
                      <div class="blue-200">Lorem ipsum dolor sit amet</div>
                    </div>
                    <div class="counter-number-group margin-bottom-10">
                      <span class="counter-number-related">$</span>
                      <span class="counter-number">41,160</span>
                    </div>
                    <div class="counter-label">
                      <div class="progress progress-xs margin-bottom-10 bg-red-800">
                        <div class="progress-bar progress-bar-info bg-white" style="width: 70%" aria-valuemax="100"
                        aria-valuemin="0" aria-valuenow="70" role="progressbar">
                          <span class="sr-only">70%</span>
                        </div>
                      </div>
                      <div class="counter counter-sm text-left">
                        <div class="counter-number-group">
                          <span class="counter-number font-size-14">70%</span>
                          <span class="counter-number-related font-size-14">HIGHER THAN LAST MONTH</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Panel Today's Sales -->
            </div>
          </div>
        </div>

        <div class="col-xlg-6 col-lg-6 col-md-12">
          <!-- Panel My Tasks -->
          <div class="widget widget-shadow example-responsive" id="widgetPieProgress">
            <div class="widget-content widget-radius bg-white padding-30" style="min-width:480px;">
              <div class="row height-50 margin-bottom-30">
                <div class="col-xs-6">
                  <div class="blue-grey-700">TAREAS DE MI EQUIPO</div>
                </div>
                <div class="col-xs-6">
                  <div class="dropdown clearfix pull-right">
                    <button class="btn btn-default dropdown-toggle bg-white" style="border-radius:20px;"
                    type="button" data-toggle="dropdown" aria-expanded="false">
                      Week
                      <span class="icon wb-chevron-down-mini" aria-hidden="true"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li role="presentation"><a href="javascript:void(0)" role="menuitem">Month</a></li>
                      <li role="presentation"><a href="javascript:void(0)" role="menuitem">Year</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row" style="height:calc(100% - 80px);">
                <div class="col-xs-4 padding-horizontal-20">
                  <div class="pieProgress-one" data-size="180" data-barsize="8" data-goal="50" aria-valuenow="50"
                  role="progressbar">
                    <div class="counter vertical-align">
                      <div class="counter-number-group  vertical-align-middle text-nowrap">
                        <span class="counter-number">50</span>
                        <span class="counter-number-related margin-left-0">%</span>
                      </div>
                    </div>
                  </div>
                  <div class="text-center margin-top-40">TERMINADAS</div>
                </div>
                <div class="col-xs-4 padding-horizontal-20">
                  <div class="pieProgress-two" data-size="180" data-barsize="8" data-goal="75" aria-valuenow="75"
                  role="progressbar">
                    <div class="counter vertical-align">
                      <div class="counter-number-group  vertical-align-middle text-nowrap">
                        <span class="counter-number">75</span>
                        <span class="counter-number-related margin-left-0">%</span>
                      </div>
                    </div>
                  </div>
                  <div class="text-center margin-top-40">EN PROCESO</div>
                </div>
                <div class="col-xs-4 padding-horizontal-20">
                  <div class="pieProgress-three" data-size="180" data-barsize="8" data-goal="45"
                  aria-valuenow="45" role="progressbar">
                    <div class="counter vertical-align">
                      <div class="counter-number-group  vertical-align-middle text-nowrap">
                        <span class="counter-number">45</span>
                        <span class="counter-number-related margin-left-0">%</span>
                      </div>
                    </div>
                  </div>
                  <div class="text-center margin-top-40">PROYECTOS</div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Panel My Tasks -->
        </div>

        <div class="col-xlg-6 col-lg-6 col-md-12">
          <!-- Panel Services -->
          <div class="widget widget-shadow" id="widgetBar">
            <div class="widget-content widget-radius  bg-white padding-30">
              <div class="row padding-bottom-20" style="height:calc(100% - 230px);">
                <div class="col-xs-11">
                  <div class="blue-grey-700"><h4>TICKETS : <strong><?php echo $dpto['name'];?></strong></h4></div>
                  <table  class="table table-striped margin-30" data-plugin="dataTabl">
            <thead>
              <tr>
                <th><center>Tickets Creados</center></th>
                <th><center>Tickets en proceso</center></th>
                <th><center>Tickets parciales</center></th>
                <th><center>Tickets devueltos</center></th>
                <th><center>Tickets finaizados</center></th>
                <th><center>Tickets Asignado</center></th>
                <th><center>Total de Tickets</center></th>
              </tr>
             </thead>
            <tbody>
              <tr>
                <td><?php echo $statuss;?></td>
                <td><?php echo $stat;?></td>
                <td><?php echo $stat2;?></td>
                <td><?php echo $stat3;?></td>
                <td><?php echo $stat4;?></td>
                <td><?php echo $depaTi;?></td>
                <td><?php echo $stat5;?></td>
              </tr>
            </tbody>
          </table>

          <button class="btn btn-primary padding-horizontal-40" id="action">Ver más</button><br>

        <div id="count-tickets-dash" class="col-xs-18" style="display: none;" >

          <h4><center><strong>Tus Tickets</strong></center></h4><br>
            <table class="table table-striped margin-30" data-plugin="dataTable">
                <thead>
                  <tr>
                   <th><center>Código</center></th>
                   <th><center>Titulo</center></th>
                    <th><center>Creado por</center></th>
                    <th><center>Estado</center></th>
                    <th><center>Fecha de Radicación</center></th>
                    <th><center>Fecha Esperada</center></th>
                    <th><center>Dias Transcurridos</center></th>
                    <th><center>Dias Faltantes</center></th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php
                      
                      foreach ($dateDif as $key => $key_value) {
                        $Res=$key_value[15]*(-1);
                       //print_r($key_value);?>
                  <tr>
                       <td><?php echo $key_value['id'];?></td>
                       <td><?php echo $key_value['title'];?></td>
                       <td><?php echo $key_value['creador'];?></td>
                       <td><?php echo $key_value['estado'];?></td>
                       <td><?php echo $key_value['date'];?></td>
                       <td><?php echo $key_value['date_final'];?></td>
                       <td><?php echo $key_value[14];?></td>
                       <td><?php 
                       if (($key_value[14]<=30) && ($key_value[14].value>=0)) {
                         echo $Res;
                       }else {
                         echo "Caducado";
                       }
                       ?></td>
                  </tr>
                    <?php  }
                     ?>
                </tbody>
              </table>
        </div>
                </div>
<!--                 <div class="col-xs-6">
                  <div class="dropdown clearfix pull-right"> 
                    <button class="btn btn-default dropdown-toggle bg-white" style="border-radius:20px;"
                    type="button" data-toggle="dropdown" aria-expanded="false">
                      Week
                      <span class="icon wb-chevron-down-mini" aria-hidden="true"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li role="presentation"><a href="javascript:void(0)" role="menuitem">Month</a></li>
                      <li role="presentation"><a href="javascript:void(0)" role="menuitem">Year</a></li>
                    </ul>
                  </div>
                </div> -->
              </div>
              <!-- <div class="ct-chart" style="height: 230px;"></div> -->
            </div>
          </div>
          <!-- End Panel Services -->
        </div>
        <div class="col-xlg-4 col-lg-4 col-md-6">

          <!-- Panel Teammates -->
          <div class="panel" id="widgetUserList">
            <div class="panel-heading">
              <h3 class="panel-title">
                Notificaciones
                <span class="pull-right label label-round label-warning"><?php echo $pendN; ?></span>
              </h3>
            </div>
            <div class="panel-body padding-0">
              <ul class="list-group">
                <?php 
                //print_r($allnot);
                  foreach ($allnot as $not => $not_value) {
                        $i=$i+1;
                ?>
                <li class="list-group-item padding-horizontal-30">
                  <div class="media">
                    <div class="media-left">
                      <a class="avatar" href="javascript:void(0)">
                        <img class="img-responsive" src="<?php echo _DOMAIN;?>assets/portraits/2.jpg" alt="">
                      </a>
                    </div>
                    <div class="media-body">
                      <p class="media-heading margin-bottom-0 blue-grey-700"><?php echo $not_value['name']." ".$not_value['lastname']; ?></p>
                      <input id="user_id_<?php echo $not_value['id_user'];?>" type="hidden" name="user_id" value="<?php echo $not_value['id_user'];?>">
                      <small class="blue-grey-400"><?php echo $not_value['position'] ?></small>
                    </div><br>
                    <div class="media-center">
                      <label id="noti_<?php echo $not_value['id']; ?>" name="id_noti" aria-hidden="true" value="<?php echo $not_value['id']; ?>"><?php echo $not_value['mensaje']; ?> </label>
                        <a id="container_<?php echo $not_value['id']; ?>"><center><button type="button" class="btn btn-primary ladda-button vistobtn<?php echo $i; ?>" data-style="expand-left" data-plugin="ladda" id="<?php echo $not_value['id_user']; ?>_<?php echo $not_value['id'];?>"><span class="ladda-label">Ver</span></button></center></a>
                      <!-- <span class="pull-right"><button type="button" class="btn btn-primary btn-xs" id="vistobtn<?php echo $i;?>">
                         <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                      </button></span> -->
                    </div>

                </li>
               <?php  } ?>
                  <div>
                        <button type="button" class="btn btn-primary padding-horizontal-40" data-toggle="modal" data-target="#exampleModal">Ver Todas</button>
                        <!-- Modal -->
                  </div>
               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Todas las notificaciones</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                      <?php foreach ($allnott as $nott => $nott_value) {

                                      ?>
                                      <li class="list-group-item padding-horizontal-30">
                                        <div class="media">
                                          <div class="media-left">
                                            <a class="avatar" href="javascript:void(0)">
                                              <img class="img-responsive" src="<?php echo _DOMAIN;?>assets/portraits/2.jpg" alt="">
                                            </a>
                                          </div>
                                          <div class="media-body">
                                            <p class="media-heading margin-bottom-0 blue-grey-700"><?php echo $nott_value['name']." ".$nott_value['lastname']; ?></p>
                                            <input  type="hidden" name="user_id" value="<?php echo $nott_value['id_user'];?>">
                                            <small class="blue-grey-400"><?php echo $nott_value['position'] ?></small>
                                          </div><br>
                                          <div class="media-center">
                                            <label  name="id_noti" aria-hidden="true" value="<?php echo $nott_value['id']; ?>"><?php echo $nott_value['mensaje']; ?></label>
                                          </div>
                                      <?php } ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>
                     <!--END MODAL-->
              </ul>
            </div>
          </div>
          <!-- End Panel Teammates -->
        </div>

        <div class="col-xlg-4 col-lg-4 col-md-6">
          <!-- Panel Products Sales -->
          <div class="panel" id="widgetSales">
            <div class="panel-heading">
              <h3 class="panel-title">PRODUCTS SALES</h3>
            </div>
            <table class="table table-striped margin-bottom-10">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Users</th>
                  <th>Active</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Remark template</td>
                  <td>61,068</td>
                  <td>70%</td>
                </tr>
                <tr>
                  <td>Remark Admin</td>
                  <td>121,228</td>
                  <td>84%</td>
                </tr>
                <tr>
                  <td>Mail App</td>
                  <td>10,685</td>
                  <td>90%</td>
                </tr>
                <tr>
                  <td>Calendar App</td>
                  <td>6,685</td>
                  <td>68%</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- End Panel Products Sales -->
        </div>

        <div class="col-xlg-4 col-lg-4 col-md-12">
          <!-- Panel Title -->
          <div class="widget widget-shadow widget-radius bg-white" id="widgetGmap">
            <div class="map" id="gmap"></div>
          </div>
          <!-- End Panel Title -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Page --> 

  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script type="text/javascript">
function startTime(){
today=new Date();
h=today.getHours();
m=today.getMinutes();
s=today.getSeconds();
m=checkTime(m);
s=checkTime(s);
document.getElementById('reloj').innerHTML=h+":"+m+":"+s;
t=setTimeout('startTime()',500);}

function checkTime(i)
{if (i<10) {i="0" + i;}return i;}
window.onload=function(){startTime();}//fin funcion

$(document).ready(function(){
  $('#action').on("click",function(){
    if ($('#count-tickets-dash').is(':visible')) {
      $('#count-tickets-dash').hide();
    $('#action').html('Ver más');
    } else {
       $('#count-tickets-dash').show();
      $('#action').html('Ver menos');
    }
   
  });
});  //fin funcion
$(document).ready(function(){
  $('#action2').on("click",function(){
    if ($('#count-reputation-dash').is(':visible')) {
      $('#count-reputation-dash').hide();
    $('#action2').html('Reputación de servidores');
    } else {
       $('#count-reputation-dash').show();
      $('#action2').html('Ver menos');
    }
   
  });
});//fin funcion

// $(document).ready(function(){
//   $('#action3').on("click",function(){
//     function cambiar_estado_visto(id, status){
//       $('#id_noti').val(status);
//       $('#user_id').val(id);

//       $.ajax({
//         type: "POST",
//         url: "classes/service.php",
//         data: {
//           task: 'cambiar_estado',
//           user_id:id,
//           id_noti:status
//         }
//       });
//     });
// });     

// }//Fin funcion 


$(document).on('click', '.vistobtn3' ,function(){

    var getId = $(this).attr("id");
    var IdReal = getId.split("_");

    var id_user = IdReal[0];
    var id_not = IdReal[1];
    var task = "checked";


      $.ajax({
        type: "POST",
        url: "classes/service.php",
        data: {
          id_user: id_user,
          id_not: id_not,
          task: task
        }.done(function(data){
            if (data==1) {
              $("#container_"+id_not).html("");
              var btnRes = "<h2>Notificaciones</h2>";
              $("#container_"+id_not).append(btnRes);
            }



        });//fin done



      });//fin ajax


  //cada boon un a clase visto1,2,3 y el i normal como en usuarios


});



// var IDs = $("#widgetUserList input[id]")  // find spans with ID attribute
//   .map(function() { return this.id; }) // convert to set of IDs
//   .get();
//   alert (IDs);

//   var IDs2 = $("#widgetUserList label[id]")  // find spans with ID attribute
//   .map(function() { return this.id; }) // convert to set of IDs
//   .get();
//   alert (IDs2);
</script>


  