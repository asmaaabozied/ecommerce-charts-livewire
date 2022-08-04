<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\order_detail;
use App\Models\Perfume;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function charts()
    {

        // $result = Perfume::where('rate', '>', 0)
        //     ->orderBy('rate', 'DESC')
        //     ->get();
            $result['shipping'] = ['perfume1','perfume2','perfume3'];
            $result['amount'] = [10,2,4];

        return response()->json($result);
    }

    public function chartsorder()
    {

        // $results = order_detail::get();

 $results['shipping'] = ['perfume1','perfume2','perfume3'];
            $results['amount'] = [10,2,4];
        return response()->json($results);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
