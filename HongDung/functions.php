<?php

function stripUnicode($str) {
  if(!$str) return false;
  $unicode = array(
    'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
    'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
    'd' => 'đ',
    'D' => 'Đ',
    'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
    'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
    'i' => 'í|ì|ỉ|ĩ|ị',
    'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
    'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
    'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
    'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
    'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
    'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
    'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
  );

  foreach($unicode as $en => $vi){
    $arr = explode('|', $vi);
    $str = str_replace($arr, $en, $str);
  }
  return $str;
}

function convertToEn($str){
  $str = trim($str);
  if($str == '') return '';
  $str = str_replace('"', '', $str);
  $str = str_replace("'", '', $str);
  $str = stripUnicode($str);
  $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
  $str = str_replace(' ','-', $str);
  return $str;
}

function cate_parent($data, $parent_id = 0, $str = '--', $select = 6) {
  foreach ($data as $value) {
    $id = $value['id'];
    $name = $value['name'];

    if($value['parent_id'] == $parent_id){
      if($select != 0 && $select == $id){
        echo "<option value='$id' selected>$str $name</option>";
      }else{
        echo "<option value='$id'>$str $name</option>";
      }
     
      cate_parent($data, $id, $str.'--');
    }
   
  }
}
