<?php

use \MIME\Base64\URLSafe;

class MIME_Base64_URLSafeTest extends \PHPUnit_Framework_TestCase
{
    private function tryEncodeDecode($data1, $data2)
    {
        $this->assertEquals(
                URLSafe::b64encode($data1),
                $data2
                );

        $this->assertEquals(
                URLSafe::b64decode($data2),
                $data1
                );
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
}
