<?php

class Photo {
    private $_db;
    private $_data;
    private $_results;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function upload($fields = array()) {
        if (!$this->_db->insert('pictures', $fields)) {
            throw new Exception('There was a problem creating new account');
        }
    }

    public function delete($fields = array()) {
        if (!$this->_db->query('DELETE FROM pictures WHERE id=?', $fields)) {
            throw new Exception('There was a problem creating new account');
        }
    }

    public function find($user = null) {
        if ($user) {
            $field = (is_numeric($user)) ? 'user_id' : 'user_username';
            $data = $this->_db->get('pictures', array($field, '=', $user));
            $_results = $_db->query("SELECT * FROM pictures WHERE user_id = ?", array($user))->results();

            die(var_dump($_results));
            if ($data->count()) {
                $this->_data = $data;    
                return (true);
            }
        }
        return (false);
    }

    public function get_pics()
    {
        return ($_results);
    }
    public function data() {
        return ($this->_data);
    }
}
