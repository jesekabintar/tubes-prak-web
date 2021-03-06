<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <!-- <img src="<?= base_url('dist/'); ?>img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <i class="fas fa-code elevation pl-3" style="opacity: .8"></i>
        <span class="brand-text font-weight-light">AdminLTE</span>

    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('dist/img/') . $user['image'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['username']; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                <!-- QUERY MENU -->
                <?php
                // $role_id = $this->session->userdata('level');
                $role_id = $user['role_id'];
                // $queryMenu = "SELECT `user_menu`.`id`, `menu`
                //                     FROM `user_menu` JOIN `user_access_menu`
                //                     ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                //                     WHERE `user_access_menu`.`role_id` = $role_id
                //                     ORDER BY `user_access_menu`.`id_menu` ASC
                //                     ";
                $queryMenu = "SELECT user_menu.id, menu
                                    FROM user_menu JOIN user_access_menu
                                    ON user_menu.id = user_access_menu.menu_id
                                    WHERE user_access_menu.role_id = '$role_id'
                                    ORDER BY user_access_menu.menu_id ASC
                                    ";
                $menu = $this->db->query($queryMenu)->result_array();
                ?>

                <li class="nav-header">MAIN NAVIGATION</li>

                <?php foreach ($menu as $m) : ?>
                    <!-- <li class="nav-header">
                        <?= $m['menu']; ?>
                    </li> -->

                    <?php
                    $menuId = $m['id'];
                    // $querySubMenu = "SELECT *
                    //                 FROM user_sub_menu JOIN user_menu
                    //                 ON user_sub_menu.menu_id = user_menu.id
                    //                 WHERE user_sub_menu.menu_id = '$menuId'
                    //                 ";
                    $querySubMenu = "SELECT * FROM user_sub_menu
                                    WHERE menu_id = $menuId
                                    ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>

                    <?php foreach ($subMenu as $sm) : ?>
                        <li class="nav-item">
                            <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                                <i class="<?= $sm['icon']; ?>"></i>
                                <p><?= $sm['tittle']; ?></p>
                            </a>
                        </li>
                    <?php endforeach; ?>


                <?php endforeach; ?>

                <!-- <li class="nav-header">USER</li> -->
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Mahasiswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Data Master
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cash-register"></i>
                            <p>
                                Data Produk
                            </p>
                        </a>
                    </li> -->
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>