<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        table{
            background: #f5f5f5;
            border-collapse: separate;
            box-shadow: inset 0 1px 0 #fff;
            font-size: 12px;
            line-height: 24px;
            margin: 30px auto;
            text-align: left;
            width: 700px;
        }
        table img{
            height: 70px;
            width: 70px;
        }
        th{
            background-color: gray;
            border-left: 1px solid #555;
            border-right: 1px solid #777;
            border-top: 1px solid #555;
            border-bottom: 1px solid #333;
            box-shadow: inset 0 1px 0 #999;
            color: #fff;
            font-weight: bold;
            padding: 10px 15px;
            position: relative;
            text-shadow: 0 1px 0 #000;
        }
        td {
            border-right: 1px solid #fff;
            border-left: 1px solid #e8e8e8;
            border-top: 1px solid #fff;
            border-bottom: 1px solid #e8e8e8;
            padding: 10px 15px;
            position: relative;
            transition: all 300ms;
        }
        tr {
            background: url(https://jackrugile.com/images/misc/noise-diagonal.png);
        }
    </style>

</head>
<body>
<table class="table table-bordered">
    <thead>
    <tr>
        <th><b>Id de la commande</b></th>
        <th><b>Couleur</b></th>
        <th><b>Taille</b></th>
        <th><b>Sexe</b></th>
        <th><b>Rendu</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($allOrder as $order)
        <tr>
            <td>
                {{ $order->id }}
            </td>
            <td>
                {{ $order->color }}
            </td>
            <td>
                {{ $order->size }}
            </td>
            <td>
                {{ $order->sexe }}
            </td>
            <td>
               <img class="w-10 h-10" src="{{ $order->mergeImageUrl }}"/>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>



