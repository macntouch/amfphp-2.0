<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * a simple authentication service, used for testing the AmfphpAuthentication plugin
 *
 * @author Ariel Sommeria-klein
 */
class AuthenticationService {

    /**
     * test login function
     * 
     * @param <type> $userid
     * @param <type> $password
     */
    public function login($userId, $password){
        if(($userId == "user") && ($password == "userPassword")){
            AmfphpAuthentication::addRole("user");
        }
        if(($userId == "admin") && ($password == "adminPassword")){
            AmfphpAuthentication::addRole("admin");
        }
    }

    /**
     * test logout function
     */
    public function logout(){
        AmfphpAuthentication::clearSessionInfo();
    }

    /**
     * function the authentication plugin uses to get accepted roles for each function
     * Here login and logout are not protected, however
     * @param <String> $methodName
     * @return <array>
     */
    public function getMethodRoles($methodName){
       if($methodName == "adminMethod"){
           return array("admin");
       }else{
           return null;
       }
    }

    /**
     * method that is protected by authentication. Only "admin" role is authorized. (see getMethodRoles)
     * @return <String> "ok"
     */
    public function adminMethod(){
        return "ok";
    }

}
?>
