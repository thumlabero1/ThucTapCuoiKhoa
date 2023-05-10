<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartAdminService;
use App\Models\CartDetails;
use App\Models\User;
use App\Models\Carts;
use App\Models\ThongKe;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartAdminService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        return view('admin.cart.list_order', [
            "title" => "Danh sách đơn đặt hàng",
            "orders" => $this->cartService->getOrder()
        ]);
    }
    public function view(Carts $cart)
    {


        $user = User::where('id', $cart->customer_id)->first();

        $orders =  DB::table('cart_details')
            ->join('products', 'cart_details.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.name',
                'products.thumb',
                'cart_details.cart_id',
                'cart_details.qty',
                'cart_details.price'
            )
            ->where(['cart_details.cart_id' => $cart->id])
            ->get();



        return view('admin.cart.list_order_detail', [
            "title" => "Chi tiết đơn đặt hàng: " . $user->name,
            "user" => $user,
            'orders' => $orders,
            "cart" => $cart
        ]);
    }
    // public function destroy(Request $request)
    // {
    //     $result = $this->sliderService->destroy($request);

    //     if ($result) {
    //         return response()->json([
    //             'error' => false,
    //             "message" => "Xóa thành công sản phẩm"
    //         ]);
    //     } else {
    //         return response()->json([
    //             'error' => true,
    //             "message" => "Xóa sản phẩm thất bại"
    //         ]);
    //     }
    // }
    public function confirm($id = '')
    {
        // liet ke don hang
        $customerOrder = CartDetails::where('cart_id', $id)->get();

        // truy van thong ke
        $now = Carbon::now("Asia/Ho_Chi_Minh")->toDateString();

        $samedays = ThongKe::where('ngaydat', "$now")->get();

        // dd($customerOrder);


        $total = 0;
        $thanhtien = 0;
        foreach ($customerOrder as $key => $value) {

            $total += $value['qty'];
            $thanhtien += $value['qty'] * $value['price'];
        }

        if (count($samedays) <= 0) {
            ThongKe::create([
                "ngaydat" => $now,
                "donhang" => 1,
                "doanhthu" => $thanhtien,
                "soluong" => $total,
            ]);
        } else {
            foreach ($samedays as $key => $value) {
                $slb = $value['soluong'] + $total;
                $tongtien = $value['doanhthu'] + $thanhtien;
                $donhang = $value['donhang'] + 1;


                ThongKe::where("ngaydat", "$now")->update([
                    "donhang" => $donhang,
                    "doanhthu" => $tongtien,
                    "soluong" => $slb,
                ]);
            }
        }
        Carts::where('id', $id)->update(['status' => 1]);

        return redirect()->back();
    }
    public function outputpdf(Carts $cart)
    {
        
        $user = User::where('id', $cart->customer_id)->first();
        $orders =  DB::table('cart_details')
            ->join('products', 'cart_details.product_id', '=', 'products.id')
            ->select(
                'products.id',
                'products.name',
                'products.thumb',
                'cart_details.cart_id',
                'cart_details.qty',
                'cart_details.price'
            )
            ->where(['cart_details.cart_id' => $cart->id])
            ->get();


            $data = [
                'title' => 'Thanks for buying clothes',
                'date' => date('m/d/Y'),
                "user" => $user,
                'orders' => $orders,
                "cart" => $cart
            ];
        $pdf = PDF::loadView('admin.cart.PDFCart', $data);

        return $pdf->download('tutsmake.pdf');
    }
}
