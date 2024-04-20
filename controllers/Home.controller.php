<?php

require_once("./controllers/Main.controller.php");
require_once("controllers/Tools.controller.php");
require_once("controllers/Functions.controller.php");
require_once("./models/Home.model.php");


class HomeController extends MainController
{


    private $functions;
    private $homeManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->homeManager = new HomeManager();  
    }


}