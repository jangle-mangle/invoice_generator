<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            width: 100%;
        }

        .wrapper {
            width: 100%;
            border: 1px solid #000;
            margin: 10px 0;
        }


        .wrapper .no-border {
            border-bottom: 0;
        }

        .margin-0 {
            margin: 0;
        }

        .padding-0 {
            padding: 0;
        }

        img {
            height: 30px;
        }

        .table {
            width: 100%;
            margin: 0;
        }

        .table>tbody>tr>td {
            border: 1px solid #000;
            padding: 5px 0 5px 10px;
            /* width: 50%; */
        }



        .table>tbody>tr .last {
            border-bottom: 0;
        }

        .table>tbody>tr b {
            display: block;
        }

        .table>tbody>tr span {
            font-size: 12px;
        }

        .invoice-bill {
            width: 100%;
        }

        .invoice-bill td {
            border: 1px solid #000;
            padding: 5px;
        }

        .invoice-bill .serial-no {
            width: 70px;
        }

        .invoice-bill .particulars {
            width: 500px;
        }

        .invoice-bill .amount {
            width: 150px;
        }

        .invoice-bill .particular-items {
            padding: 5px 10px;
        }

        .invoice-bill .amount-items {
            padding: 5px 0;
        }

        .entry-id {
            margin: 35px 0;
        }

        .bank-details {
            margin-top: 30px;
        }

        .authorised-sign-wrapper {
            width: 300px;
            border: 1px solid #000;
            padding: 5px 20px;
        }
    </style>
</head>

<body>
    <h2 class="text-center text-uppercase">Invoice</h2>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row margin-0">
                <div class="col-sm-12 padding-0">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="width: 50%;" rowspan="3">
                                    <br>
                                    SHRI SAINATH ENTERPRISES FLYASH
                                    BRICKS MANUFACTURERS & BUILDING
                                    MATERIALS SUPPLYER
                                    <br> <br>
                                    GSTIN/UIN: <strong>22DYRPS1913Q1ZP</strong> <br> <br>
                                    State Name : Chhattisgarh, Code , 22
                                    <br> <br>
                                </td>

                                <td class="">
                                    Invoice No

                                </td>
                                <td class="">
                                    {{$invoice_no}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Invoice Date

                                </td>
                                <td>
                                    {{$invoice_date}}


                                </td>
                            </tr>
                            <tr>
                                <td class="">
                                    Payment Mode

                                </td>
                                <td class="">
                                    Cash/Online

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row margin-0">
                <div class="col-sm-12 padding-0">
                    <table class="table">
                        <tr>
                            <td style="width: 50%;" rowspan="2">
                                <h5 class="text-uppercase  d-block">buyer </h5>
                               {{$customer}}
                                <br> <br>
                                GSTIN/UIN:  {{$gst_no}}
                                <br>
                            </td>
                            <td class="">
                                Dispatch Address
                            </td>
                            <td class="">
                                Neurdih, Chhattisgarh
                                493111

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Delivery Address

                            </td>
                            <td>
                                {{$address}}

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row margin-0">
                <div class="col-sm-12 padding-0">
                    <table class="invoice-bill">
                        <tr>
                            <td class="">
                                Items
                            </td>
                            <td class="">
                                HCN
                                Code
                            </td>
                            <td class="">
                                Qty
                            </td>
                            <td class="">
                                Rate
                            </td>
                            <td class="">
                                Gst Amount (12%)
                            </td>
                            <td class="">
                                Amt
                            </td>
                        </tr> 
                        @php
                            $grand_total_qty = 0  ; 
                            $grande_total_amt = 0  ; 
                        @endphp
                        @foreach ($products as $product)   
                        <tr>
                            <td>
                               {{$product['brick']}}
                            </td>
                            <td>
                                {{$product['hsn_code']}}

                            </td>
                            <td>
                                {{$product['qty']}}
                            </td>
                            <td>
                                {{$product['rate']}}
                            </td>
                            <td>
                                {{$product['gst_amt']}}
                            </td>
                            <td>
                                {{$product['total_amt']}}
                            </td>
                        </tr>
                        @php
                            $grand_total_qty += $product['qty']  ; 
                            $grande_total_amt += $product['total_amt'] ; 
                        @endphp
                        
                        @endforeach
                        <tr>
                            <td></td>
                            <td>
                                <strong> Total Qty</strong>
                            </td>
                            <td> <strong>{{$grand_total_qty}}</strong></td>
                            <td></td>
                            <td>
                                <strong>Total
                                    Amount</strong>
                            </td>
                            <td>
                                <strong>{{$grande_total_amt}}</strong>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>
            <div class="row margin-0">
                <div class="col-sm-12 padding-0">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    COMPAGNY NAME : <br>
                                    <strong>
                                        SHRI SAINATH ENTERPRISES FLYASH
                                        BRICKS MANUFACTURERS & BUILDING
                                        MATERIALS SUPPLYER
                                    </strong>
                                    <br>
                                    <br> 
                                    Owner :  <strong>BRAJESH KUMAR SAWARKAR  </strong> 
                                    <br> 
                                    <br>
                                    Contact No : <strong>+91 88896 44448 </strong>
                                    <br> 
                                    <br>
                                    Email : <strong> Shrisainath.flyashbricks@gmail.com </strong>
                                    <br> 
                                    <br>
                                    <strong> Bank Details :   </strong>
                                    <br> 
                                    SHRI SAINATH ENTERPRISES 
                                    <br> 
                                    PUNJAB NAITONAL BANK 
                                    <br> 
                                    AC.NO.7253002100000923
                                    <br> 
                                    IFSC - PUNB0725300 
                                    <br> 
                                </td>
                                <td>
                                    
                                  <p class="my-5  py-5 text-center ">
                                    for SHRI SAINATH ENTERPRISES FLYASH
                                    BRICKS MANUFACTURERS & BUILDING
                                    MATERIALS SUPPLYER,
                                    <br><br><br>
                                    Authorised Signature
                                  </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>