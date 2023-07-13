<?php

Class Bsq {
    public $file;

    public function __construct() {
        // echo "construct :\n "; //debug
        global $argv;
        $this->filename = $argv[1];
        // var_dump($argv); //debug
        $this->load_arr_from_file($this->filename);
    }

    public function load_arr_from_file () {
        $file = fopen($this->filename, "r");
        $size = strtok(fgets($file), "\n");
        $this->arr_input = array();
        if($file) {
            for($i = 0; $i < $size; $i++) {
                $line = fgets($file);
                $line = str_split($line);
                $line = str_replace("o", 0, $line);
                $line = str_replace(".", 1, $line);
                array_pop($line);
                array_push($this->arr_input, $line);
            }
        }
        // var_dump($this->arr_input);
        fclose($file);
        $this->max_square();
    }

    public function max_square() {
        $l = count($this->arr_input);
        $L = count($this->arr_input[0]);
        $max = 0;
        $matrix = $this->arr_input;
        for($i = 1; $i < $l; $i++) {
            for($j = 1; $j < $L; $j++) {
                if($this->arr_input[$i-1][$j-1] == 1 && $this->arr_input[$i][$j] == 1) {
                    $matrix[$i][$j] = min($matrix[$i-1][$j], $matrix[$i][$j-1], $matrix[$i-1][$j-1]) + 1;
                    if($matrix[$i][$j] > $max) {
                        $max = $matrix[$i][$j];
                    }
                }
            }
        }
        // var_dump($this->arr_input); //debug
        // var_dump($matrix); //debug
        // echo "\n".$max."X".$max."\n"; //debug
        // $this->print_arr_debug($this->arr_input); //debug
        $this->find_max($matrix, $max);
        // $this->print_arr_debug($matrix); //debug
        $this->print_arr($this->arr_input);
        // $this
    }

    public function print_arr_debug($matrix) {
        $l = count($matrix);
        $L = count($matrix[0]);
        for($i = 0; $i < $l; $i++) {
            echo "colone " . $i . ":"; //debug
            for($j = 0; $j < $L; $j++) {
                echo $matrix[$i][$j]." ";
            }
            echo "\n";
        }
        echo "\n";
    }

    public function find_max($matrix, $max) { // trouve la premiere occurence du max
        $l = count($matrix);
        $L = count($matrix[0]);
        for($i = 0; $i < $l; $i++) {
            for($j = 0; $j < $L; $j++) {
                if($matrix[$i][$j] == $max) {
                    $this->print_max($i, $j, $max, $l, $L, $matrix);
                    return;
                }
            }
        }
    }

    public function print_max($i, $j, $max, $l, $L, $matrix) {
        $max = $max - 1;
        for($m = $i - $max; $m < $i + 1; $m++) {
            for($t = $j - $max; $t < $j + 1; $t++) {
                $this->arr_input[$m][$t] = "x";
            }
        }
        // $this->print_arr_debug($this->arr_input); //debug
    }
    
    public function print_arr($arr) {
        $l = count($arr);
        $L = count($arr[0]);
        for($i = 0; $i < $l; $i++) {
            // echo "colone " . $i . " : "; //debug
            for($j = 0; $j < $L; $j++) {
                if($arr[$i][$j] == 0) {
                    echo "o";
                } elseif ($arr[$i][$j] == 1){
                    echo ".";
                } else {
                    echo "x";
                }
            }
            echo "\n";
        }
    }
}

$yolo = new Bsq();

?>