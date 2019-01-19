<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Invoice</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>

            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Invoice</h2></center>  
            </div>
            <br>
            <table class="tg" style="width:80%;margin-left:auto;margin-right:auto">
              <tr>
                <th class="tg-3wr7" rowspan=2>No<br></th>
                <th class="tg-3wr7" rowspan=2>Date<br></th>
                <th class="tg-3wr7" rowspan=2>Product Name<br></th>
                <th class="tg-3wr7" rowspan=2>Supplier Name<br></th>
                <th class="tg-3wr7" rowspan=2>Ukuran<br></th>
                <th class="tg-3wr7" colspan=2>Quantity<br></th>
                <th class="tg-3wr7" rowspan=2>Keterangan<br></th>
              </tr>
              <tr>
                <th class="tg-3wr7">Good<br></th>
                <th class="tg-3wr7">Reject<br></th>
              </tr>
              @php($no=1)
              @foreach ($reports as $data)  
              <tr>
                <td class="tg-ti5e" width="4%" style="text-align:center">{{$no++}}</td>
                <td class="tg-rv4w" width="10%">{{$data->created_at }}</td>
                <td class="tg-rv4w" width="15%">{{$data->nameproduct}}</td>
                <td class="tg-ti5e" width="15%">{{$data->namesupplier}}</td>
                <td class="tg-ti5e">{{$data->ukuran}}</td>
                <td class="tg-ti5e">{{$data->quantity-$data->out}}</td>
                <td class="tg-ti5e">{{$data->out}}</td>
                <td class="tg-ti5e">{{$data->keterangan}}</td>
              </tr>
              @endforeach
            </table>
                <div style="position: absolute; bottom: 5px;font-size:12px">
                    PT Super Respati Jakarta <br>
                    Jl. Bandengan Utara Dalam Kampung Batu Kubur Koja No. 16 Kota Jakarta
                </div>
        </body>
    </head>
</html>