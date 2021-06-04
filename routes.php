<?php
    function call($controller, $action){
        require_once('controllers/'.$controller.'_controller.php');
        
        switch($controller){
            case 'guest':
                $controller= new Guest();
                break;
            case 'user':
                $controller=new Users();
                break;
            case 'vip':
                $controller=new Vip();
                break;
            case 'admin':
                $controller=new Admin();
                break;
        }
        
        $controller->$action();
    }
    
    $controllers=array('guest'=>['index', 'loginShow', 'login', 'error', 'changePassword', 'changePasswordShow', 'index1', 'signIn', 'signInShow', 'searchAd', 'fullAd', 'postaviKomPre', 'postaviKom'],
                       'user'=>['index', 'logout', 'myAd', 'savedAd', 'saveAd', 'unsaveAd', 'adAdShow', 'adAd', 'fullAd', 'searchAd', 'postaviKomPre', 'beVipShow', 'postaviKom'],
                       'vip'=>['index', 'logout', 'myAd', 'savedAd', 'adAdShow', 'adAd', 'oznaceniAd', 'searchAd', 'saveAd', 'unsaveAd','fullAd', 'searchAd', 'postaviKomPre', 'postaviKom'],
                       'admin'=>['index', 'logout', 'giveVip', 'giveVipShow', 'takeVip', 'takeVipShow', 'banUserShow', 'banUser', 'deleteAd', 'deleteAdShow']);
    
    if(array_key_exists($controller, $controllers)){
        if(in_array($action, $controllers[$controller])){
            call($controller, $action);
        }
        else{
            call('guest', 'error');
        }
    }
    else{
        call('guest', 'error');
    }
?>