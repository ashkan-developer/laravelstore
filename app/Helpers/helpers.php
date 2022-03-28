<?php 

use Morilog\Jalali\Jalalian;

function jalaliDate($data,$format = '%A , %d %B %Y')
{
    return Jalalian::forge($data)->format($format);
}


?>