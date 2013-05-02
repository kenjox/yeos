
    <div id="loginModal" class="modal hide fade">
        <div class="modal-body">


            <?php
                function custom_login_footer() {
                    return '</div>


                                        <div class="modal-footer">
                                                    <input type="submit" name="submit" value="'.__("Logga in").'" class="btn btn-success" id="submit"/>
                                                    <a href="'.get_bloginfo("home").'/wp-login.php?action=lostpassword"  class="btn btn-info">'.__("Glömt lösenord").'</a>
                                        </div>';
                }
                add_filter('login_form_bottom', 'custom_login_footer');
                wp_login_form(array("value_remember" => true));
            ?>
    </div>