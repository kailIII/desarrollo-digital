<?php $root = $pages->get("/"); ?>
<footer>
    <div class="area1">
        <div class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <ul class="nav navbar-nav">
                    <?php
                    $menu = '';
                    //Principal
                    foreach($root->children()->sort("order") as $principal) {
                        //Secundaria
                        $secundarias = $principal->children()->sort("order");
                        $menu .= "<li><a class='scrollToLink' href='#section-{$principal->id}'>{$principal->title}</a></li>";
                        /*foreach($secundarias as $secundaria){
                            $menu .= "<li><a class='scrollToLink scrollToLinkSecundaria' href='#section-{$secundaria->id}'>{$secundaria->title}</a></li>";
                        }*/
                    }
                    echo $menu;
                    ?>
                </ul>
            </div><!--/.container-fluid -->
        </div>
    </div>
    <div class="area2">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <a href="http://www.minsegpres.gob.cl" target="_blank"><img src="http://presupuesto.datos.gob.cl/img/minsegpres.png" alt="Ministerio Secretaría General de la Presidencia"></a>
                    <a href="http://www.dipres.gob.cl" target="_blank"><img src="http://presupuesto.datos.gob.cl/img/dipres.png" alt="Dirección de Presupuestos"></a>
                    <a href="http://www.dipres.gob.cl" target="_blank"><img src="http://presupuesto.datos.gob.cl/img/dipres.png" alt="Dirección de Presupuestos"></a>
                    <a href="http://www.dipres.gob.cl" target="_blank"><img src="http://presupuesto.datos.gob.cl/img/dipres.png" alt="Dirección de Presupuestos"></a>
                </div>
                <div class="col-xs-6">
                    <div class="social">
                        <a target="_blank" href="https://twitter.com/modernizacioncl"><img src="http://presupuesto.datos.gob.cl/img/twitter.png" alt="Twitter"></a>
                        <a target="_blank" href="https://www.facebook.com/ModernizacionyGobiernoDigital"><img src="http://presupuesto.datos.gob.cl/img/facebook.png" alt="Facebook"></a>
                        <a target="_blank" href="https://github.com/e-gob"><img src="http://presupuesto.datos.gob.cl/img/github.png" alt="Github"></a>
                    </div>
                    <div class="politicas">
                        <a href="#">Politicas de Privacidad</a> | <a href="">Visualizadores y Plugins</a> | <a href="#">CC</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="<?php echo $config->urls->templates?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $config->urls->templates?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $config->urls->templates?>js/skrollr.min.js"></script>
<script type="text/javascript" src="<?php echo $config->urls->templates?>js/main.js"></script>