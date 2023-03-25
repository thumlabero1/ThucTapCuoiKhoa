<?php

namespace App\Helpers;
use Illuminate\Support\Str;
class Helper
{
    
    public static function menu($menus,$parent_id = 0,$char = '',$html='',
)
     {
        
    //     foreach($menus as $key => $menu){
    //         if($menu->parent_id == $parent_id){
    //             $html = $html . '
    //             <td class ="text-white">'. $menu->id .'</td>
    //             <td class ="text-white">' . $char . $menu->name .'</td>
    //             <td class ="text-white">'. $menu->active .'</td>
    //             <td class ="text-white">'. $menu->updated_at .'</td>
    //             <td class ="text-white">&nbsp;</td>
    //             ';
    //             unset($menu[$key]);

    //             $html . self::menu($menu, $menu->id, $char . '--');
    //         }
    //     }

    //     return $html;
      }
}