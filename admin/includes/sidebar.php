
<div id="sidebar"><a href="#" class="visible-phone"><i class="fas fa-home"></i> HOME </a>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"><i class="fas fa-tachometer-alt"></i> <span>INICIO</span></a> </li>
    
    <li class="submenu"> <a href="#"><i class="fas fa-users"></i> <span>GESTIONAR MIEMBROS</span> <span class="label label-important"><?php include 'dashboard-usercount.php';?> </span></a>
      <ul>
        <li class="<?php if($page=='miembros'){ echo 'active'; }?>"><a href="miembros.php"><i class="fas fa-arrow-right"></i> Miembros registrados</a></li>
        <li class="<?php if($page=='members-entry'){ echo 'active'; }?>"><a href="registrarMiembros.php"><i class="fas fa-arrow-right"></i> Registrar miembros</a></li>
        <li class="<?php if($page=='members-remove'){ echo 'active'; }?>"><a href="eliminarMiembros.php"><i class="fas fa-arrow-right"></i> Eliminar miembros</a></li>
        <li class="<?php if($page=='members-update'){ echo 'active'; }?>"><a href="editarMiembro.php"><i class="fas fa-arrow-right"></i> Editar miembros</a></li>
      </ul>
    </li>

    <li class="<?php if($page=='staff-management'){ echo 'active'; }?>"><a href="personal.php"><i class="fas fa-briefcase"></i> <span>GESTIONAR PERSONAL</span></a></li>

    <li class="submenu"> <a href="#"><i class="fas fa-dumbbell"></i> <span>GESTIONAR EQUPOS</span> <span class="label label-important"><?php include 'dashboard-equipcount.php';?> </span></a>
    <ul>
    <li class="<?php if($page=='list-equip'){ echo 'active'; }?>"><a href="equipos.php"><i class="fas fa-arrow-right"></i> Lista de equipos</a></li>
        <li class="<?php if($page=='add-equip'){ echo 'active'; }?>"><a href="ingresar-equipos.php"><i class="fas fa-arrow-right"></i> Agregar equipo</a></li>
        <li class="<?php if($page=='remove-equip'){ echo 'active'; }?>"><a href="eliminar-equipo.php"><i class="fas fa-arrow-right"></i> Eliminar equipo</a></li>
        <li class="<?php if($page=='update-equip'){ echo 'active'; }?>"><a href="editar-equipo.php"><i class="fas fa-arrow-right"></i> Editar equipo</a></li>
      </ul>
    </li>

    <li class="<?php if($page=='attendance'){ echo 'submenu active'; } else { echo 'submenu';}?>"> <a href="#"><i class="fas fa-calendar-alt"></i> <span>ASISTENCIAS</span></a>
      <ul>
        <li class="<?php if($page=='attendance'){ echo 'active'; }?>"><a href="#"><i class="fas fa-arrow-right"></i> REGISTRAR/VERIFICAR</a></li>
        <li class="<?php if($page=='view-attendance'){ echo 'active'; }?>"><a href="#"><i class="fas fa-arrow-right"></i> VER</a></li>
      </ul>
    </li>

    <li class="<?php if($page=='manage-customer-progress'){ echo 'active'; }?>"><a href="#"><i class="fas fa-tasks"></i> <span>GESTIONAR PROGRESO MIEMBROS</span></a></li>
    <li class="<?php if($page=='member-status'){ echo 'active'; }?>"><a href="#"><i class="fas fa-eye"></i> <span>ESTADO DE MIEMBRO</span></a></li>
    <li class="<?php if($page=='payment'){ echo 'active'; }?>"><a href="#"><i class="fas fa-hand-holding-usd"></i> <span>PAGOS</span></a></li>
    <li class="<?php if($page=='announcement'){ echo 'active'; }?>"><a href="#"><i class="fas fa-bullhorn"></i> <span>ANUNCIOS</span></a></li>
    
    
    <li class="submenu"> <a href="#"><i class="fas fa-file"></i> <span>REPORTES</span></a>
    <ul>
        <li class="<?php if($page=='chart'){ echo 'active'; }?>"><a href="#"><i class="fas fa-arrow-right"></i> GRAFICOS</a></li>
        <li class="<?php if($page=='member-repo'){ echo 'active'; }?>"><a href="#"><i class="fas fa-arrow-right"></i> INFORME DE MIEMBROS</a></li>
        <li class="<?php if($page=='c-p-r'){ echo 'active'; }?>"><a href="#"><i class="fas fa-arrow-right"></i> REPORTES DE PROGRESO DE MIEMBROS</a></li>
      </ul>
    </li>
  </ul>
</div>