<!-- sidebar -->
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="<?= base_url('assets/dist/assets') ?>/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <?php foreach (getQueryMenu($this->session->userdata('login')['level_id']) as $menu) : ?>
                    <li class="sidebar-item<?= getQuerySubMenu($menu['menu_id']) ? ' has-sub' : '' ?><?= $head == $menu['menu'] ? ' active' : '' ?>">
                        <a href="<?= base_url($menu['url']) ?>" class='sidebar-link'>
                            <i class="<?= $menu['icon'] ?>"></i>
                            <span><?= $menu['menu'] ?></span>
                        </a>
                        <ul class="submenu<?= $menu['menu'] == $head ? ' active' : '' ?>">
                            <?php foreach (getQuerySubMenu($menu['menu_id']) as $sm) : ?>
                                <li class="submenu-item<?= $sm['submenu_url'] == uri_string() ? ' active' : ''
                                                        ?>">
                                    <a href="<?= base_url($sm['submenu_url']) ?>"><?= $sm['submenu'] ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
                <li class="sidebar-item  ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>