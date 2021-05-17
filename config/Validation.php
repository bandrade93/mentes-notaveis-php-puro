<?php

class Validation
{
    function validationData($input)
    {
        foreach ($input as $key => $value) {
            if($value == "") {
                return false;
            }
        }

        return true;
    }

    function utf8EncodeDeep(&$input) 
    {
        if (is_string($input)) {
            $input = utf8_encode($input);
        } else if (is_array($input)) {
            foreach ($input as &$value) {
                $this->utf8EncodeDeep($value);
            }
            
            unset($value);
        } else if (is_object($input)) {
            $vars = array_keys(get_object_vars($input));
            
            foreach ($vars as $var) {
                $this->utf8EncodeDeep($input->$var);
            }
        }

        return $input;
    }

}