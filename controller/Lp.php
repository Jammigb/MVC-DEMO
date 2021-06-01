<?php

class Lp {
  public function triggrelp() {
    $location = "/var/www/html/demo.minmaxopt.com/test";
    $id = $_GET['q'];
    if(is_numeric($id)) {
      $cmd1 = "/usr/local/bin/shortest_path $location/submitted_problems/problem_$id.txt";
      $cmd2 = "$location/solved_problems/tsp_$id.lp";
      exec($cmd1 . " > $cmd2");
      $cmd3 = "/usr/local/bin/parse_result $location/solved_problems/tsp_$id.lp";
      $cmd4 = "$location/solved_problems/result_$id.txt";
      exec($cmd3 . " > $cmd4");
      include '..view/executionview.php';
    }
  }
}
?>
