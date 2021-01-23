<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Query Menu -->
  <?php
  $queryMenu = "
              SELECT `user_menu`.`id`, `menu`
              FROM `user_menu` JOIN `user_access_menu` 
              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
              WHERE `user_access_menu`.`role_id` = {$user['role_id']}
    ";
  $menus = $this->db->query($queryMenu)->result_array();
  ?>

  <?php foreach ($menus as $menu) : ?>
    <!-- Heading -->
    <div class="sidebar-heading">
      <?= $menu['menu'] ?>
    </div>
    <?php
    $querySubMenu = "
        SELECT * FROM `user_sub_menu` 
        WHERE `user_sub_menu`.`menu_id` = {$menu['id']}
        AND `user_sub_menu`.`is_active` = 1
      ";
    $sub_menu = $this->db->query($querySubMenu)->result_array();
    ?>

    <?php foreach ($sub_menu as $sb) : ?>
      <!-- Nav Item - Charts -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= $sb['url'] ?>">
          <i class="<?= $sb['icon'] ?>"></i>
          <span><?= $sb['title'] ?></span></a>
      </li>
    <?php endforeach ?>
    <hr class="sidebar-divider">
  <?php endforeach ?>

</ul>
<!-- End of Sidebar -->