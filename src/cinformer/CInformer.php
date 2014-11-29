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
    public $valid = array();

    /**
     * Constructor for CInformer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->valid = ['info', 'error', 'success', 'warning'];
    }

    /**
     * Set the message into session variable
     *
     * @return boolean
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

        return true;
    }

    /**
     * Get the message from the session variable
     *
     * @return array $flash that contains the message type and the message string
     */
    public function getMessage()
    {
        $flash = array();
        $flash['type'] = $_SESSION['flash']['type'];
        $flash['message'] = $_SESSION['flash']['message'];

        return $flash;
    }

    /**
     * Clear the session variable content
     *
     * @return boolean
     */
    public function clear()
    {
        unset($_SESSION['flash']);
        return true;
    }
}