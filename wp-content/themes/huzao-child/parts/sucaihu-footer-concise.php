<div class="g-footer">
        <div class="links">
            <div class="links-menu">
                <div class="logo">
                    <a href="/">
                        <img src="<?php echo esc_url( _cao( 'sucaihu_ui_footer_logo') ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
                </div>
                <p><?php echo _cao('sucaihu_ui_footer_desc');?></p>
            </div>
            <div class="links-menu links-menu2">
                <div class='menu-items'>
                    <h4><?php echo _cao('sucaihu_ui_footer_link1');?></h4>
                    <div class="menu-tx-design-container">
                        <ul id="menu-tx-design" class="menu">
                        <?php $footer_link1_group = _cao('sucaihu_ui_footer_link1_group');
                        if (!empty($footer_link1_group)) {
                            foreach ($footer_link1_group as $key => $link) {
                                $_blank = ($link['_blank']) ? ' target="_blank"' : '' ;
                                echo '<li id="menu-item-8939" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8939"><a'.$_blank.'  rel="noopener noreferrer" href="'.$link['_link'].'">'.$link['_title'].'</a></li>';
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div>
                <div class='menu-items'>
                    <h4><?php echo _cao('sucaihu_ui_footer_link2');?></h4>
                    <div class="menu-friend-links-container">
                        <ul id="menu-friend-links" class="menu">
                        <?php $footer_link1_group = _cao('sucaihu_ui_footer_link2_group');
                        if (!empty($footer_link1_group)) {
                            foreach ($footer_link1_group as $key => $link) {
                                $_blank = ($link['_blank']) ? ' target="_blank"' : '' ;
                                echo '<li id="menu-item-8933" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8933"><a'.$_blank.'  rel="noopener noreferrer" href="'.$link['_link'].'">'.$link['_title'].'</a></li>';
                            }
                        }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>