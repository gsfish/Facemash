<?php

$run = new Rank();
$run->select_stu();

class Rank
{
    private static $K = 32;

    function query_score($stu) {
        $conn = new DB();
        $sql = "SELECT * FROM `stu` WHERE `id` = ${stu}";
        $info = $conn->fetch($sql);
        echo 'query_score';
        return $info['score'];
    }

    function update_score($Ra, $stu) {
        $conn = new DB();
        $sql = "UPDATE `stu` SET `score` = $Ra WHERE `id` = ${stu}";
        echo 'update_score';
        $conn->query($sql);
    }

    function expect($Ra, $Rb) {
        $Ea = 1 / (1 + pow(10, ($Rb - $Ra) / 400));
        return $Ea;
    }

    function calc_score($Ra, $Ea, $num) {
        $Ra = $Ra + $this::$K * ($num - $Ea);
        return $Ra;
    }

    function select_stu() {
        require("connect.php");
        $stu1 = @$_POST['stu1'];
        $stu2 = @$_POST['stu2'];
        $victory_id = @$_POST['id'];
        return $this->get_score($stu1, $stu2, $victory_id);
    }

    function get_score($stu1, $stu2, $victory_id){
        $Ra = $this->query_score($stu1);
        $Rb = $this->query_score($stu2);
        if ($Ra & $Rb) {
            $Ea = $this->expect($Ra, $Rb);
            $Eb = $this->expect($Rb, $Ra);
            $Ra = $this->calc_score($Ra,$Ea, $victory_id);
            $Rb = $this->calc_score($Rb, $Eb, 1 - $victory_id);
            $Rab = array($Ra, $Rb);
            $this->update_score($Ra, $stu1);
            $this->update_score($Rb, $stu2);
            return $Rab;
        } else {
            return false;
        }
    }
}

?>