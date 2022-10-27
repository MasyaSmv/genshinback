<?php

function object_to_array($obj) {
    //only process if it's an object or array being passed to the function
    if(is_object($obj) || is_array($obj)) {
        $ret = (array) $obj;
        foreach($ret as &$item) {
            //recursively process EACH element regardless of type
            $item = object_to_array($item);
        }
        return $ret;
    }
    //otherwise (i.e. for scalar values) return without modification
    else {
        return $obj;
    }
}