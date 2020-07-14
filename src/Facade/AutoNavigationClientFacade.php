<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AutoNavigationClientFacade
 *
 * @author lrava
 */
namespace Rider\Autonavigation\Facade;


use Illuminate\Support\Facades\Facade;

class AutoNavigationClientFacade extends Facade {
   
    protected static function getFacadeAccessor() { return 'autonavigation_client'; }
    
}
