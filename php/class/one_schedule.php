<?php

class one_schedule
{
    private $id;
    private $monday;
    private $tuesday;
    private $wednesday;
    private $thursday;
    private $friday;
    private $saturday;
    private $sunday;
    
    private $mr;
    private $tur;
    private $wr;
    private $thr;
    private $fr;
    private $sar;
    private $sur;
    private $group;
    private $group_name;
    public function one_schedule($id, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday, $mr, $tur, $wr, $thr, $fr, $sar, $sur, $group, $group_name){
        $this->group_name = $group_name;
        $this->group = $group;
        $this->id = $id;
        $this->monday = $monday;
        $this->tuesday = $tuesday;
        $this->wednesday = $wednesday;
        $this->thursday = $thursday;
        $this->friday = $friday;
        $this->saturday = $saturday;
        $this->sunday = $sunday;

        $this->mr = $mr;
        $this->tur = $tur;
        $this->wr = $wr;
        $this->thr = $thr;
        $this->fr = $fr;
        $this->sar = $sar;
        $this->sur = $sur;
    }
    public function get_group_name(){
        return $this->group_name;
    }
    public function get_group(){
        return $this->group;
    }
    public function get_sur(){
        return $this->sur;
    }
    public function get_sar(){
        return $this->sar;
    }
    public function get_fr(){
        return $this->fr;
    }
    public function get_thr(){
        return $this->thr;
    }
    public function get_wr(){
        return $this->wr;
    }
    public function get_tur(){
        return $this->tur;
    }
    public function get_mr(){
        return $this->mr;
    }    


    // getting days below
    public function get_saturday(){
        return $this->saturday;
    }
    public function get_sunday(){
        return $this->sunday;
    }
    public function get_id(){
        return $this->id;
    }
    public function get_monday(){
        return $this->monday;
    }
    public function get_wednesday(){
        return $this->wednesday;
    }
    public function get_tuesday(){
        return $this->tuesday;
    }
    public function get_thursday(){
        return $this->thursday;
    }
    public function get_friday(){
        return $this->friday;
    }
}


?>