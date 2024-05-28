<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function generate_invoice(Request $req)  {
        $date = new DateTime();
        $input = 1;
        $invoice_no = date_format($date,"ymd").sprintf('%04u', $input);
       $products = [] ; 
       foreach ($req->bricks as $key => $brick) {
        $qty = $req->qty[$key];
        $rate = $req->rate[$key];
        $price = $qty * $rate;
        $taxRate = 12;
        $tax = $price * $taxRate / 100;
        $total = $price + $tax;
    
        $product = [
            'brick' => $brick,
            'hsn_code' => '6815',
            'qty' => $qty,
            'rate' => $rate,
            'gst_amt' => $tax,
            'total_amt' => $total,  // Corrected to represent total amount
        ];
        array_push($products , $product);
    }
    
    $data = [
        "invoice_no" => "INV_".$invoice_no , 
        "invoice_date" => $req->invoice_date , 
        "customer" => $req->customer_name , 
        "gst_no" => strtoupper($req->gst_no),
        "phone_no" => $req->phone_no,
        "address" => $req->address ,
        "products" => $products 
    ] ; 
        
        // dd($data); 
        $pdf = Pdf::loadView('invoice',$data);
        return $pdf->download('invoice.pdf');
    }
}
