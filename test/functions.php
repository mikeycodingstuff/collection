<?php

require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class Functions extends TestCase {
    public function testSuccessDisplayAlbums()
    {
        $expected = '<div class="album-container"><h3>' . 'abc' . '</h3><div><div><h4>Artist:</h4><p>' . '123' .
        '</p></div><div><h4>Number of Tracks:</h4><p>' . 5 . '</p></div><div><h4>Album Length:</h4><p>' . '40:22' . '</p></div></div></div>';
        $testInput1 = [['name' => 'abc', 'artist' => '123', 'tracks' => 5, 'length' => '40:22']];
        $case = displayAlbums($testInput1);
        $this->assertEquals($expected, $case);
    }
    
    public function testFailureDisplayAlbums()
    {
        $expected = 'missing data';
        $testInput1 = [[]];
        $case = displayAlbums($testInput1);
        $this->assertEquals($expected, $case);
    }

    public function testMalformedDisplayAlbums()
    {
        $testInput1 = 'string';
        $this->expectException(TypeError::class);
        $case = displayAlbums($testInput1);

    }

    public function testSuccessCheckFormIsset()
    {
        $expected = true;
        $testInput1 = ['name' => 'abc', 'artist' => '123', 'tracks' => 5, 'length' => '40:22'];
        $case = checkFormIsset($testInput1);
        $this->assertEquals($expected, $case);
    }

    public function testFailureCheckFormIsset()
    {
        $expected = false;
        $testInput1 = ['name' => 'abc', 'artist' => '123', 'tracks' => '', 'length' => '40:22'];
        $case = checkFormIsset($testInput1);
        $this->assertEquals($expected, $case);
    }

    public function testMalformedCheckFormIsset()
    {
        $testInput1 = 'test';
        $this->expectException(TypeError::class);
        $case = checkFormIsset($testInput1);
    }


    public function testSuccessSanitiseAndCreateArray()
    {
        $expected = ['name' => 'MF DOOM', 'artist' => 'Operation: Doomsday', 'tracks' => 19, 'length' => '58:21'];
        $testInput1 = 'MF DOOM';
        $testInput2 = 'Operation: Doomsday';
        $testInput3 = 19;
        $testInput4 = '58:21';
        $case = sanitiseAndCreateArray($testInput1, $testInput2, $testInput3, $testInput4);
        $this->assertEquals($expected, $case);
    }

    public function testMalformedSanitiseAndCreateArray()
    {
        $testInput1 = 'test';
        $testInput2 = [1];
        $testInput3 = 19;
        $testInput4 = '58:21';
        $this->expectException(TypeError::class);
        $case = sanitiseAndCreateArray($testInput1, $testInput2, $testInput3, $testInput4);
    }

    public function testSuccessValidateInputs()
    {
        $expected = true;
        $testInput1 = ['name' => 'MF DOOM', 'artist' => 'Operation: Doomsday', 'tracks' => 19, 'length' => '58:21'];
        $case = validateInputs($testInput1);
        $this->assertEquals($expected, $case);
    }

    public function testFailure1ValidateInputs()
    {
        $expected = false;
        $testInput1 = ['name' => 'MF DOOM', 'artist' => 'Operation: Doomsday', 'tracks' => 1912198371894, 'length' => '58:21'];
        $case = validateInputs($testInput1);
        $this->assertEquals($expected, $case);
    }

    public function testFailure2ValidateInputs()
    {
        $expected = false;
        $testInput1 = ['name' => 'MF DOOM', 'artist' => 'Operation: Doomsday', 'tracks' => 19, 'length' => '15:111'];
        $case = validateInputs($testInput1);
        $this->assertEquals($expected, $case);
    }
    
    public function testMalformedValidateInputs()
    {
        $testInput1 = 'string';
        $this->expectException(TypeError::class);
        $case = displayAlbums($testInput1);
    }
}
?>