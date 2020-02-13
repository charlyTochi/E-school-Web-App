<?php

namespace App\Traits;

trait Utilities {

    public function userRole($cat_name) {
      $code = null;
            switch ($cat_name) {
                case 'SUPERADMIN':
                    $code = "77889";
                    break;
                case 'ADMIN':
                    $code = "44556";
                    break;
<<<<<<< HEAD
=======
                case 'SCHOOL':
                    $code = "33445";
                    break;
>>>>>>> c660153717f21a5ac5cfbd62004d2388f2c32cd3
                case 'PARENT':
                    $code = "22334";
                    break;
                case 'TEACHER':
                    $code = "11223";
                    break;
                case 'STUDENT':
                    $code = "00112";
                    break;
                default:
                    $code = null;
                    break;
            }
            return $code;
    }

}
