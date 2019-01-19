<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use PDF;


class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products=Product::whereNotNull('out')->get();
        $date=$request->date;
        if(!empty($date)){
            $products=Product::whereDate('created_at',$date)->whereNotNull('out')->get();
            $products->date=$request->date;
        }
        return view('admin.reports.index',compact('products'));
    }

    public function PDFRequest(request $request)
    {
        $reports=Product::whereNotNull('out')->get();
        $date=$request->date;
        if (isset($date)) {
            $reports=Product::whereDate('created_at',$date)->whereNotNull('out')->get();
        }  
        $pdf = PDF::loadView('admin.reports.pdf', compact('reports'));
        return $pdf->download('reports.pdf');
    }
}
