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
                array_push($this->map, []);
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
        // var_dump($this->map); //comms
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
        $squareSize = 1;
        $limiteX = $this->proportion-$x;
        $limiteY = $this->proportion-$y;
        // echo "\nsquareSize: " . $squareSize . "\n"; //comms
        // echo "cord: " . $y . " " . $x . "\n"; //comms
        if($limiteX > 1 || $limiteY > 1) {
            $limiteX--;
            $limiteY--;
            echo "\nxlimite: " .$limiteX . "\nylimite: " . $limiteY . "\n"; //comms
            for($colone = 0; $colone < $limiteX; $colone++) {
                echo "colone: " .$colone."\n";
            }
            for($row = 0; $row < $limiteY; $row++) {
                echo "row: ".$row."\n";
            }
            exit;
        }
    }

}

$yolo = new bsq();

?>
