<?php

require_once (__DIR__ . "/lib/lib_abstract.php");

class shiny {

    public function reset_db(){
        db::sql_query("update table_list set parsed = 0");
        db::sql_query("delete from table_params");
        db::sql_query("delete from brand_model");
    }
    
    public function getList() {
        $list = db::sql_select("select * from table_list where parsed = 0");
        return $list;
    }

    public function parse($string) {
        $result = array();
        
        $pattern = "/[0-9]+\/[0-9]+[a-zA-Z]+[0-9]+/i";
        preg_match($pattern, $string, $matches);
        if ($matches[0]) {
            $m_params = $matches[0];
            $ar_name_params = explode($matches[0], $string);
            

            $brand_model = trim($ar_name_params[0]);
            $s_params = trim($ar_name_params[1]);
            $brand_model = explode(" ", $brand_model);
            if (count($brand_model > 1)) {
                $brand = $brand_model[0];
                $result['brand'] = $brand;
                unset($brand_model[0]);
                $model = implode(" ", $brand_model);
                $result['model'] = $model;
                $pattern2 = "/[а-яА-Я]+[а-яА-Я ()]+/iu";
                preg_match($pattern2, $s_params, $matches2);
                if($matches2[0]){
                    $season = $matches2[0];
                    $s_params = trim(preg_replace($pattern2, "", $s_params));
                    $result['params']['season'] = $season;
                    $pattern3 = "/[\/a-zA-Z]+/i";
                    preg_match("/[a-zA-Z]+/i", $m_params, $matches3);
                    if($matches3[0]){
                        $result['params']['konstr'] = $matches3[0];
                        $m_params = preg_split($pattern3, $m_params);
                        if(count($m_params) == 3){
                            $result['params']['width'] = $m_params[0];
                            $result['params']['height'] = $m_params[1];
                            $result['params']['diametr'] = $m_params[1];
                        }else{
                            return false;
                        }
                        
                        preg_match("/(RunFlat|Run Flat|ROF|ZP|SSR|ZPS|HRS|RFT)/i", $s_params, $matches4);
                        if(count($matches4)){
                            $result['params']['runflat'] = $matches4[0];
                            
                            $s_params = preg_replace("/(RunFlat|Run Flat|ROF|ZP|SSR|ZPS|HRS|RFT)\s/i", "", $s_params);
                        }
                        $s_params = explode(" ", $s_params);
                        preg_match("/^[0-9]+[a-zA-Z]+$/i", $s_params[0], $matches5);
                        if(count($matches5)){
                            //var_dump($matches5);
                            $ind_nagr = intval($matches5[0]);
                            $ind_speed = str_replace($ind_nagr, "", $matches5[0]);
                            $result['params']['ind_nagr'] = $ind_nagr;
                            $result['params']['ind_speed'] = $ind_speed;
                            
                            unset($s_params[0]);
                            
                            $s_params = array_reverse($s_params);
                            
                            if(isset($s_params[0]) && in_array($s_params[0], array("ТТ", "TL", "TL/TT"))){
                                $result['params']['kamer'] = $s_params[0];
                                unset($s_params[0]);
                                
                                $s_params = array_values($s_params);
                                
                                if(count($s_params)){
                                    $result['params']['abbr'] = $s_params[0];
                                }
                            }
                            
                        }else{
                            return false;
                        }
                        
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
        return $result;
    }
    
    public function unparsed($id){
        db::update_record("table_list", array("parsed"=>"-1"), array(), array("id"=>$id));
    }
    
    public function parsed($id){
        db::update_record("table_list", array("parsed"=>"1"), array(), array("id"=>$id));
    }
    
    public function insert_brand_model($brand_model, $list_id){
        db::insert_record("brand_model", array("list_id"=>$list_id, "brand"=>$brand_model["brand"], "model"=>$brand_model["model"]));
        foreach($brand_model["params"] as $code=>$value){
            db::insert_record("table_params", array("list_id"=>$list_id, "code"=>$code, "value"=>$value));
        }
    }

}
