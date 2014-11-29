<?php

namespace Olive\CInformer;

/**
 * Flash message class used for setting and displaying flash messages
 *
 */
class CInformer
{

    /**
     * Properties
     */
    public $valid = ['info', 'error', 'success', 'warning'];


    /**
     * Constructor for CInformer.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    
    /**
     * Set the message into session variable
     *
     */
    public function setMessage($data)
    {
        // initialize a flash session variable
        if(!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = array();
        }

        // check for valid message template. Set to default if not valid
        if(!in_array($data['type'], $this->valid)) {
            $data['type'] = $this->valid[0];
        }

        $_SESSION['flash']['type'] = $data['type'];
        $_SESSION['flash']['message'] = $data['message'];
    }

    /**
     * Get the message from the session variable
     *
     */
    public function getMessage()
    {
        $flash['type'] = $_SESSION['flash']['type'];
        $flash['message'] = $_SESSION['flash']['message'];

        return $flash;
    }

    /**
     * Clear the session variable content
     *
     */
    public function clear()
    {
        $_SESSION['flash'] = null;
        
        return true;
    }

}
