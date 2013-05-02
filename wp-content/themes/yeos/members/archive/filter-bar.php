<section id="filternavcontainer">
    <div class="container">
    <div class="row">
        <div class="span3">
            <h4 class="subheader">Filtrera medlemmar</h4>
        </div>
        <div id="filters" class="span6">

            <div class="btn-group">
                <button class="btn" data-toggle="dropdown">Område
                    <span class="caret"></span>
                </button>

                <ul class="dropdown-menu">
                    <?php
                        $terms = get_terms('memberfields_area', array('hide_empty' => false));
                        if(is_array($terms)):
                            foreach($terms as $term){
                                $url = ($qv = get_query_var('memberfields_expertise')) ? add_query_arg('expertis',$qv,get_term_link($term)) : get_term_link($term);
                                $url = (isset($_GET['expertis'])) ? add_query_arg('expertis',$_GET['expertis'],get_term_link($term)) : $url;
                                echo '<li><a href="'.$url.'" title="">'.$term->name.'</a></li>';
                            }
                        else:
                            echo '<li>Inga städer hittades</li>';
                        endif;
                    ?>

                </ul>
            </div>

            <div class="btn-group">
                <button class="btn" data-toggle="dropdown">Kunskaper
                    <span class="caret"></span>
                </button>

                <ul class="dropdown-menu">
                    <?php
                    $terms = get_terms('memberfields_expertise', array('hide_empty' => false));
                    if(is_array($terms)):
                        foreach($terms as $term){
                            $url = ($qv = get_queried_object_id()) ? add_query_arg('area',$qv,get_term_link($term)) : get_term_link($term);
                            $url = (isset($_GET['area'])) ? add_query_arg('area',$_GET['area'],get_term_link($term)) : $url;
                            echo '<li><a href="'.$url.'" title="">'.$term->name.'</a></li>';
                        }
                    else:
                        echo '<li>Inga städer hittades</li>';
                    endif;
                    ?>
                </ul>
            </div>

        </div>
        <div class="span3">
            <form role="search" method="get" id="searchform" class="" action="">
                <label class="">
                    <i class='icon-search icon-white right'></i>
                    <input type="text" value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : ''; ?>" name="search" id="s" class="input-text" >
                    <input type="hidden" name="area" value="<?php echo $_GET['area']; ?>">
                    <input type="hidden" name="expertis" value="<?php echo $_GET['expertis']; ?>">
                </label>
            </form>
        </div>
    </div>
    </div>
</section>