<?php 


function random_filename($length, $directory = '', $extension = '')
{
    // default to this files directory if empty...
    $dir = !empty($directory) && is_dir($directory) ? $directory : dirname(__FILE__);

    do {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
    } while (file_exists($dir . '/' . $key . (!empty($extension) ? '.' . $extension : '')));

    return $key . (!empty($extension) ? '.' . $extension : '');
}

/* function getLogo(){
  
            /* echo ("onjour"); 
  $q = "SELECT * FROM identite ";
  $result = mysqli_query($connexion, $q);
  $row = mysqli_fetch_assoc($result);
   
  return $row['logo'] | 'default_logo.png';
  

} */

?>