<?php

/*
  Equifax Model, containing Equifax specific model methods, if any
  Copyright (c) CarQualifier LLC
 */

class research_model extends CI_Model {

    /**
     * Controller method of the Equifax Model
     *
     * @author CarQualifier LLC
     */
    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
    }
    public function checkzipcode($zipcode){
		$sql = "SELECT `State` FROM `zipcodes` WHERE `zipcodes`.`ZipCode` = ".$zipcode." LIMIT 0,1";
		$query = $this->db->query($sql);
        $row=$query->result();
		if(empty($row)){
			return true;
		}
		return false;
	}
    /**
     * @param $low
     * @param $high
     * function to select the chromecontruct table
     */
    public function checkPayment($low, $high) {
        //$query = $this->db->query("select * from users where first_name='$username' && password='$password'");
        $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where baseMsrp between '$low' and '$high'");
        //return $query->result();

        $ar = array();
        foreach ($query->result() as $row) {

            $ar[] = array(
                'id' => $row->id,
                'photo_url' => $row->stockPhotoUrl,
                'modelYear' => $row->modelYear,
                'consumerFriendlyModelName' => $row->consumerFriendlyModelName,
                'baseMsrp' => $row->baseMsrp,
                'styleId' => $row->styleId
            );
        }
        echo json_encode($ar);
    }

    /**
     * @param $low
     * @param $high
     * function to select the chromecontruct table
     */
    public function checkBox($year, $make, $body) {
        $coupe = array("2-door Compact Passenger Car", "2-door Large Passenger Car", "2-door Mid-Size Passenger Car", "2-door Mini-Compact Passenger Car", "2-door Sub-Compact Passenger Car", "Two-seater Passenger Car");
        $sedan = array("4-door Compact Passenger Car", "4-door Large Passenger Car", "4-door Mid-Size Passenger Car", "4-door Sub-Compact Passenger Car");
        $suv = array("2WD Sport Utility Vehicles", "4WD Sport Utility Vehicles");
        $truck = array("2WD Light Duty Chassis-Cab Trucks", "2WD Small Pickup Trucks", "2WD Standard Pickup Trucks", "4WD Light Duty Chassis Cab Trucks", "4WD Small Pickup Trucks", "4WD Standard Pickup Trucks", "Medium-Duty Trucks");
        $minivan = array("2WD Minivans", "4WD Minivans", "Cargo Vans", "Large Passenger Vans");
        $wagon = array("Mid-Size Wagon", "Small Wagon");
        $sql = "select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct";
        //$wherequery='';
        //$wherequery = "consumerFriendlyStyleName LIKE '%hybrid%'";
        //$wherequery = "consumerFriendlyBodyType = 'Convertible'";

        if ($year == '') {
            $year = 2014;
            $sql .=" where modelYear=" . $year;
        } else {
            $sql .=" where modelYear=" . $year;
        }
        if ($make == '') {
            
        } else {
            $sql .=" AND divisionName='" . $make . "'";
        }


        if (isset($body) && $body != "") {
            $body = explode(",", $body);
            $i = 0;
            $j = 0;

            $sql .=" AND marketClassName IN (";
            $allbodytypes = count($body) - 1;

            for ($i = 0; $i <= $allbodytypes; $i++) {

                switch ($body[$i]) {
                    case 'Coupe':

                        for ($j = 0; $j <= count($coupe) - 1; $j++) {
                            if ($i == $allbodytypes) {
                                if ($j == (count($coupe) - 1)) {
                                    $sql .="'" . $coupe[$j] . "'";
                                } else {
                                    $sql .="'" . $coupe[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $coupe[$j] . "',";
                            }
                        }

                        break;
                    case 'Sedan':

                        for ($j = 0; $j <= count($sedan) - 1; $j++) {
                            if ($i == $allbodytypes) {
                                if ($j == (count($sedan) - 1)) {
                                    $sql .="'" . $sedan[$j] . "'";
                                } else {
                                    $sql .="'" . $sedan[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $sedan[$j] . "',";
                            }
                        }
                        break;
                    case 'Sport Utility Vehicles':

                        for ($j = 0; $j <= count($suv) - 1; $j++) {
                            if ($i == $allbodytypes) {
                                if ($j == (count($suv) - 1)) {
                                    $sql .="'" . $suv[$j] . "'";
                                } else {
                                    $sql .="'" . $suv[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $suv[$j] . "',";
                            }
                        }
                        break;
                    case 'truck':

                        for ($j = 0; $j <= count($truck) - 1; $j++) {
                            if ($i == $allbodytypes) {
                                if ($j == (count($truck) - 1)) {
                                    $sql .="'" . $truck[$j] . "'";
                                } else {
                                    $sql .="'" . $truck[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $truck[$j] . "',";
                            }
                        }
                        break;
                    case 'Mini van':

                        for ($j = 0; $j <= count($minivan) - 1; $j++) {
                            if ($i == $allbodytypes) {
                                if ($j == (count($minivan) - 1)) {
                                    $sql .="'" . $minivan[$j] . "'";
                                } else {
                                    $sql .="'" . $minivan[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $minivan[$j] . "',";
                            }
                        }
                        break;
                    case 'Wagon':

                        for ($j = 0; $j <= count($wagon) - 1; $j++) {


                            if ($i == $allbodytypes) {
                                if ($j == (count($wagon) - 1)) {
                                    $sql .="'" . $wagon[$j] . "'";
                                } else {
                                    $sql .="'" . $wagon[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $wagon[$j] . "',";
                            }
                        }

                        break;
                }
            }
            $sql .=")";
        }

        // AND marketClassName IN ();
        $sql .=" GROUP BY consumerFriendlyModelName";
        //echo $sql;die;

        $query = $this->db->query($sql);


        $ar = array();
        foreach ($query->result() as $row) {
            $vif = $this->fetchvif($row->styleId);
            $ar[] = array(
                'id' => $row->id,
                'photo_url' => $row->stockPhotoUrl,
                'modelYear' => $row->modelYear,
                'consumerFriendlyModelName' => $row->consumerFriendlyModelName,
                'baseMsrp' => $row->baseMsrp,
                'styleId' => $row->styleId,
                'marketClassName' => $row->marketClassName,
                'vif' => $vif
            );
        }
        echo json_encode($ar);
    }

    /**
     * @param $low
     * @param $high
     * function to select the chromecontruct table
     */
    public function year_checkBox($year, $check_val) {
        if ($check_val == "Coupe") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%2dr Car%'");
        } else if ($check_val == "Sedan") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%4dr Car%'");
        } else if ($check_val == "Hybrid") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and  marketClassName like '%$check_val%'");
        } else if ($check_val == "Mini van") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%Mini-van%' or consumerFriendlyBodyType like '%Passenger%' or consumerFriendlyBodyType like '%Cargo%' or consumerFriendlyBodyType like '%Full-size Passenger Van%' or consumerFriendlyBodyType like '% Full-size Cargo Van%' or consumerFriendlyBodyType like '%Station Wagon%'");
        } else if ($check_val == "Sport Utility Vehicles") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%Sport Utility%'");
        } else if ($check_val == "Truck") {
            //$query = $this->db->query("select * from chromeconstruct where modelYear='$year' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%Crew cab pickup%' or consumerFriendlyBodyType like '%Long Bed%' or consumerFriendlyBodyType like '%Short Bed%' or consumerFriendlyBodyType like '%Step Side Bed%' or consumerFriendlyBodyType like '%Extended Cab Pickup%' or consumerFriendlyBodyType like '%Regular Cab Pickup%'");
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%Long Bed%' or consumerFriendlyBodyType like '%Short Bed%' or consumerFriendlyBodyType like '%Step Side Bed%'");
        } else if ($check_val == "Wagon") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and  marketClassName like '%$check_val%'");
        } else if ($check_val == "Convertible") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%Convertible%'");
        } else {
            
        }
        $ar = array();
        foreach ($query->result() as $row) {
            $vif = $this->fetchvif($row->styleId);
            $ar[] = array(
                'id' => $row->id,
                'photo_url' => $row->stockPhotoUrl,
                'modelYear' => $row->modelYear,
                'consumerFriendlyModelName' => $row->consumerFriendlyModelName,
                'baseMsrp' => $row->baseMsrp,
                'styleId' => $row->styleId,
                'marketClassName' => $row->marketClassName,
                'vif' => $vif
            );
        }
        echo json_encode($ar);
    }

    public function year_make_checkBox($year, $make, $check_val) {
        if ($check_val == "Coupe") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and divisionName like '%$make%' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%2dr Car%'");
        } else if ($check_val == "Sedan") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and divisionName like '%$make%' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%4dr Car%'");
        } else if ($check_val == "Hybrid") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and divisionName like '%$make%' and  marketClassName like '%$check_val%'");
        } else if ($check_val == "Mini van") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and divisionName like '%$make%' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%Mini-van%' or consumerFriendlyBodyType like '%Passenger%' or consumerFriendlyBodyType like '%Cargo%' or consumerFriendlyBodyType like '%Full-size Passenger Van%' or consumerFriendlyBodyType like '% Full-size Cargo Van%' or consumerFriendlyBodyType like '%Station Wagon%'");
        } else if ($check_val == "Sport Utility Vehicles") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and divisionName like '%$make%' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%Sport Utility%'");
        } else if ($check_val == "Truck") {
            //$query = $this->db->query("select * from chromeconstruct where modelYear='$year' and divisionName like '%$make%' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%Crew cab pickup%' or consumerFriendlyBodyType like '%Long Bed%' or consumerFriendlyBodyType like '%Short Bed%' or consumerFriendlyBodyType like '%Step Side Bed%' or consumerFriendlyBodyType like '%Extended Cab Pickup%' or consumerFriendlyBodyType like '%Regular Cab Pickup%'");
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and divisionName like '%$make%' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%Long Bed%' or consumerFriendlyBodyType like '%Short Bed%' or consumerFriendlyBodyType like '%Step Side Bed%'");
        } else if ($check_val == "Wagon") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and divisionName like '%$make%' and  marketClassName like '%$check_val%'");
        } else if ($check_val == "Convertible") {
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear='$year' and divisionName like '%$make%' and  marketClassName like '%$check_val%' and consumerFriendlyBodyType like '%Convertible%'");
        } else {
            
        }
        $ar = array();
        foreach ($query->result() as $row) {
            $vif = $this->fetchvif($row->styleId);
            $ar[] = array(
                'id' => $row->id,
                'photo_url' => $row->stockPhotoUrl,
                'modelYear' => $row->modelYear,
                'consumerFriendlyModelName' => $row->consumerFriendlyModelName,
                'baseMsrp' => $row->baseMsrp,
                'styleId' => $row->styleId,
                'marketClassName' => $row->marketClassName,
                'vif' => $vif
            );
        }
        echo json_encode($ar);
    }

    public function year_make_model_checkBox($year, $make, $model, $check_val) {
        /* $coupe =array("2-door Compact Passenger Car","2-door Large Passenger Car","2-door Mid-Size Passenger Car","2-door Mini-Compact Passenger Car","2-door Sub-Compact Passenger Car","Two-seater Passenger Car"); 
          $sedan=array("4-door Compact Passenger Car","4-door Large Passenger Car","4-door Mid-Size Passenger Car","4-door Sub-Compact Passenger Car");
          $suv=array("2WD Sport Utility Vehicles","4WD Sport Utility Vehicles");
          $truck=array("2WD Light Duty Chassis-Cab Trucks","2WD Small Pickup Trucks","2WD Standard Pickup Trucks","4WD Light Duty Chassis Cab Trucks","4WD Small Pickup Trucks","4WD Standard Pickup Trucks","Medium-Duty Trucks");
          $minivan=array("2WD Minivans","4WD Minivans","Cargo Vans","Large Passenger Vans");
          $wagon=array("Mid-Size Wagon","Small Wagon"); */


        $ar = array();
        foreach ($query->result() as $row) {
            $vif = $this->fetchvif($row->styleId);
            $ar[] = array(
                'id' => $row->id,
                'photo_url' => $row->stockPhotoUrl,
                'modelYear' => $row->modelYear,
                'consumerFriendlyModelName' => $row->consumerFriendlyModelName,
                'baseMsrp' => $row->baseMsrp,
                'styleId' => $row->styleId,
                'marketClassName' => $row->marketClassName,
                'vif' => $vif
            );
        }
        echo json_encode($ar);
    }

    public function fetchMake($val) { //echo $val; die;
        //$query = $this->db->query("select * from users where first_name='$username' && password='$password'");
        $query = $this->db->query("SELECT DISTINCT `divisionName`  FROM `chromeconstruct` WHERE `modelYear` = '$val' ");
        $results = $query->result();
        $divisions = array();
        foreach ($results as $result) {
            $divisions[] = $result->divisionName;
        }
        return $divisions; //echo  $query->result();
    }

    /* last update 8 oct 2014 */

    public function fetchModel($make, $year) { //echo $val; die;
        //$query = $this->db->query("SELECT  DISTINCT `modelName`  FROM `chromeconstruct` WHERE `divisionName` = '$make' AND  modelYear = '$year'");
        $query = $this->db->query("SELECT `modelName`,`StyleId` FROM `chromeconstruct` WHERE `divisionName` = '$make' AND `modelYear` = '$year' GROUP BY `modelName`");
        $a = "SELECT `modelName`,`StyleId` FROM `chromeconstruct` WHERE `divisionName` = '$make' AND `modelYear` = '$year' GROUP BY `modelName`";
        //echo $a;die;
        $results = $query->result();
        $model = array();
        foreach ($results as $result) {
            //$model[] = $result->modelName;
            $model[] = array(
                'name' => $result->modelName,
                'styleid' => $result->StyleId
            );
        }
        return $model;
    }

    /**
     * @param $low
     * @param $high
     * function to select the chromecontruct table
     */
    public function divisionData($val, $year, $body) {
        $coupe = array("2-door Compact Passenger Car", "2-door Large Passenger Car", "2-door Mid-Size Passenger Car", "2-door Mini-Compact Passenger Car", "2-door Sub-Compact Passenger Car", "Two-seater Passenger Car");
        $sedan = array("4-door Compact Passenger Car", "4-door Large Passenger Car", "4-door Mid-Size Passenger Car", "4-door Sub-Compact Passenger Car");
        $suv = array("2WD Sport Utility Vehicles", "4WD Sport Utility Vehicles");
        $truck = array("2WD Light Duty Chassis-Cab Trucks", "2WD Small Pickup Trucks", "2WD Standard Pickup Trucks", "4WD Light Duty Chassis Cab Trucks", "4WD Small Pickup Trucks", "4WD Standard Pickup Trucks", "Medium-Duty Trucks");
        $minivan = array("2WD Minivans", "4WD Minivans", "Cargo Vans", "Large Passenger Vans");
        $wagon = array("Mid-Size Wagon", "Small Wagon");
        //$query = $this->db->query("select * from users where first_name='$username' && password='$password'");
        $ar = array();
        $sql = "select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where divisionName like '%$val%' ";

        if ($year == 0) {
            $year = 2014;
            $sql .=" AND modelYear=" . $year;
        } else {

            $sql .=" AND modelYear=$year ";
        }

        if (isset($body) && $body != "") {
            if (strpos($body, 'Hybrid') !== false) {

                $hysql = "select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear= " . $year . " and divisionName ='" . $val . "' AND consumerFriendlyStyleName='%hybrid%' group by modelName";
                $query = $this->db->query($hysql);

                foreach ($query->result() as $row) {
                    $vif = $this->fetchvif($row->styleId);
                    $ar[] = array(
                        'id' => $row->id,
                        'photo_url' => $row->stockPhotoUrl,
                        'modelYear' => $row->modelYear,
                        'consumerFriendlyModelName' => $row->consumerFriendlyModelName,
                        'baseMsrp' => $row->baseMsrp,
                        'styleId' => $row->styleId,
                        'marketClassName' => $row->marketClassName,
                        'vif' => $vif
                    );
                }
            }
            if (strpos($body, 'Convertible') !== false) {

                $hysql = "select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelYear= " . $year . " and divisionName ='" . $val . "' AND consumerFriendlyBodyType='Convertible' group by modelName";
                $query = $this->db->query($hysql);

                foreach ($query->result() as $row) {
                    $vif = $this->fetchvif($row->styleId);
                    $ar[] = array(
                        'id' => $row->id,
                        'photo_url' => $row->stockPhotoUrl,
                        'modelYear' => $row->modelYear,
                        'consumerFriendlyModelName' => $row->consumerFriendlyModelName,
                        'baseMsrp' => $row->baseMsrp,
                        'styleId' => $row->styleId,
                        'marketClassName' => $row->marketClassName,
                        'vif' => $vif
                    );
                }
            }

            $body = explode(",", $body);
            $i = 0;
            $j = 0;

            $sql .=" AND marketClassName IN (";
            $allbodytypes = count($body) - 1;

            for ($i = 0; $i <= $allbodytypes; $i++) {

                switch ($body[$i]) {
                    case 'Coupe':

                        for ($j = 0; $j <= count($coupe) - 1; $j++) {
                            if ($i == $allbodytypes) {
                                if ($j == (count($coupe) - 1)) {
                                    $sql .="'" . $coupe[$j] . "'";
                                } else {
                                    $sql .="'" . $coupe[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $coupe[$j] . "',";
                            }
                        }

                        break;
                    case 'Sedan':

                        for ($j = 0; $j <= count($sedan) - 1; $j++) {
                            if ($i == $allbodytypes) {
                                if ($j == (count($sedan) - 1)) {
                                    $sql .="'" . $sedan[$j] . "'";
                                } else {
                                    $sql .="'" . $sedan[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $sedan[$j] . "',";
                            }
                        }
                        break;
                    case 'Sport Utility Vehicles':

                        for ($j = 0; $j <= count($suv) - 1; $j++) {
                            if ($i == $allbodytypes) {
                                if ($j == (count($suv) - 1)) {
                                    $sql .="'" . $suv[$j] . "'";
                                } else {
                                    $sql .="'" . $suv[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $suv[$j] . "',";
                            }
                        }
                        break;
                    case 'truck':

                        for ($j = 0; $j <= count($truck) - 1; $j++) {
                            if ($i == $allbodytypes) {
                                if ($j == (count($truck) - 1)) {
                                    $sql .="'" . $truck[$j] . "'";
                                } else {
                                    $sql .="'" . $truck[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $truck[$j] . "',";
                            }
                        }
                        break;
                    case 'Mini van':

                        for ($j = 0; $j <= count($minivan) - 1; $j++) {
                            if ($i == $allbodytypes) {
                                if ($j == (count($minivan) - 1)) {
                                    $sql .="'" . $minivan[$j] . "'";
                                } else {
                                    $sql .="'" . $minivan[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $minivan[$j] . "',";
                            }
                        }
                        break;
                    case 'Wagon':

                        for ($j = 0; $j <= count($wagon) - 1; $j++) {


                            if ($i == $allbodytypes) {
                                if ($j == (count($wagon) - 1)) {
                                    $sql .="'" . $wagon[$j] . "'";
                                } else {
                                    $sql .="'" . $wagon[$j] . "',";
                                }
                            } else {
                                $sql .="'" . $wagon[$j] . "',";
                            }
                        }

                        break;
                }
            }
            $sql .=")";
        } else {
            $sql .="group by modelName";
        }


        $query = $this->db->query($sql);


        //$ar = array();
        foreach ($query->result() as $row) {

            $vif = $this->fetchvif($row->styleId);

            $ar[] = array(
                'id' => $row->id,
                'photo_url' => $row->stockPhotoUrl,
                'modelYear' => $row->modelYear,
                'consumerFriendlyModelName' => $row->consumerFriendlyModelName,
                'baseMsrp' => $row->baseMsrp,
                'styleId' => $row->styleId,
                'marketClassName' => $row->marketClassName,
                'vif' => $vif
            );
        }

        echo json_encode($ar);
    }

    public function fetchvif($styleid) {
        $sql = "SELECT `vif_id` FROM `evox_images` WHERE `chrome_style_id` = " . $styleid;
        $query = $this->db->query($sql);
        $row = $query->result();
        //print_r($row);
        $vif120still = "http://162.218.139.42/dev/assets/evox/stills_0640_png/" . $row[0]->vif_id . "/" . $row[0]->vif_id . "_st0640_120.png";
        //$altjpgstill = "http://162.218.139.42/dev/assets/evox/stills_0640/" . $row[0]->vif_id . "/" . $row[0]->vif_id . "_st0640_120.jpg";
        $nostill = '';

        $file = $vif120still;
        $file_headers = @get_headers($file);
        if ($file_headers[0] == 'HTTP/1.1 404 Not Found') {
            $exists = false;
            return $nostill;
        } else {
            $exists = true;
            return $vif120still;
        }
    }

    /**
     * @param $low
     * @param $high
     * function to select the chromecontruct table
     */
    public function checkModel($val, $year) { //echo $year;
        //$query = $this->db->query("select * from users where first_name='$username' && password='$password'");
        if ($val != "All") { //echo "not";
            $query = $this->db->query("select id,stockPhotoUrl,modelYear,consumerFriendlyModelName,baseMsrp,styleId,marketClassName from chromeconstruct where modelName like '$val' && modelYear='$year' GROUP BY `consumerFriendlyModelName`");
        }


        $ar = array();
        ;
        foreach ($query->result() as $row) {
            $vif = $this->fetchvif($row->styleId);
            $ar[] = array(
                'id' => $row->id,
                'photo_url' => $row->stockPhotoUrl,
                'modelYear' => $row->modelYear,
                'consumerFriendlyModelName' => $row->consumerFriendlyModelName,
                'baseMsrp' => $row->baseMsrp,
                'styleId' => $row->styleId,
                'marketClassName' => $row->marketClassName,
                'vif' => $vif
            );
        }
        echo json_encode($ar);
    }

  public function searchFilter($requestSearch, $id, $act) {


        $bodyType = array("bt_coupe" => array("2-door Compact Passenger Car", "2-door Large Passenger Car", "2-door Mid-Size Passenger Car", "2-door Mini-Compact Passenger Car", "2-door Sub-Compact Passenger Car", "Two-seater Passenger Car"),
            "bt_sedan" => array("4-door Compact Passenger Car", "4-door Large Passenger Car", "4-door Mid-Size Passenger Car", "4-door Sub-Compact Passenger Car"),
            "bt_suv" => array("2WD Sport Utility Vehicles", "4WD Sport Utility Vehicles"),
            "bt_truck" => array("2WD Light Duty Chassis-Cab Trucks", "2WD Small Pickup Trucks", "2WD Standard Pickup Trucks", "4WD Light Duty Chassis Cab Trucks", "4WD Small Pickup Trucks", "4WD Standard Pickup Trucks", "Medium-Duty Trucks"),
            "bt_minivan" => array("2WD Minivans", "4WD Minivans", "Cargo Vans", "Large Passenger Vans"),
            "bt_wagon" => array("Mid-Size Wagon", "Small Wagon")
        );

        $query = "select CONCAT(`modelYear`,' ',`divisionName`,' ',`modelName`) fullname,divisionName,stockPhotoUrl,modelYear,consumerFriendlyModelName,modelName,baseMsrp,styleId,marketClassName,destination from chromeconstruct where 1=1 ";
        $countquery = "select count(*) as total from chromeconstruct where 1=1 ";
        $modelquery = "SELECT `modelName`,`StyleId` FROM `chromeconstruct` where 1=1 ";
        $currentcount = "select count(*) from chromeconstruct where 1=1 ";
        if (!empty($requestSearch["year_filter"])) {
            $query .=' and modelYear=' . $requestSearch["year_filter"];
            $currentcount.=' and modelYear=' . $requestSearch["year_filter"];
            $countquery .=' and modelYear=' . $requestSearch["year_filter"];
            $modelquery .= ' and modelYear=' . $requestSearch["year_filter"];
        }
        if (!empty($requestSearch["division_filter"])) {
            $query .=" and divisionName='" . $requestSearch["division_filter"] . "'";
            $currentcount .=" and divisionName='" . $requestSearch["division_filter"] . "'";
            $countquery .=" and divisionName='" . $requestSearch["division_filter"] . "'";
            $modelquery .= " and divisionName='" . $requestSearch["division_filter"] . "'";
        }
        if (empty($requestSearch['bt_coupe']) && empty($requestSearch['bt_sedan']) && empty($requestSearch['bt_suv']) && empty($requestSearch['bt_truck']) && empty($requestSearch['bt_minivan']) && empty($requestSearch['bt_wagon'])) {
            
        } else {
            $query .=' and (';
            $currentcount .=' and (';
            $countquery .=' and (';
            $modelquery .= ' and (';
        }

        $str = '';
        foreach ($bodyType as $k => $val) {
            if (!empty($requestSearch[$k])) {
                $filter = $val;
                $serchIn = implode("','", $filter);
                $str .="'" . $serchIn . "'";
            }
        }
        if (strlen($str) > 0) {
            $query .=" marketClassName in (" . $str . ")";
            $currentcount .=" marketClassName in (" . $str . ")";
            $countquery .=" marketClassName in (" . $str . ")";
            $modelquery .= " marketClassName in (" . $str . ")";
        }
        if (!empty($requestSearch["bt_hybrid"])) {
            if (strlen($str) > 0 || !empty($requestSearch["bt_convertible"])) {
                $query .="  or ";
                $currentcount .="  or ";
                $countquery .="  or ";
                $modelquery .="  or ";
            } else {
                $query .="  and ";
                $currentcount .="  and ";
                $countquery .="  and ";
                $modelquery .="  and ";
            }

            $query .=" consumerFriendlyStyleName like '%hybrid%'";
            $currentcount .=" consumerFriendlyStyleName like '%hybrid%'";
            $countquery .=" consumerFriendlyStyleName like '%hybrid%'";
            $modelquery .=" consumerFriendlyStyleName like '%hybrid%'";
        }
        if (!empty($requestSearch["bt_convertible"])) {
            if (strlen($str) > 0 || !empty($requestSearch["bt_hybrid"])) {
                $query .="  or ";
                $currentcount .="  or ";
                $countquery .="  or ";
                $modelquery .="  or ";
            } else {
                $query .="  and ";
                $currentcount .="  and ";
                $countquery .="  and ";
                $modelquery .="  and ";
            }

            $query .=" consumerFriendlyBodyType='Convertible'";
            $currentcount .=" consumerFriendlyBodyType='Convertible'";
            $countquery .=" consumerFriendlyBodyType='Convertible'";
            $modelquery .=" consumerFriendlyBodyType='Convertible'";
        }



        if (empty($requestSearch['bt_coupe']) && empty($requestSearch['bt_sedan']) && empty($requestSearch['bt_suv']) && empty($requestSearch['bt_truck']) && empty($requestSearch['bt_minivan']) && empty($requestSearch['bt_wagon'])) {
            
        } else {
            $query .=' ) ';
            $currentcount .=' ) ';
            $countquery .=' ) ';
            $modelquery .=' ) ';
        }




        $query .=" group by modelName ";
        $currentcount .=" group by modelName ";
        $modelquery .=" GROUP BY `modelName`";
        /* order by */
        if ($requestSearch["filter_pay"] == 'htl') {
            $query .=" ORDER BY `baseMsrp` DESC";
            $currentcount .=" ORDER BY `baseMsrp` DESC";
        }
        if ($requestSearch["filter_pay"] == 'lth') {
            $query .=" ORDER BY `baseMsrp` ASC";
            $currentcount .=" ORDER BY `baseMsrp` ASC";
        }
        if ($requestSearch["filter_pay"] == 'a-z') {
            $query .=" ORDER BY fullname ASC";
            $currentcount .=" ORDER BY modelName ASC";
        }
        if ($requestSearch["filter_pay"] == 'z-a') {
            $query .=" ORDER BY fullname DESC";
            $currentcount .=" ORDER BY modelName DESC";
        }
        $countquery .=' group by modelName ';
        $countresult = $this->db->query($countquery);
        $countresult = $countresult->result();
        $countresult = count($countresult);


        /* limit pagination */
        if ($id == null || $id == 0) {
            $st = 0;
            $rowStart = $countresult < 10 ? $countresult : 10;
        } else {
            $st = $id;
            if ($act == 'pre') {
                if ($id >= 10) {
                    $rowStart = $id;
                } else {
                    $rowStart = 10;
                }
            } else {
                $rowStart1 = 9 + $id;
                if ($rowStart1 > $countresult) {
                    $rowStart = $countresult;
                } else {
                    $rowStart = 10 + $id;
                }
            }
        }

        $query .=" limit $st,10";
        $currentcount.=" limit $st,10";

        $currentcount = $this->db->query($currentcount);
        $currentcount = $currentcount->result();
        $currentcount = count($currentcount);
        //echo $query;die;
        $result = $this->db->query($query);
        $ar = array();

        foreach ($result->result() as $row) {
			$leaseamt=$this->leasecalculation($row->styleId,$row->destination,$row->baseMsrp);
			$loanamt=$this->loancalculation($row->styleId,$row->destination,$row->baseMsrp);
			
            $vif = $this->fetchvif($row->styleId);
            $var = $this->calculation($row->styleId, $requestSearch['total_cash'], $requestSearch['term_lease'], $requestSearch['miles_per_year'], $requestSearch['down_payment'], $requestSearch['term_down_payment'], $requestSearch['txtlease']);
            //$cal = $var['amount'];
            //$varCal = $var['showArr']; //check amit ref by amit;
            //$arrstr = $split[1];
			$cal = $var;
            if ($requestSearch['minmaxgo'] == 1) {
                $newcal = str_replace(',', '', $cal);
                $newcal = (int) $newcal;
                if ($newcal >= $requestSearch['lprice'] && $newcal <= $requestSearch['hprice']) {

                    $ar[] = array(
                        'make' => $row->divisionName,
                        'photo_url' => $row->stockPhotoUrl,
                        'modelYear' => $row->modelYear,
                        'consumerFriendlyModelName' => $row->fullname,
                        'baseMsrp' => $cal,
                        'styleId' => $row->styleId . '/' . (!empty($requestSearch["year_filter"]) ? $requestSearch["year_filter"] : 0 ) . '/' .$row->divisionName. '/' . $row->modelName,
                        'marketClassName' => $row->marketClassName,
                        'vif' => $vif,
                        'minmaxstatus' => 1,
						'leaseamount'=>$leaseamt,
						'loanamount'=>$loanamt
                    );
                } else {
                    $ar[] = array(
                        'make' => $row->divisionName,
                        'photo_url' => $row->stockPhotoUrl,
                        'modelYear' => $row->modelYear,
                        'consumerFriendlyModelName' => $row->fullname,
                        'baseMsrp' => $cal,
                        'styleId' => $row->styleId . '/' . (!empty($requestSearch["year_filter"]) ? $requestSearch["year_filter"] : 0 ) . '/' . $row->divisionName . '/' . $row->modelName,
                        'marketClassName' => $row->marketClassName,
                        'vif' => $vif,
                        'minmaxstatus' => 0,
						'leaseamount'=>$leaseamt,
						'loanamount'=>$loanamt
                    );
                }
            } else {
                $ar[] = array(
                    'make' => $row->divisionName,
                    'photo_url' => $row->stockPhotoUrl,
                    'modelYear' => $row->modelYear,
                    'consumerFriendlyModelName' => $row->fullname,
                    'baseMsrp' => $cal,
                    'styleId' => $row->styleId . '/' . (!empty($requestSearch["year_filter"]) ? $requestSearch["year_filter"] : 0 ) . '/' .$row->divisionName. '/' . $row->modelName,
                    'marketClassName' => $row->marketClassName,
                    'vif' => $vif,
					'leaseamount'=>$leaseamt,
					'loanamount'=>$loanamt
                );
            }
        }


        $data = array();

        if (!empty($requestSearch["division_filter"]) && !empty($requestSearch["year_filter"])) {
            $modelresult = $this->db->query($modelquery);
            $modeloption = '<option value="">All</option>';
            foreach ($modelresult->result() as $row) {
				
                $modeloption.='<option value="' . $row->StyleId . '/' . $requestSearch["year_filter"] . '/' . $requestSearch["division_filter"] . '/' . $row->modelName . '">' . $row->modelName . '</option>';
            }
            $data = array(
                'array' => $ar,
                'datacount' => $countresult,
                'rowStart' => $rowStart,
                'model' => $modeloption,
                'currentcount' => $currentcount,
                'calvar' => $varCal,
                'query' => $query,
                    //'modelquery'=>$modelquery
            );
        } else {
            $data = array(
                'array' => $ar,
                'datacount' => $countresult,
                'rowStart' => $rowStart,
                'currentcount' => $currentcount,
                'calvar' => $varCal,
                 'query' => $query
                    //'modelquery'=>$modelquery
            );
        }




        //pr($data,1);
        //$countresult[0]->total;
        echo json_encode($data);
    }
	public function leasecalculation($styleid,$destination,$baseMsrp){
		
		$debug=0;
		if($debug){
		$leaseAmount = '';
		echo "Dealer Fee:"; echo $Dealer_Fee = $this->config->item('Fees');//default dealer fees
		echo "<br>";
		echo "Total Cash Defaut:"; echo $Total_cash = $this->config->item('Total_cash');// default total cash
		echo "<br>";
		echo "Lease_Cach_Rebats:"; echo $Lease_Cach_Rebats = $this->config->item('Lease_Cach_Rebats');// default Lease cash reabat
		echo "<br>";
		echo "Mileper_year Defaut:"; echo $Mileper_year = $this->config->item('Mileper_year');// default mileper year 
		echo "Mileper_year_static:"; echo $Mileper_year_static = $this->config->item('Mileper_year_static');// default mileper year static
		echo "<br>";							
		echo "Residual_Percentage_Month:"; echo $Residual_Percentage_Month = $this->config->item('Residual_Percentage_Month');// default mileper year 36
		echo "<br>";
		echo "Mileage_Adjustment_Factor:"; echo $Mileage_Adjustment_Factor = $this->config->item('Mileage_Adjustment_Factor');// default mileage adjustment factor 12 as per 36 month
		echo "<br>";
		echo "Credit_Score:"; echo $Credit_Score = $this->config->item('Credit_Score');//default credit score 680
		echo "<br>";
		echo "Lease_Term Defaut:"; echo $Lease_Term = $this->config->item('Lease_Term');//default lease term 360
		echo "<br>";
		echo "Total_casht:"; echo $Total_cash = !empty($_POST["total_cash"]) ? $_POST["total_cash"] : $Total_cash;
		echo "<br>";
		$Total_cash = str_replace('$', ' ', $Total_cash);
		echo "Lease_Term:"; echo $Lease_Term = !empty($_POST["term_lease"]) ? $_POST["term_lease"] : $Lease_Term;
		echo "<br>";
		echo "Mileper_year:"; echo $Mileper_year = !empty($_POST["miles_per_year"]) ? $_POST["miles_per_year"] : $Mileper_year;
		echo "<br>";
		$zipcode = $this->session->userdata('zipcode');
		echo "zipcode:"; echo $zipcode = !empty($zipcode) ? $zipcode : '99501';
		echo "<br>";
		echo "Destination_Charge:"; echo $Destination_Charge=$destination;
		echo "<br>";
		echo "baseMsrp:"; echo $baseMsrp = $baseMsrp;
		echo "<br>";
		echo "ConfiguredMSRP:"; echo $ConfiguredMSRP=$baseMsrp+$Destination_Charge;
		echo "<br>";
		echo "Cap_Cost:"; echo $Cap_Cost=$ConfiguredMSRP+$Dealer_Fee;
		echo "<br>";
		echo "CapCostReduction:"; echo $CapCostReduction=$Total_cash+$Lease_Cach_Rebats;
		echo "<br>";
	    $this->load->model('Chromeapi_model');
        $rp_mf=$this->getvalue($styleid,$Lease_Term,$zipcode,$Credit_Score);
		echo "Residual_percentage:"; echo $Residual_percentage=$rp_mf['Residual_Percentage'];
		echo "<br>";
		echo "Mileage_Adjustment:"; echo $Mileage_Adjustment=(($Mileper_year_static-$Mileper_year)*$Mileage_Adjustment_Factor[$Lease_Term]);
		echo "<br>";
		echo "Residual:"; echo $Residual=(($ConfiguredMSRP*$Residual_percentage)+$Mileage_Adjustment);
		echo "<br>";
		echo "Money_Factor:"; echo $Money_Factor=$rp_mf['Money_Factor'];
		echo "<br>";
		echo "leaseAmount:"; echo $leaseAmount=(($Cap_Cost-$CapCostReduction+$Residual)*$Money_Factor)+(($Cap_Cost-$CapCostReduction-$Residual)/$Lease_Term);
		echo "<br>";
		
		}else{
		$leaseAmount = '';
		$Dealer_Fee = $this->config->item('Fees');//default dealer fees
		$Total_cash = $this->config->item('Total_cash');// default total cash
		$Lease_Cach_Rebats = $this->config->item('Lease_Cach_Rebats');// default Lease cash reabat
		$Mileper_year = $this->config->item('Mileper_year');// default mileper year 
		$Mileper_year_static = $this->config->item('Mileper_year_static');// default mileper year static
		$Residual_Percentage_Month = $this->config->item('Residual_Percentage_Month');// default mileper year 36
		$Mileage_Adjustment_Factor = $this->config->item('Mileage_Adjustment_Factor');// default mileage adjustment factor 12 as per 36 month
		$Credit_Score = $this->config->item('Credit_Score');//default credit score 680
		$Lease_Term = $this->config->item('Lease_Term');//default lease term 360
		$Total_cash = !empty($_POST["total_cash"]) ? $_POST["total_cash"] : $Total_cash;
		$Total_cash = str_replace('$', ' ', $Total_cash);
		$Lease_Term = !empty($_POST["term_lease"]) ? $_POST["term_lease"] : $Lease_Term;
		$Mileper_year = !empty($_POST["miles_per_year"]) ? $_POST["miles_per_year"] : $Mileper_year;
		$zipcode = $this->session->userdata('zipcode');
		$zipcode = !empty($zipcode) ? $zipcode : '99501';
		$Destination_Charge=$destination;
		$baseMsrp = $baseMsrp;
		$ConfiguredMSRP=$baseMsrp+$Destination_Charge;
		$Cap_Cost=$ConfiguredMSRP+$Dealer_Fee;
		$CapCostReduction=$Total_cash+$Lease_Cach_Rebats;
		$this->load->model('Chromeapi_model');
        $rp_mf=$this->getvalue($styleid,$Lease_Term,$zipcode,$Credit_Score);
		$Residual_percentage=$rp_mf['Residual_Percentage'];
		$Mileage_Adjustment=(($Mileper_year_static-$Mileper_year)*$Mileage_Adjustment_Factor[$Lease_Term]);
		$Residual=(($ConfiguredMSRP*$Residual_percentage)+$Mileage_Adjustment);
		$Money_Factor=$rp_mf['Money_Factor'];
		$leaseAmount=(($Cap_Cost-$CapCostReduction+$Residual)*$Money_Factor)+(($Cap_Cost-$CapCostReduction-$Residual)/$Lease_Term);
		}
		return $leaseAmount;
	}
function getvalue($styleid,$month,$zipcode,$Credit_Score)
	 {
		// get value for residual percentage
		$mocolum=$month."mo";
		$sql = "SELECT `msrp`,`$mocolum` FROM `alg_model_no_table`,`alg_chromemap` WHERE `alg_chromemap`.`styleid` = ".$styleid." AND `alg_model_no_table`.`algid`=`alg_chromemap`.`algcode`";
		$query = $this->db->query($sql);
        $residual_percent=$query->result();
	/*	echo "Residual month value:".$residual_percent[0]->$mocolum;
		echo "<br>";
		echo "Residual MSRP:".$residual_percent[0]->msrp;
		echo "<br>";*/
		$residual_percent_value=($residual_percent[0]->$mocolum/$residual_percent[0]->msrp);
		if(!is_numeric($residual_percent_value)){
			$residual_percent_value=0;
		}
		// end
		
		$sql = "SELECT `State` FROM `zipcodes` WHERE `zipcodes`.`ZipCode` = ".$zipcode." LIMIT 0,1";
		$query = $this->db->query($sql);
        $row=$query->result();
		$state=$row[0]->State;
		/*echo "State:".$state;
		echo "<br>";*/
		
		//SELECT  * FROM  `informa` WHERE  `informa`.`state` =  'AK' AND  `informa`.`ficomin` <=680 AND  `informa`.`ficomax` >=680 and `product_name`='36MNAuto' and `type`='AutoLease' LIMIT 0 , 30
		
		$productname=$month."MNAuto";
		$sql = "SELECT `avg` FROM `informa` WHERE `informa`.`state`='".$state."' and `informa`.`ficomin`<=".$Credit_Score." and `informa`.`ficomax`>=".$Credit_Score." and `product_name`='".$productname."' and `type`='AutoLease'";
		$query = $this->db->query($sql);
        $row=$query->result();
		$moneyfactor=$row[0]->avg;
		
		return array('Residual_Percentage'=>$residual_percent_value,'Money_Factor'=>$moneyfactor);
		
	 }
function loancalculation($styleid,$baseMSRP,$destination){
	$debug=0;
	$Down_Payment = $this->config->item('down_payment');
	$Loan_Term = $this->config->item('Term_down_payment');
	$Down_Payment = !empty($_POST["down_payment"]) ? $_POST["down_payment"] : $Down_Payment;
	$Down_Payment = str_replace('$', ' ', $Down_Payment);
	$Loan_Term = !empty($_POST["term_down_payment"]) ? $_POST["term_down_payment"] : $Loan_Term;
	$zipcode = $this->session->userdata('zipcode');
	if($debug){
		echo "zipcode:";echo $zipcode = !empty($zipcode) ? $zipcode : '99501';
		echo "<br>";
		echo "Dealer fee:";echo $Loan_Dealer_Fee = config_item('Loan_Dealer_Fee');
		echo "<br>";
		echo "Base Price:";echo $baseMSRP;
		echo "<br>";
		echo "destination:";echo $destination;
		echo "<br>";
		echo "Loan_Dealer_Fee:";echo $Loan_Dealer_Fee;
		echo "<br>";
		echo "Down_Payment:";echo $Down_Payment;
		echo "<br>";
		echo "Financing Cash:";echo $Financing_Cash = config_item('Financing_Cash');
		echo "<br>";
		echo "Total amount finace:";echo $TotalAmountFinance=(($baseMSRP+$destination+$Loan_Dealer_Fee)-$Down_Payment-$Financing_Cash);
		echo "<br>";
		echo "Credit_Score:"; echo $Credit_Score = config_item('Credit_Score');//default credit score 680
		echo "<br>";
		echo "AVG:";echo $avg=$this->getavgvalue($zipcode,$Loan_Term,$Credit_Score);
		echo "<br>";
		echo "Loan Term:";echo $Loan_Term;
		echo "<br>";
		echo "Up part:";echo $up=($TotalAmountFinance*($avg/1200));
		echo "<br>";
		echo "Down part:";echo $down=1-(pow(1+($avg/1200),(-$Loan_Term)));
		echo "<br>:";
		echo "Loan amount";echo $loanamount=number_format($up/$down,2);
		echo "<br>:";
	}else{
	
	$zipcode = !empty($zipcode) ? $zipcode : '99501';
	$Loan_Dealer_Fee = config_item('Loan_Dealer_Fee');
	$Financing_Cash = config_item('Financing_Cash');
	$TotalAmountFinance=(($baseMSRP+$destination+$Loan_Dealer_Fee)-$Down_Payment-$Financing_Cash);
	$Credit_Score = config_item('Credit_Score');//default credit score 680
	$avg=$this->getavgvalue($zipcode,$Loan_Term,$Credit_Score);
	$up=($TotalAmountFinance*($avg/1200));
	$down=1-(pow(1+($avg/1200),(-$Loan_Term)));
	$loanamount=($up/$down);
		
	}
	return $loanamount;
	}
	function getavgvalue($zipcode,$month,$Credit_Score){
		$sql = "SELECT `State` FROM `zipcodes` WHERE `zipcodes`.`ZipCode` = ".$zipcode." LIMIT 0,1";
		$query = $this->db->query($sql);
        $row=$query->result();
		$state=$row[0]->State;
		
		$productname=$month."MNAuto";
		$sql = "SELECT `avg` FROM `informa` WHERE `informa`.`state`='".$state."' and `informa`.`ficomin`<=".$Credit_Score." and `informa`.`ficomax`>=".$Credit_Score." and `product_name`='".$productname."' and `type`='AutoLoan'";
		$query = $this->db->query($sql);
        $row=$query->result();
		return $row[0]->avg;
	}
	 
public function calculation($style_id, $Total_cash1, $Term_lease1, $Miles_per_year1, $Down_payment1, $Term_down_payment1,$condtion) {


		$leaseAmount = '';
		$loanAmount = '';

		/*
		 * Fetch chrome construct
		 */


		$this->db->select('styleId,baseMsrp,destination');
		$this->db->from('chromeconstruct');
		$this->db->where('chromeconstruct.styleId', $style_id);
		$query1 = $this->db->get();
		$row1 = $query1->result();
		$baseMRP = $row1[0]->baseMsrp;
		$destination = $row1[0]->destination;

		//die('testing');
		/*
		 * Fetch algmap
		 */
		$this->db->select('algcode');
		$this->db->from('alg_chromemap');
		$this->db->where('alg_chromemap.styleid', $style_id);
		$query2 = $this->db->get();
		$row2 = $query2->result();
		$algcode = $row2[0]->algcode;



		/*
		 * Fetch alg_model_no_table
		 */
		$this->db->select('msrp,groupnum');
		$this->db->from('alg_model_no_table');
		$this->db->where('alg_model_no_table.algid', $algcode);
		$query3 = $this->db->get();
		$row3 = $query3->result();
		$groupnum = $row3[0]->groupnum;
		$algBaseMRP = $row3[0]->msrp;




		$this->db->select('12mo,24mo,36mo,48mo,60mo');
		$this->db->from('alg_model_no_table');
		$this->db->where('alg_model_no_table.algid', $algcode);
		$query4 = $this->db->get();
		$mo = $query4->result();


		//echo  $this->db->last_query();
		$this->load->model('research_model');
		$session = $this->session->all_userdata();
		if (!empty($session['Credit_Score'])) {
			$Creditscore = $session['Credit_Score'];
		} else {
			$Creditscore = $this->config->item('Credit_Score');
		}

		$MFactor = $this->config->item('Money_Factor');
		$MoneyFactor = $this->research_model->getScoreavg($Creditscore);


		$Money_Factor = !empty($MoneyFactor[0]->avg) ? $MoneyFactor[0]->avg : $MFactor;
		$Money_Factor = $Money_Factor / 100;
		/**
		 * Require varialbe for lease calculation
		 */
		if ($condtion == '2') {

			$fees = $this->config->item('Fees');
			$Residual = $this->config->item('Residual');
			$Total_cash = $this->config->item('Total_cash');
			$Lease_Term = $this->config->item('Lease_Term');
			$Mileper_year = $this->config->item('Mileper_year');
			$Destination_Charge = $this->config->item('Destination_Charge');

			$Total_cash = !empty($Total_cash1) ? $Total_cash1 : $Total_cash;
			$Total_cash = (int) $Total_cash;
			$Lease_Term = !empty($Term_lease1) ? $Term_lease1 : $Lease_Term;

			if (!empty($mo)) {
				$mo = $this->check_keys_exists($Lease_Term . "mo", $mo);
			}

			$mo = (int) $mo;
			$algBaseMRP = (int) $algBaseMRP;
			$Residual_percentage = $mo/$algBaseMRP;
					
			$zp =$this->session->all_userdata();
			$zpp=$zp['zipcode'];
			
			
			$userzip = $this->session->all_userdata('UserSelectData');
			$zipcode = $userzip['UserSelectData']['zipcode'];
			
			if(!empty($zipcode)){
				$zipcode = $zipcode;
			}else if(!empty ($zpp)) {
				$zipcode = $zpp;
			}else{
				$zipcode = $this->config->item('Zip_Code');
			}
			
			$insentive = $this->all_incentiveData($style_id, $zipcode);
			
			$Residual_percentage = $mo / $algBaseMRP;
			
			$Lease_miles = !empty($Miles_per_year1) ? $Miles_per_year1 : $Mileper_year;
			$MRP = !empty($baseMRP) ? $baseMRP : $MSRP;
			$destination = !empty($destination) ? $destination : $Destination_Charge;
			$Destination_Charge = $destination;
			$CapCost = $MRP + $fees + $Destination_Charge;
			@$Lease_Per_Year = @$Lease_Term / 12;
			@$Centspermile = '';

			if ($groupnum == $Lease_Per_Year) {
				$Centspermile = '18';
			} else if ($groupnum == $Lease_Per_Year) {
				$Centspermile = '14';
			} else if ($groupnum == $Lease_Per_Year) {
				$Centspermile = '12';
			} else if ($groupnum == $Lease_Per_Year) {
				$Centspermile = '12';
			} else {
				$Centspermile = '10';
			}

			@$Mileadjustment = $Lease_miles - 12000;
			@$Mileadjustcost = @$Mileadjustment * $Centspermile;
			@$Mileadjustcost = @$Mileadjustcost / 100;
			@$Residual = ($MRP * $Residual_percentage) + @$Mileadjustcost;

			$arr = array();
			$arr = array("Dealar_Fee" => $fees,
				"Residual_value" => $Residual,
				"Money_factor" => $Money_Factor,
				"Money_factor" => $Money_Factor,
				"Lease_miles" => $Lease_miles,
				"BaseMRP" => $MRP,
				"CapCost" => $CapCost,
				"Destination_Charge" => $Destination_Charge,
				"Residual_percentage" => $Residual_percentage,
				"Lease_Per_Year" => $Lease_Per_Year,
				"Centspermile" => $Centspermile,
				"Mileadjustment" => $Mileadjustment,
				"Mileadjustcost" => $Mileadjustcost,
				"Residual" => $Residual,
				"Credit_Score" => $Creditscore
			);
			//pr($arr);
			$Total_cash = $Total_cash+1500;
			@$leaseAmount = lease_payment($CapCost, $Total_cash, $Residual, $Money_Factor, $Lease_Term);
			return $leaseAmount;
			//return array(""=>$insentive,"amount" => $leaseAmount);
			//return array(""=>$insentive,"amount" => $leaseAmount . ",=cc" . $CapCost . ",=tc" . $Total_cash . ",=rv" . $Residual . "=,mf" . $Money_Factor . ",=lt" . $Lease_Term . "rp=" . $Residual_percentage, "showArr" => $arr);
		}
		if ($condtion == '3') {
			$Down_payment = $this->config->item('down_payment');
			$Term_down_payment = $this->config->item('Term_down_payment');
			$MSRP = $this->config->item('MSRP');
			$fees1 = $this->config->item('fdf');
			$rate = $this->config->item('Rate');
			$MRP = !empty($baseMRP) ? $baseMRP : $MSRP;

			$CapCost1 = $MRP + $fees1;

			@$down_payment = !empty($Down_payment1) ? $Down_payment1 : $Down_payment;


			@$term_down_payment = !empty($Term_down_payment1) ? $Term_down_payment1 : $Term_down_payment;

			$Rate = !empty($Money_Factor) ? $Money_Factor : $rate;

			$arr = array();
			$arr = array("Dealar_Fee" => $fees1,
				"Down_payment" => $down_payment,
				"Term_down_payment" => $term_down_payment,
				"Cabcost" => $CapCost1,
				"Rate_Or_MoneyFactor" => $Rate
			);
			//pr($arr,1);
			@$loanAmount = loan_payment($CapCost1, $fees1, $down_payment, $Rate, $term_down_payment);
			//return array("amount" => $loanAmount . ",cc=" . $CapCost1 . ",df=" . $fees1 . ",dp=" . $down_payment . ",Rate=" . $Rate . ",term=" . $term_down_payment, "showArr" => $arr);
			return $loanAmount ;
		}
	}

	function check_keys_exists($keys_str, $arr) {
		$_arr = (Array) $arr[0];
		$val = '';
		if (array_key_exists($keys_str, $_arr)) {
			$val = $_arr[$keys_str];
		} else {
			$val = '14075';
		}
		return $val;
	}

	public function getScoreavg($cScore) {

		$query = $this->db->query('select avg,excess_mile_charge from informa where "' . $cScore . '" between ficomin and ficomax limit 0,1');
		$row = $query->result();
		return $row;
	}

	function all_incentiveData($style_ids, $zip) {
		
	
	
		$retArr = array();
		$this->db->select("style_id,incentive_id,PD_Incentive_ID");
		$this->db->from("incentive_style_ids");
		if (!empty($style_ids) && $zip != '') {
			$this->db->where_in('style_id', $style_ids);
			$this->db->where('PD_Incentive_ID', $zip);
		}
		$query = $this->db->get();

		///echo $this->db->last_query();
		//pr($query->result());
		//die();
		if ($query->num_rows > 0) {
			$incentive_key = array();
			foreach ($query->result() as $val) {
				$incentive_key[$val->incentive_id] = $val->incentive_id;
			}
		} else {
			$this->db->select("style_id,incentive_id,PD_Incentive_ID");
			$this->db->from("incentive_style_ids");
			$this->db->where_in('style_id', $style_ids);
			$query = $this->db->get();
			$incentive_key = array();
			foreach ($query->result() as $val) {
				$incentive_key[$val->incentive_id] = $val->incentive_id;
			}
		}

		if (!empty($incentive_key)) {
			$find_in = array_keys($incentive_key);
			$this->db->select("*");
			$this->db->from("chromeincentive");
			$this->db->where_in('Incentive_ID', $find_in);
			$query_ins = $this->db->get();
			//echo $this->db->last_query();
			$query_ins->result();

			if ($query_ins->num_rows > 0) {
				$filter_ckh = array();
				foreach ($query->result() as $val) {

					foreach ($query_ins->result() as $incval) {
						if (($val->incentive_id == $incval->Incentive_ID) && ($val->PD_Incentive_ID == $incval->PD_Incentive_ID)) {
							//pr($incval);
							//if(!in_array($val->style_id,$filter_ckh )){
							$retArr[$val->style_id] = $incval;
							//$filter_ckh[]=$val->style_id;
							//}
						}
					}
				}
			}
		}
		
		//pr($retArr,1);
		return($retArr);
	}
}

?>