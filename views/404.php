<?php
BaseClass::$oHeader->addCss("shop-homepage.css");
BaseClass::$oHeader->setTitle("Error 404");
include BaseClass::$oVariables->sIncFolder . "header_inc.php";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
            <?php BaseClass::$oMenu->show();?>
        </ul>
    </div>
</nav>
<div class="jumbotron">
    <div class="row">
        <div class="col-lg-12">
            De pagina die u wilde bezoeken kan niet gevonden worden
        </div>
    </div>
</div>
<?php
include BaseClass::$oVariables->sIncFolder . "end_inc.php";
?>