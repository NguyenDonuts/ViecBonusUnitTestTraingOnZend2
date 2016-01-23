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
    
    private $calculator;
    
    public function setUp() {
        $this->calculator = new SimpleClasses\Calculator();
        parent::setUp();
    }
    
    public function tearDown() {
        parent::tearDown();
    }

    public function addFunctionDataProvider() {
        return array (
            array(1,2,3),
            array(2,2,4)
        );
    }

    /** @dataProvider addFunctionDataProvider */
    public function testAdd($a, $b, $expected_result) {
        $this->assertEquals($expected_result,$this->calculator->add($a, $b));
    }
    
    public function addFunctionExceptionDataProvider() {
        return array(
            array(NULL,1),
            array(NULL,NULL),
            array(1,NULL)
        );
    }
    
    /** @dataProvider addFunctionExceptionDataProvider 
     * @expectedException SimpleClasses\NullParameterException 
     */
    public function testAddException($a,$b) {
        $this->calculator->add($a, $b);
    }
    
    public function GPAFunctionDataProvider() {
        return array(
            array(7,2,3)
        );
    }

    /** @dataProvider GPAFunctionDataProvider */
    public function testGPAFunction($expected_gpa, $class_id1,$class_id2) {
        $grade = $this->getMockBuilder('SimpleClass\Grade')
                      ->getMock();
        
        $grade->expects($this->any())
              ->method('getGradeOfStudent')
              ->with($this->logicalOr(
                        $this->equalTo(2),
                        $this->equalTo(3)
                      ))
              ->will($this->returnCallback(
                        function ($param) {
                            switch ($param) {
                                case 2:
                                return 5;
                                case 3:
                                return 9;
                            default:
                                break;
                            }
                        }
                      ));
        
        $this->assertEquals($expected_gpa, $this->calculator->gpa($grade, $class_id1, $class_id2));
    }
}
