<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Calculator
 *
 * @author nguyentienthanh
 */
class Calculator extends PHPUnit_Framework_TestCase{
    
    public function testAdd() {
        $calculator = new SimpleClasses\Calculator();
        $this->assertEquals($calculator->add(1, 2), 1 + 2);
    }
}
