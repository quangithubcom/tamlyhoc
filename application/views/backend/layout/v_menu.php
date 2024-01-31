<?php $list_menu = $this->MainModel->getFatherMenu(0); ?>
<?php $id_user = $this->session->userdata('LoggedIn')['id']; ?>
<?php $view_user = $this->MainModel->viewId('tb_user',$id_user); ?>
<?php $decentralization = json_decode($view_user['decentralization']); ?>
<ul class="metismenu list-unstyled" id="side-menu">
    <?php foreach ($list_menu as $menu): ?>
        <?php $list_menu_sub = $this->MainModel->getFatherMenu($menu['id']); ?>
        <?php if(in_array($menu['id'], $decentralization)){ ?>
        <?php if(count($list_menu_sub) == 0){ ?>
            <li>
                <a href="<?= base_url().$menu['link_menu']; ?>" class="waves-effect">
                    <i class="<?= $menu['icon_font']; ?>"></i>
                    <span><?= $menu['name_menu']; ?></span>
                </a>
            </li>
        <?php }else{ ?>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="<?= $menu['icon_font']; ?>"></i>
                    <span><?= $menu['name_menu']; ?></span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <?php foreach ($list_menu_sub as $menu_sub): ?>
                        <?php $list_menu_sub_2 = $this->MainModel->getFatherMenu($menu_sub['id']); ?>
                        <?php if(in_array($menu_sub['id'], $decentralization)){ ?>
                        <li>
                            <a href="<?php if(count($list_menu_sub_2) == 0){ echo base_url().$menu_sub['link_menu']; }else{ echo 'javascript: void(0);'; } ?>"<?php if(count($list_menu_sub_2) > 0){ echo ' class="has-arrow"'; }; ?>><?= $menu_sub['name_menu']; ?></a>
                        <?php if(count($list_menu_sub_2) > 0){ ?>
                            <ul class="sub-menu" aria-expanded="false">
                                <?php foreach ($list_menu_sub_2 as $menu_sub_2): ?>
                                    <?php if(in_array($menu_sub_2['id'], $decentralization)){ ?>
                                    <li><a href="<?= base_url().$menu_sub_2['link_menu']; ?>"><?= $menu_sub_2['name_menu']; ?></a></li>
                                <?php } ?>
                                <?php endforeach ?>
                            </ul>
                        <?php } ?>
                        </li>
                    <?php } ?>
                    <?php endforeach ?>
                </ul>
            </li>
        <?php } ?>
    <?php } ?>
    <?php endforeach ?>
    
</ul>