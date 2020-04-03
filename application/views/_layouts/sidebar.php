    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-crimson sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="<?= base_url('assets/img/logo.png') ?>" width="32px">
        </div>
        <div class="sidebar-brand-text mx-2">System Login</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- QUERY MENU -->
      <?php
        $roleId = $this->session->userdata('role_id');
        $queryMenu = "
                      SELECT `admin_menu`.`id`, `menu`
                      FROM `admin_menu` JOIN `admin_access_menu`
                      ON `admin_menu`.`id` = `admin_access_menu`.`menu_id`
                      WHERE `admin_access_menu`.`role_id` = $roleId
                      ORDER BY `admin_access_menu`.`menu_id` ASC
                    ";
        $menu = $this->db->query($queryMenu)->result_array();
      ?>

      <!-- LOOPING MENU -->
      <?php foreach( $menu as $m ) : ?>
        <div class="sidebar-heading mt-4">
          <?= $m['menu'] ?>
        </div>

        <!-- SIAPKAN SUB-MENU DIDALAM MENU -->
        <?php
          $menuId = $m['id'];
          $querySubMenu = "
                        SELECT *
                        FROM `admin_sub_menu` JOIN `admin_menu`
                        ON `admin_sub_menu`.`menu_id` = `admin_menu`.`id`
                        WHERE `admin_sub_menu`.`menu_id` = $menuId
                        AND `admin_sub_menu`.`is_active` = 1
                      ";
          $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach( $subMenu as $sm ) : ?>
          <?php if ( $sm['title'] == $title ) : ?>
            <li class="nav-item active">  
          <?php else : ?>
            <li class="nav-item">  
          <?php endif ?>
            <a class="nav-link pb-0" href="<?= base_url() . $sm['url'] ?>">
              <i class="<?= $sm['icon'] ?>"></i>
              <span><?= $sm['title'] ?></span></a>
          </li>
        <?php endforeach; ?>

      <?php endforeach; ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block mt-4">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->