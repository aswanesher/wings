<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;

class TransactionReport extends Controller
{
    public function report()
    {
        $data = TransactionHeader::with('detail','users')->paginate(1);
        //dd($data);
        return view('report.index', compact('data'));
    }
}
