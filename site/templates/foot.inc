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
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-4">
                            <img class="img-responsive" src="site/templates/img/desarrollodigital.png" alt="Desarrollo Digital">
                        </div>
                        <div class="col-xs-8">
                            <h3>Desarrollo digital:</h3>
                            <ul>
                                <li>Ministerio Secretaría General de la Presidencia</li>
                                <li>Ministerio de Transporte y Telecomunicaciones</li>
                                <li>Ministerio de Economía, Fomento y Turismo</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="social">
                        <a target="_blank" href="https://twitter.com/modernizacioncl"><img src="site/templates/img/social/twitter.png" alt="Twitter"></a>
                        <a target="_blank" href="https://www.facebook.com/ModernizacionyGobiernoDigital"><img src="site/templates/img/social/facebook.png" alt="Facebook"></a>
                        <a target="_blank" href="https://github.com/e-gob"><img src="site/templates/img/social/github.png" alt="Github"></a>
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
