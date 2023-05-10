<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{

    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <tr>
                        <td>' . htmlspecialchars($menu->id)  . '</td>
                        <td>' . " " . $char . htmlspecialchars($menu->name) . '</td>
                        <td>' . self::isActive($menu->active) . '</td>
                        <td>' . htmlspecialchars($menu->updated_at) . '</td>
                        <td>
                            <a class="btn btn-primary" href="/admin/menus/edit/' . $menu->id . '"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="#" onclick="removeRow(' . $menu->id . ',\'/admin/menus/destroy\')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                ';
                unset($menus[$key]);
                $html .= self::menu($menus, $menu->id, $char . '--');
            }
        }
        return $html;
    }

    public static function categoryblog($menus)
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            $html .= '
                    <tr>
                        <td>' . htmlspecialchars($menu->id)  . '</td>
                        <td>' . htmlspecialchars($menu->name) . '</td>
                        <td>' . self::isActive($menu->active) . '</td>
                        <td>' . htmlspecialchars($menu->updated_at) . '</td>
                        <td>
                            <a class="btn btn-primary" href="/admin/category-blog/edit/' . $menu->id . '"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="#" onclick="removeRow(' . $menu->id . ',\'/admin/category-blog/destroy\')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                ';
        }
        return $html;
    }
    public static function isActive($active = 0): string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-sm">No<span>'
            : '<span class="btn btn-success btn-sm">Yes<span>';
    }
    public static function menus($menus, $parent_id = 0)
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li>
                        <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . htmlspecialchars($menu->name) . '
                        </a>';
                unset($menus[$key]);
                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="sub-menu"> ';
                    $html .= self::menus($menus, $menu->id);
                    $html .= "</ul>";
                }
                $html .= '</li>
                ';
            }
        }
        return $html;
    }
    public static function menusmobile($menus, $parent_id = 0)
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                    <li>
                        <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . htmlspecialchars($menu->name) . '
                        </a>';
                unset($menus[$key]);
                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="sub-menu-m"> ';
                    $html .= self::menus($menus, $menu->id);
                    $html .= "</ul>";
                }
                // $html .= ' <span class="arrow-main-menu-m">
                //                 <i class="fa fa-angle-right" aria-hidden="true"></i>
                //             </span>';
                $html .= '</li>
                ';
            }
        }
        return $html;
    }
    public static function isChild($menus, $id)
    {
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }
        return false;
    }
    public static function price($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return $priceSale;
        if ($price != 0) return $price;
        return '<a href="/lien-he">Liên hệ</a>';
    }
}
