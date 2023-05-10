<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThongKe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            'title' =>  'Dashboard',
            'thongke' => ThongKe::all(),
            'user' => User::all()
        ]);
    }
    public function thongke()
    {
        if (isset($_POST['time'])) {
            $time = $_POST['time'];
        } else {
            $time = 365;
        }
        // sub days
        $subdays = Carbon::now("Asia/Ho_Chi_Minh")->subdays($time)->toDateString();
        $now = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();
        // data

        $result = ThongKe::whereBetween("ngaydat", ["$subdays", "$now"])->get();

        $chart_data = array();
        if (count($result) > 0) {
            foreach ($result as $key => $value) {
                $chart_data[] = array(
                    "date" => $value['ngaydat'],
                    "order" => $value['donhang'],
                    "sales" => $value['doanhthu'],
                    'quantity' => $value['soluong']
                );
            }
        }
        $data = json_encode($chart_data);
        return $data;
    }
}
