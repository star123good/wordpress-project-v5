<?php
    // search function
    function search($arrayJson, $input_text, $input_domestic, $input_international){
        global $pattern_keys, $domestic_file;
        $res = array();

        if(!empty($arrayJson) && $input_text != "" && ($input_domestic || $input_international)){
            // read domestic.txt file
            $domestics = file($domestic_file);
            if(empty($domestics)) return $res;
            $domestics = array_map(function($d){ return trim($d); }, $domestics);

            // find rows
            foreach($arrayJson as $row){
                // match
                if(isset($row['fromCode']) && ($row['fromCode'] == $input_text || (isset($row['fromName']) && $row['fromName'] == $input_text))){
                    $is_match = false;
                    // domestic or international
                    if($input_domestic && $input_international) $is_match = true;
                    $is_domestic = false;
                    foreach($domestics as $d){
                        if($d == $row['fromCode']){
                            $is_domestic = true;
                            break;
                        }
                    }
                    if(($input_domestic && $is_domestic) || ($input_international && !$is_domestic)) $is_match = true;

                    // get price
                    if($is_match){
                        $val_lowest = 1e30;
                        foreach($row as $r){
                            $val = (float)$r;
                            if($val > 0 && $val < $val_lowest) $val_lowest = $val;
                        }
                        if($val_lowest < 1e30){
                            // get distination
                            $dist = "";
                            if(isset($row['toName']) && $row['toName'] != ""){
                                $dist = $row['toName'];
                            }
                            else if(isset($row['toCode']) && $row['toCode'] != ""){
                                $dist = $row['toCode'];
                            }

                            // success matching
                            if($dist != ""){
                                $res[] = array(
                                    "dist" => $dist,
                                    "price" => $val_lowest
                                );
                            }
                        }
                    }
                }
            }
        }

        return $res;
    }

    // json files
    $json_files = array(
        "FlyingBlue.json",
        "united.json"
    );

    // domestic file
    $domestic_file = "domestic.txt";

    // pattern keys
    $pattern_keys = array(
        "toCode",
        "toName",
        "fromCode",
        "fromName",
        "lowestPriceInFebruary",
        "lowestPriceInSeptember",
        "lowestPrice",
        "economy",
        "business",
        "premiumEconomy",
        "first"
    );

    $result = array(
        "status" => "fail",
        "data" => array()
    );

    // input get params
    $input_text = isset($_GET['text'])?$_GET['text']:"";
    $input_domestic = isset($_GET['domestic'])?($_GET['domestic']=="true"):false;
    $input_international = isset($_GET['international'])?($_GET['international']=="true"):false;

    // selected json file
    $json_selected_file = $json_files[0];

    // read json file
    try{
        $strJsonFileContents = file_get_contents($json_selected_file);
        $arrayJson = json_decode($strJsonFileContents, true);
        $result['data'] = search($arrayJson, $input_text, $input_domestic, $input_international);
        if(!empty($result['data'])) $result['status'] = "success";
    }
    catch(Exception $e){
        $result['data'] = $e;
    }

    echo json_encode($result);
    die();
?>