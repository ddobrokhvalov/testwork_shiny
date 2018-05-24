<?php
require_once (__DIR__."/application/shiny.class.php");

$shiny = new shiny();
$list = $shiny->getList();
foreach ($list as $item){
  $parsed_item = $shiny->parse($item['name']);
  if($parsed_item){
      $shiny->insert_brand_model($parsed_item, $item["id"]);
      $shiny->parsed($item["id"]);
  }else{
      $shiny->unparsed($item["id"]);
  }
}
//var_dump($list);