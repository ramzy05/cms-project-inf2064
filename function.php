<?php 


function random_filename($length, $directory = '', $extension = ''){
   
  $dir = !empty($directory) && is_dir($directory) ? $directory : dirname(__FILE__);

  do{
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

      for($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
      }
    }while (file_exists($dir . '/' . $key . (!empty($extension) ? '.' . $extension : '')));

    return $key . (!empty($extension) ? '.' . $extension : '');
}
