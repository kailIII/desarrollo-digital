<?php $root = $pages->get("/"); ?>
<!DOCTYPE html>

<html lang="en">

    <?php include("./head.inc"); ?>

    <body>

            <!-- Main Section -->
            <div id="section-<?php echo $page->id; ?>" class="section"
                style="background-image: url('<?php echo $page->images->first()->url; ?>')"
                data-center-top="background-position:0px 0px;" 
                data-top-bottom="background-position:0px -50px;"
                >
                <div class="trama">

                    <div id="header-container" class="container">
                        <img class="logo-grande hidden-xs hidden-sm" src="/site/templates/img/desarrollodigital.png" alt="Desarrollo Digital" />
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h1><?php echo $page->title;?></h1>
                            </div>    
                        </div>
                    </div>
                    <div class="destacado">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <?php echo $page->body;?>
                                </div>
                            </div>
                        </div>
                        <!-- Static navbar -->
                        <div class="navbar-placeholder">
                            <div class="navbar navbar-default" role="navigation">
                                <div class="container">
                                    <a href="#section-<?php echo $page->id; ?>" class="scrollToLink toTop">
                                        <img class="logo-chico" src="/site/templates/img/desarrollodigital_menu.png" alt="Desarrollo Digital" />
                                    </a>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                    <span class="sr-only">Toggle navigation</span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                            </div>
                                            <div class="navbar-collapse collapse">
                                                <ul class="nav navbar-nav">
                                                    <?php
                                                    $menu = '';
                                                    //Principal
                                                    foreach($root->children()->sort("order") as $principal) {
                                                        //Secundaria
                                                        $secundarias = $principal->children()->sort("order");
                                                        if($secundarias->count()){
                                                            $menu .= "<li class='dropdown'>
                                                                        <a id='section-{$principal->id}-anchor' href='javascript:;' class='dropdown-toggle' data-toggle='dropdown'>$principal->title<span class='caret'></span></a>
                                                                        <ul class='dropdown-menu' role='menu'>";
                                                            $menu .=     "<li><a class='scrollToLink' href='#section-{$principal->id}'>Introducción</a></li>";
                                                        }else{
                                                            $menu .= "<li><a class='scrollToLink' href='#section-{$principal->id}'>{$principal->title}</a></li>";
                                                        }
                                                        foreach($secundarias as $secundaria){
                                                            $menu .= "<li><a class='scrollToLink scrollToLinkSecundaria' href='#section-{$secundaria->id}'>{$secundaria->title}</a></li>";
                                                        }
                                                        $menu .= ($secundarias->count())?'</ul></li>':'';
                                                    }
                                                    echo $menu;
                                                    ?>
                                                </ul>
                                            </div><!--/.nav-collapse -->
                                        </div>
                                    </div>
                                </div><!--/.container-fluid -->
                            </div>
                        </div> <!--/.placeholder -->
                    </div><!-- Destacado navbar -->

                </div> <!--/.trama -->
            </div>



            <?php
            //Principal
            $imgIndex = 1;
            foreach($root->children()->sort("order") as $principal) {
                echo '<div id="section-'.$principal->id.'" class="row section" style="background-image: url(\''. $page->images->eq($imgIndex++)->url .'\')"'.
                    'data-center-top="background-position:0px 0px;"'.
                    'data-top-bottom="background-position:0px -500px;"'.
                '>';
                echo '<div class="trama">';
                echo '<div class="container"><div class="row"><div class="col-md-8 col-md-offset-2">';
                echo    '<h1>'.$principal->title.'</h1>';
                echo '</div></div></div>';
                echo '<div class="destacado">';
                echo    '<div class="container"><div class="row"><div class="col-md-8 col-md-offset-2">';
                echo        $principal->body;
                    //Planes
                    $planes = $principal->list;
                    if(count($planes)){
                        echo '<div class="row planes-container">';
                        foreach($planes as $l) {
                            echo    '<div class="col-md-4 planes">';
                            echo        '<div class="thumbnail">';
                            echo            '<div class="caption">';
                            echo                '<p><strong>Plan de Acción</strong><br/>'.$l->title.'</p>';
                            echo            '</div>';
                            echo        '</div>';
                            echo    '</div>';
                        }
                        echo '</div>';
                    }
                echo    '</div></div></div>'; // container
                echo '</div>'; //destacado
                echo '<div class="container"><div class="row"><div class="col-md-8 col-md-offset-2">';

                //Secundaria
                $secundarias = $principal->children()->sort("order");
                if($secundarias->count()){
                    echo '<div class="secundaria"><div class="row"><div class="col-md-12">';
                }
                foreach($secundarias as $secundaria){
                    echo '<h3 id="section-'.$secundaria->id.'">'.$secundaria->title.'</h3>';
                    echo '<p>'.$secundaria->body.'</p>';
                }
                if($secundarias->count()){
                    echo '</div></div></div>';
                }

                echo    '</div></div></div>'; //container
                echo '</div>'; //trama
                echo '</div>';//section
            }
            ?>

        <?php include("./foot.inc"); ?>

        <a href="#section-<?php echo $page->id; ?>" class="scrollToLink toTop toTopLink"><img src="/site/templates/img/ico_subir.png" alt="Ir arriba" /></a>

    </body>
</html>