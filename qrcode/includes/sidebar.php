<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./index.php" class="brand-link" style="text-align:center; padding:0">
        <img src="dist/img/logo_horizontal_blanco_expressionway.png" alt="Logo" class="brand-image"
            style="opacity: .8; margin-right:auto; margin-left:auto; text-align:center; float:none; max-height:90px">
        <!--span class="brand-text font-weight-light">QR</span-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="margin-top: calc(6.5rem + 1px);">
        <!--Sidebar user panel (optional)
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Superadmin</a>
            </div>
        </div>

-->

        <!-- Sidebar Menu -->


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="./eways.php"
                        <?php echo (CURRENT_PAGE == 'eways.php') ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                        <i class="nav-icon fas fa-qrcode"></i>
                        <p>
                            MIS EWAYS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./people.php"
                        <?php echo (CURRENT_PAGE == 'people.php' || (substr(CURRENT_PAGE, 0, 14) == 'user_profile.php')) ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>PERSONAS</p>
                    </a>
                </li>

                <!--AVANZADO-->
                <!--nivel 1-->
                <li
                    <?php echo (CURRENT_PAGE == 'index.php' || CURRENT_PAGE == 'dynamic_qrcodes.php' || CURRENT_PAGE == 'add_dynamic.php' || (substr(CURRENT_PAGE, 0, 16) == 'edit_dynamic.php') || CURRENT_PAGE == 'static_qrcodes.php' || CURRENT_PAGE == 'add_static.php' || (substr(CURRENT_PAGE, 0, 15) == 'edit_static.php') || CURRENT_PAGE == 'admin_users.php' || CURRENT_PAGE == 'add_admin.php' || (substr(CURRENT_PAGE, 0, 14) == 'edit_admin.php') || CURRENT_PAGE == 'users_directory.php' || (substr(CURRENT_PAGE, 0, 14) == 'user_profile.php')) ? ' class="nav-item has-treeview menu-open"' : ' class="nav-item has-treeview"'; ?>>
                    <a href="#"
                        <?php echo (CURRENT_PAGE == 'index.php' || CURRENT_PAGE == 'dynamic_qrcodes.php' || CURRENT_PAGE == 'add_dynamic.php' || (substr(CURRENT_PAGE, 0, 16) == 'edit_dynamic.php') || CURRENT_PAGE == 'static_qrcodes.php' || CURRENT_PAGE == 'add_static.php' || (substr(CURRENT_PAGE, 0, 15) == 'edit_static.php') || CURRENT_PAGE == 'admin_users.php' || CURRENT_PAGE == 'add_admin.php' || (substr(CURRENT_PAGE, 0, 14) == 'edit_admin.php') || CURRENT_PAGE == 'users_directory.php' || (substr(CURRENT_PAGE, 0, 14) == 'user_profile.php')) ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            AVANZADO
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <!--nivel 2 -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.php"
                                <?php echo (CURRENT_PAGE == 'index.php') ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    ESTADÍSTICAS
                                </p>
                            </a>
                        </li>
                        <li
                            <?php echo (CURRENT_PAGE == 'dynamic_qrcodes.php' || CURRENT_PAGE == 'add_dynamic.php' || (substr(CURRENT_PAGE, 0, 16) == 'edit_dynamic.php')) ? ' class="nav-item has-treeview menu-open"' : ' class="nav-item has-treeview"'; ?>>
                            <a href="#"
                                <?php echo (CURRENT_PAGE == 'dynamic_qrcodes.php' || CURRENT_PAGE == 'add_dynamic.php' || (substr(CURRENT_PAGE, 0, 16) == 'edit_dynamic.php')) ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                <i class="nav-icon fa fa-qrcode"></i>
                                <p>
                                    QR DINÁMICOS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <!--nivel 3 -->
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./dynamic_qrcodes.php"
                                        <?php echo (CURRENT_PAGE == 'dynamic_qrcodes.php') ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>VER TODOS</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./add_dynamic.php"
                                        <?php echo (CURRENT_PAGE == 'add_dynamic.php') ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>NUEVO</p>
                                    </a>
                                </li>
                            </ul>
                            <!--fin nivel 3 -->
                        </li>
                        <!--nivel 2 -->
                        <li
                            <?php echo (CURRENT_PAGE == 'static_qrcodes.php' || CURRENT_PAGE == 'add_static.php' || (substr(CURRENT_PAGE, 0, 15) == 'edit_static.php')) ? ' class="nav-item has-treeview menu-open"' : ' class="nav-item has-treeview"'; ?>>
                            <a href="#"
                                <?php echo (CURRENT_PAGE == 'static_qrcodes.php' || CURRENT_PAGE == 'add_static.php' || (substr(CURRENT_PAGE, 0, 15) == 'edit_static.php')) ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                <i class="nav-icon fa fa-qrcode"></i>
                                <p>
                                    QR ESTÁTICOS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <!--nivel 3 -->
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./static_qrcodes.php"
                                        <?php echo (CURRENT_PAGE == 'static_qrcodes.php') ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>VER TODOS</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./add_static.php"
                                        <?php echo (CURRENT_PAGE == 'add_static.php') ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>NUEVO</p>
                                    </a>
                                </li>
                            </ul>
                            <!--fin nivel 3 -->
                        </li>

                        <?php if ($_SESSION['admin_type'] == 'super') : ?>
                        <li class="nav-item">
                            <a href="./admin_users.php"
                                <?php echo (CURRENT_PAGE == 'admin_users.php' || CURRENT_PAGE == 'add_admin.php' || (substr(CURRENT_PAGE, 0, 14) == 'edit_admin.php')) ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                <i class="fas fa-users nav-icon"></i>
                                <p>USUARIOS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./setting_list.php"
                                <?php echo (CURRENT_PAGE == 'setting_list.php' || CURRENT_PAGE == 'add_setting.php' || (substr(CURRENT_PAGE, 0, 16) == 'edit_setting.php')) ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                <i class="fas fa-users-cog nav-icon"></i>
                                <p>SOCIAL LOGIN</p>
                            </a>
                        </li>
                        <?php endif ?>
                        <li class="nav-item">
                            <a href="./admin_user_profile.php"
                                <?php echo (CURRENT_PAGE == 'admin_user_profile.php' || (substr(CURRENT_PAGE, 0, 12) == 'admin_user_profile.php')) ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                <i class="nav-icon fa fa-id-card" aria-hidden="true"></i>
                                <p>EDITAR MI PERFIL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./users_directory.php"
                                <?php echo (CURRENT_PAGE == 'users_directory.php' || (substr(CURRENT_PAGE, 0, 14) == 'user_profile.php')) ? ' class="nav-link active"' : ' class="nav-link"'; ?>>
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>LISTADO DE PERSONAS</p>
                            </a>
                        </li>
                    </ul>
                    <!--fin nivel 2 -->
                </li>
            </ul>
        </nav>


        <div class="float-right mt-5 mb-4 mr-2">
            <a href="add_eway.php" class="btn btn-lg bg-primary text-lg"><i class="fas fa-plus-circle text-lg mr-2"></i>
                NUEVO</a>
        </div>


        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>