<?php

class bsq {

    public $file;

    public function __construct() { // take input
        global $argv;
        $this->file = $argv[1];
        // var_dump($argv); //comms 
        $this->read($this->file);
    }

    public function read() {
        $handle = fopen($this->file, "r");
        $this->proportion = strtok(fgets($handle), "\n");
        // echo $this->proportion; //comms
        $this->map = [];
        $x = 0;
        $y = 0;
        if($handle) {
            for($r = 0; $r < $this->proportion; $r++) { // parcourt ligne par ligne le fichier
                $line = fgets($handle);
                // echo $line; //comms
                $split_line = str_split($line); // split each character
                array_pop($split_line); // get rid of return to line
                // var_dump($split_line); //comms
                array_push($this->map, [$split_line]);
                for($i = 0; $i < $this->proportion; $i++) {
                    $this->map[$r];
                    array_push($this->map[$r], $split_line[$i]);
                    // echo $x; //comms
                    $x++;
                }
                $x = 0;
                // echo $y . "\n"; //comms
                $y++;
            }
            fclose($handle);
        } else {
            echo "error"; //comms
        }
        $this->analyse();
        echo "var_dump map\n";
        var_dump($this->map); //comms
    }

    public function analyse() {
        // var_dump($this->map); //comms
        for($i = 0; $i < $this->proportion; $i++) {
            for($x = 0; $x < $this->proportion; $x++) {
                // echo $this->map[$i][$x]; //comms
                if($this->map[$i][$x] == ".") {
                    $this->square($i, $x);
                }
            }
            echo "\n";
        }
    }

    public function square($y, $x) {
        $squareSize = 2;
        $border = $this->proportion-1;
        $sizeX = $this->proportion-$x;
        $sizeY = $this->proportion-$y;
        echo $this->proportion. "\n"; //comms
        // echo "\nsquareSize: " . $squareSize . "\n"; //comms
        // echo "cord: " . $y . " " . $x . "\n"; //comms
        if($x == $border || $y == $border) {
            echo "\njeff\n";
            exit; //test
            return;
        }
        if($sizeX > 1 || $sizeY > 1) {
            $sizeX = $sizeX-1;
            $sizeY = $sizeY-1;
            // $limitx = 
            echo "\nxsize: " .$sizeX . "\nysize: " . $sizeY . "\n"; //comms
            for($colone = 0; $colone < $sizeX; $colone++) {
                echo "x: " .$colone+($x+1)."\n";
                $checkx = $colone+($x+1);
                for($cx = $y; $cx < $sizeX; $cx++) {
                    if($this->map[$cx][$checkx] == ".") {
                        // echo $this->map[$cx][$checkx] . "\n";
                        echo $checkx."\n";
                        for($iteX = 0; $iteX < $sizeX; $iteX++) {
                            echo $iteX."\n";
                        }
                    }
                }
            }
            $rowSize = $squareSize-1;
            for($row = 0; $row < $sizeY; $row++) {
                echo "y: " . $row+($y+1)."\n";
                $checky = $row+($y+1);
                for($cy = $x; $cy < $sizeY; $cy++) {
                    if($this->map[$checky][$cy] == ".") {
                        // echo $this->map[$checky][$cy] . "\n";
                        echo $row."\n";
                    }
                }
            }
            exit;
        }
    }

}

$yolo = new bsq();

?>
