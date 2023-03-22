<?php

namespace App\Helpers;
use Illuminate\Support\Str;
class Helper
{
    
    public static function menu($menus, $parent_id = 0, $char = '' )
    {
        $html='';

        foreach($menus as $key=> $menu){
            if($menu->parent_id == $parent_id){
                $html = $html . '
                <th class ="text-white">'. $menu->id .'</th>
                <th class ="text-white">'.$char . $menu->name .'</th>
                <th class ="text-white">'. $menu->active .'</th>
                <th class ="text-white">'. $menu->update_at .'</th>
                <th class ="text-white">&nbsp;</th>
                ';
                unset($menu[$key]);

                $html . self::menu($menu, $menu->id, $char . '--');
            }
        }

        return $html;
    }
}