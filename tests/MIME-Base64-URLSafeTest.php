<?php

use \MIME\Base64\URLSafe;

class MIME_Base64_URLSafeTest extends \PHPUnit_Framework_TestCase
{
    private function tryEncodeDecode($data1, $data2)
    {
        $this->assertEquals(URLSafe::b64encode($data1), $data2);
        $this->assertEquals(URLSafe::b64decode($data2), $data1);
    }

    public function test1()
    {
        $this->tryEncodeDecode("000000", "MDAwMDAw");
    }

    public function test2()
    {
        $this->tryEncodeDecode("\0\0\0\0", "AAAAAA");
    }

    public function test3()
    {
        $this->tryEncodeDecode("\xff", "_w");
    }

    public function test4()
    {
        $this->tryEncodeDecode("\xff\xff", "__8");
    }

    public function test5()
    {
        $this->tryEncodeDecode("\xff\xff\xff", "____");
    }

    public function test6()
    {
        $this->tryEncodeDecode("\xff\xff\xff\xff", "_____w");
    }

    public function test7()
    {
        $this->tryEncodeDecode("\xfb", "-w");
    }

    public function testPaddingWithSpaces()
    {
        $this->assertEquals(URLSafe::b64decode(" AA"), "\0");
        $this->assertEquals(URLSafe::b64decode("\tAA"), "\0");
        $this->assertEquals(URLSafe::b64decode("\rAA"), "\0");
        $this->assertEquals(URLSafe::b64decode("\nAA"), "\0");
    }
}
