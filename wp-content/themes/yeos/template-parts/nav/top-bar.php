<nav id="navcontainer"  class="navbar navbar-static-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php bloginfo("home"); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>
            <?php
            $navigation = 'primary_navigation';
            wp_nav_menu( array(
                'container' => 'div',
                'container_class' => 'nav-collapse collapse',
                'theme_location' => $navigation,
                'menu_class' => 'nav pull-right',
                'walker' => new twitter_bootstrap_nav_walker(),
            ) );
            ?>

        </div>
    </div>
</nav>