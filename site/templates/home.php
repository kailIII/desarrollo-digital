<?php $root = $pages->get("/"); ?>
<!DOCTYPE html>

<html lang="en">

    <?php include("./head.inc"); ?>

    <body>
            <img src="http://www.gob.cl/wp-content/themes/gobcl2/img/logo-main.png" class="gob-logo" />
            <!-- Main Section -->
            <div id="section-<?php echo $page->id; ?>" class="section"
                style="background-image: url('<?php echo $page->images->first()->url; ?>')"
                data-center-top="background-position:0px 0px;" 
                data-top-bottom="background-position:0px -50px;"
                >
                <div class="trama">

                    <div id="header-container" class="container">
                        <div class="row">
                            <div class="col-md-10 vert-offset-top-16 col-md-offset-2 site-title">
                                <h1 style="display:none;"><?php echo $page->title;?></h1>
                                <img src="/site/assets/files/1/agenda-digital-2020.png" />
                                <img src="/site/assets/files/1/intro-texto.png" />
                            </div>
                            <!-- Static navbar -->
                            <div class="navbar-placeholder col-md-offset-2 vert-offset-bottom-14">
                                <div class="navbar navbar-default" role="navigation">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="navbar-header">
                                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                        <span class="sr-only">Toggle navigation</span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                    </button>
                                                </div>
                                                <div class="navbar-collapse collapse">
                                                    <ul class="nav navbar-nav main-menu">
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
                echo '<div class="container"><div class="row"><div class="col-md-10 col-md-offset-2">';
                echo    '<h1>'.$principal->title.'</h1>';
                echo '</div></div></div>';
                echo '<div class="destacado">';
                echo    '<div class="container"><div class="row"><div class="col-md-10 col-md-offset-1">';
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
                echo '<div class="container"><div class="row"><div class="col-md-10 col-md-offset-1">';

                //Secundaria
                $secundarias = $principal->children()->sort("order");

                if($secundarias->count()){
                    echo '<div class="secundaria"><div class="row"><div class="col-md-12">';
                }
                foreach($secundarias as $secundaria) {
                    if (strtolower($secundaria->title) == "contenido de la agenda"){
                        // tarjetas
                        echo '<div class="content-block">';
                        echo '<h3 id="section-'.$secundaria->id.'">'.$secundaria->title.'</h3>';
                        echo '</div>';

                        echo '<img class="card" src="/site/assets/files/1030/agenda-digital-capitulo_01.png" />';
                        echo '<div class="download-card"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Capitulo 1 - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL, Capítulo 1</p><p class="titulo"><strong>Derechos Para el Desarrollo Digital</strong></p><p>Documento PDF, 534KB</p></span></div>';
                        
                        echo '<img class="card" src="/site/assets/files/1030/agenda-digital-capitulo_02.png" />';
                        echo '<div class="download-card"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Capitulo 2 - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL, Capítulo 2</p><p class="titulo"><strong>Conectividad Digital</strong></p><p>Documento PDF, 558KB</p></span></div>';

                        echo '<img class="card" src="/site/assets/files/1030/agenda-digital-capitulo_03.png" />';
                        echo '<div class="download-card"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Capitulo 3 - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL, Capítulo 3</p><p class="titulo"><strong>Gobierno Digital</strong></p><p>Documento PDF, 623KB</p></span></div>';

                        echo '<img class="card" src="/site/assets/files/1030/agenda-digital-capitulo_04.png" />';
                        echo '<div class="download-card"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Capitulo 4 - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL, Capítulo 4</p><p class="titulo"><strong>Economía Digital</strong></p><p>Documento PDF, 635KB</p></span></div>';

                        echo '<img class="card" src="/site/assets/files/1030/agenda-digital-capitulo_05.png" />';
                        echo '<div class="download-card"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Capitulo 5 - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL, Capítulo 5</p><p class="titulo"><strong>Competencias Digitales</strong></p><p>Documento PDF, 647KB</p></span></div>';

                    } elseif (strtolower($secundaria->title) == "integrantes del comité"){
                        echo '<div class="content-block">';
                        echo '<h3 id="section-'.$secundaria->id.'">'.$secundaria->title.'</h3>';
                        include("./comite-cards.inc");
                        echo '</div>';
                    }elseif (strtolower($secundaria->title) == "secretaría ejecutiva"){
                        echo '<div class="content-block">';
                        echo '<h3 id="section-'.$secundaria->id.'">'.$secundaria->title.'</h3>';
                        echo '<p>'.$secundaria->body.'</p>';
                        include("./secretaria-cards.inc");
                        echo '</div>';
                    } elseif (strtolower($secundaria->title) == "capítulos para descarga"){
                        echo '<div class="content-block">';
                        echo '<h3 id="section-'.$secundaria->id.'">'.$secundaria->title.'</h3>';
                       
                        
                        echo '<div class="download-card single"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Capitulo 1 - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL, Capítulo 1</p><p class="titulo"><strong>Derechos Para el Desarrollo Digital</strong></p><p>Documento PDF</p></span></div>';
                        echo '<div class="download-card single"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Capitulo 2 - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL, Capítulo 2</p><p class="titulo"><strong>Conectividad Digital</strong></p><p>Documento PDF</p></span></div>';
                        echo '<div class="download-card single"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Capitulo 3 - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL, Capítulo 3</p><p class="titulo"><strong>Gobierno Digital</strong></p><p>Documento PDF</p></span></div>';
                        echo '<div class="download-card single"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Capitulo 4 - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL, Capítulo 4</p><p class="titulo"><strong>Economía Digital</strong></p><p>Documento PDF</p></span></div>';
                        echo '<div class="download-card single"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Capitulo 5 - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL, Capítulo 5</p><p class="titulo"><strong>Competencias Digitales</strong></p><p>Documento PDF</p></span></div>';
                        echo '<div class="download-card single"><a target="_blank" href="/site/assets/files/1030/Agenda Digital Gobierno de Chile - Noviembre 2015.pdf"><img class="pull-left" src="/site/assets/files/1030/ico-descarga.png" /></a>';
                        echo '<span class="pull-left"><p>AGENDA DIGITAL</p><p class="titulo"><strong>Documento Completo</strong></p><p>Documento PDF, 1,7MB</p></span></div><br/>';

                         echo '</div><br/>';

                    } else {
                        echo '<div class="content-block">';
                        echo '<h3 id="section-'.$secundaria->id.'">'.$secundaria->title.'</h3>';
                        echo '<p>'.$secundaria->body.'</p>';
                        echo '</div>';    
                    }

                    
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