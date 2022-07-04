<?php
/**
 * Cette classe nous permettra de gérer les sections
 */
class Session 
{
    /**
     * Vérifie si un id de session existe sinon il démarre la session
     */
    public static function init()
    {
        if(session_id() == '')
        {
            session_start();
        }
    }

    /**
     * Cette méthode vérifie si une clé de session spécifique existe et si oui renvoie sa valeur
     */
    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    /**
     * Permet de créer ou de modifier des variables dans le tableau des sessions.
    */
    public static function set($key, $value)
    {
        self::init();
        $_SESSION[$key] = $value;
    }

    /**
     * Vérifie si la variable de session existe connect est à true
     */
    public static function checkSession()
    {
        self::init();
        if(self::get("connect") == false)
        {
            return false;
            self::destroy();
        }
        else 
            return true;
    }

    /**
     * Détruit la session
     */
    public static function destroy()
    {
        session_unset();
        session_destroy();
        //header('Location: index.php');
    }
}