<?php


/**
 * Description of items
 *
 * @author Leandro Rawicz <lrawicz@gmail.com>
 */
class Usableitems extends items {
    public $_object;
    public $_method;
    public $_value;
    public function __construct($name, $object = null, $method = null, $value = null) {
        $this->_method = $method;
        $this->_object = $object;
        $this->_value = $value;
        parent::__construct($name);
    }
    
}
