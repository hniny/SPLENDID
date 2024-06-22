<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Place Order</title>
    <style>
       
    </style>
</head>
<body>
    <div style="display: flex;flex-wrap: wrap;">
        <div style="flex: 50%">
            <img src="http://splendid.hostmyanmar.tech/images/splendid.png" alt="" srcset="" style="padding-left: 15rem;width: 7em;"><br>
           <table style="padding-left: 2rem;line-height: 1.2;">
               <tr>
                   <td style="width:22%;font-weight:bold;">Splendid 1 :</td>
                   <td>No.148, Ground Floor, Anawyahtar Road,(Corner of 35 street),<br> Kyauktada Township,Yangon.</td>
               </tr>
               <tr>
                <td style="width:22%;font-weight:bold;">Splendid 2 :</td>
                <td>No,91, U Chit Maung Road, Bahan Township, Yangon.</td>
               </tr>
               <tr>
                <td style="width:22%;font-weight:bold;">Phone :</td>
                <td>09-952204996, 09-952204996</td>
               </tr>
               <tr>
                <td style="width:22%;font-weight:bold;">Email :</td>
                <td>splendidexperience@gmail.com</td>
               </tr>
           </table>
        </div>
        <div style="flex: 50%;">
            <h2>Payment Voucher</h2>
            <table style="width: 70%;line-height: 1.5;">
                <tr>
                    <td style="border-top:2px dotted black;border-right:2px dotted black;
                    width: 20%;">Date:</td>
                    <td style="border-top:2px dotted black;">{{date('Y-m-d')}}</td>
                </tr>
                <tr>
                    <td style="border-top:2px dotted black;border-right:2px dotted black;
                    width:20%;">Name:</td>
                    <td style="border-top:2px dotted black;">{{$data['customer']->name}}</td>
                </tr>
                <tr>
                    <td style="border-top:2px dotted black;border-right:2px dotted black;
                    width:20%;">Email:</td>
                    <td style="border-top:2px dotted black;">{{$data['customer']->email}}</td>
                </tr>
                <tr>
                    <td style="border-top:2px dotted black;border-right:2px dotted black;
                    width:20%;">City:</td>
                    <td style="border-top:2px dotted black;word-break: break-all;">{{$data['customer']->pcity->name}}</td>
                </tr>
                <tr>
                    <td style="border-top:2px dotted black;border-right:2px dotted black;
                    width:20%;">Township:</td>
                    <td style="border-top:2px dotted black;word-break: break-all;">{{$data['customer']->township}}</td>
                </tr>
                <tr>
                    <td style="border-top:2px dotted black;border-right:2px dotted black;
                    width:20%;">Address:</td>
                    <td style="border-top:2px dotted black;word-break: break-all;">{{$data['customer']->address}}</td>
                </tr>
                <tr>
                    <td style="border-top:2px dotted black;border-right:2px dotted black;
                    width:20%;">Phone:</td>
                    <td style="border-top:2px dotted black;word-break: break-all;">{{$data['customer']->phone}}</td>
                </tr>
            </table>
        </div>
    </div><br><br>
    <table style="width: 100%;padding-right:1.5em;padding-left: 1.5em;margin-right: auto;margin-left: auto;line-height: 1.5;">
        <tr style="background-color: black;color: white;">
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Amount</th>
        </tr>
        @foreach ($data['sale'] as $item)
        <tr>
            <td style="padding-left: 20px;border-left: 1px solid;border-bottom: 1px solid black;">{{$item->product->product_name}}</td>
            <td style="text-align: center;border-left: 1px solid;border-bottom: 1px solid black;">{{$item->quantity}}</td>
            <td style="text-align: center;border-left: 1px solid;border-right: 1px  solid;border-bottom: 1px solid black;">$ {{$item->total_amount}}</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td style="text-align: end;">Total Cost: </td>
            <td style="text-align: center;border-left: 1px solid;border-right: 1px  solid;border-bottom: 1px solid black;">$ {{$data['payment']->total}}</td>
        </tr>
    </table>
</body>
</html>