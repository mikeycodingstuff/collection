<?php

require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class Functions extends TestCase {
    public function testSuccessDisplayAlbums()
    {
        $expected = '<div><p><h2>Album Title: </h2>abc</p><p><h3>Artist: </h3>123</p><p><h3>Number of Tracks: </h3>' . 5 . '</p><p><h3>Album Length: </h3>40:22</p></div>';
        $testInput1 = [['name' => 'abc', 'artist' => '123', 'tracks' => 5, 'length' => '40:22']];
        $case = displayAlbums($testInput1);
        $this->assertEquals($expected, $case);
    }
    
}

?>