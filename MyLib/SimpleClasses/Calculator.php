<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SimpleClasses;

/**
 * Description of Calculator
 *
 * @author nguyentienthanh
 */
class Calculator {
    //put your code here
    function add($a, $b) {
        if (!isset($a) || !isset($b)) {
            throw new NullParameterException();
        }
        return $a+$b;
    }
    
    function gpa($grade, $class_id1, $class_id2) {
        return ($grade->getGradeOfStudent($class_id1) 
                + $grade->getGradeOfStudent($class_id2) ) / 2;
    }
}
