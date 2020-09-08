<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Canosoft</title>
    <style>
        *{
            margin: 0 auto;
            padding: 0;
        }
        #main-page{
            width: 850px;
            min-height: 320px;
            padding: 10px;
            background: rgba(212, 212, 212,.15);
            /* background: red; */
        }
        #sub-page{
            width: 830px;
            min-height: 300px;
            height: auto;
            background: white;
            /* padding: 10px; */
        }
        header{
            /* background: grey; */
            width: 100%;
            height: 75px;
            text-align: center;
            padding: 10px auto;
        }
        header .title{
            color: rgba(150, 150, 150, 1);
            font-family: 'Courier New', Courier, monospace;
            font-style: oblique;
            font-size: 40px;
        }
        .greeting{
            text-align: center;
            font-size: 40px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .btn{
            background: rgb(143, 82, 199);
            padding: 7px 15px;
            margin: 10px 0;
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 5px;
            font-size: 20px;
        }
        .btn:hover{
            background: blue;
            /* text-transform: lowercase */
        }
        .summary{
            width: 97%;
            background: rgba(212, 212, 212,.15);
            height: 115px;
            /* height: auto; */
            border: 1px solid rgb(241, 212, 212);
        }
        .detail{
            width: 400px;
            float: left;
            /* background: red; */
            /* border-right: 1px solid black; */
            height: 115px;
            clear: both;
        }
        .address{
            width: 399px;
            float: right;
            height: 115px;
            border-left: 1px solid rgb(241, 212, 212);
            /* clear: both; */
            /* background: blue; */
        }
        .detail .summary-detail{
            padding: 10px;
            text-align: left;
        }
        .summary-detail .summary-title{
            text-transform: uppercase;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: 600;
            text-align: left;
        }
        .summary-detail .summary-table{
            /* background: red; */
            width: 380px;
        }

        .summary-table tr{
            height: 18px;
        }
        .summary-table .left-col{
            width: 98px;
            font-weight: bold;
        }
        .summary-table td{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .summary-detail .address-detail{
            word-break: break-all;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .item-detail{
            min-height: 300px;
            height: auto;
            width: 100%;
            margin-bottom: 20px;
            padding: 10px 0;
            /* background: red; */
        }
        .item-detail .item-head{
            width: 780px;
            height: 20px;
            background: rgba(212, 212, 212,.15);
            padding: 10px;
        }
        .item-detail .item-head>div{
            float: left;
        }
        .item{
            width: 620px;
            /* background: green; */
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /* height: 20px; */
        }
        .qty{
            width: 80px;
            /* background: pink; */
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center
            /* height: 20px; */
        }
        .price{
            width: 80px;
            /* background: purple; */
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: right;
        }
        .items{
            width: 780px;
        }
        .product{
            height: 100px;
            border-bottom: 1px solid rgb(233, 221, 221);
            /* background: red; */
        }
        .product .item, .product .qty, .product .price{
            float: left;
        }
        .product .image{
            height: 100px;
            width: 90px;
            float: left;
            /* background: blue; */
        }
        .product .product-name{
            float: right;
            text-align: left;
            width: 510px;
            padding: 20px 10px;
        }
        .p-15{
            padding: 15px 0;
        }
        .ship-detail{
            width: 800px;
            height: 80px;
            /* background: blue; */
            margin-top: 10px;
        }
        .ship-detail table{
            width: 800px;
            height: 80px;
            padding: 10px;
        }
        .ship-detail table .col-left{
            width: 730px;
            text-align: right;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .ship-detail table tr.ship-row{
            height: 21px;
        }
        .ship-detail table .col-right{
            width: 70px;
            text-align: right;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
</head>
<body>
    <div id="main-page">
        <div id="sub-page">
            <header>
                <h2 class="title">Jojayohub</h2>
            </header>
            <div class="greeting">
                <p>
                    Your order is on its way.
                </p>
                <div style="height: 20px;"></div>
                <a href="" class="btn">
                    Track your order
                </a>
            </div>
            <div style="height: 25px;"></div>
            <div class="summary">
                <div class="detail">
                    <div class="summary-detail">
                        <h4 class="summary-title">Summary</h4>
                        <table class="summary-table">
                            <tr>
                                <td class="left-col">Order #:</td>
                                <td>1234</td>
                            </tr>
                            <tr>
                                <td class="left-col">Order Date:</td>
                                <td>2020-09-15</td>
                            </tr>
                            <tr>
                                <td class="left-col">Order Total:</td>
                                <td>$100.50</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="address">
                    <div class="detail">
                        <div class="summary-detail">
                            <h4 class="summary-title">Shipping Address</h4>
                            <p class="address-detail">
                                Canosoft Technology
                                Kathmandu
                                Jamal
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div style="height: 20px;"></div>

            <div class="item-detail">
                <div class="item-head">
                    <div class="item">Item</div>
                    <div class="qty">Qty</div>
                    <div class="price">Price</div>
                </div>

                <div class="items">
                    <div class="product">
                        <div class="item">
                            <div class="image">
                                <img src="{{asset('frontend/images/products/product-1.jpg')}}" alt="" style="height: 100px; width: 80px;">
                            </div>
                            <div class="product-name">Boot</div>
                        </div>
                        <div class="qty p-15">
                            1
                        </div>
                        <div class="price p-15">
                            $10
                        </div>
                    </div>
                    <div class="product">
                        <div class="item">
                            <div class="image">
                                <img src="{{asset('frontend/images/products/product-1.jpg')}}" alt="" style="height: 100px; width: 80px;">
                            </div>
                            <div class="product-name">Boot</div>
                        </div>
                        <div class="qty p-15">
                            1
                        </div>
                        <div class="price p-15">
                            $10
                        </div>
                    </div>
                </div>

                <div class="ship-detail">
                    <table>
                        <tr class="ship-row">
                            <td class="col-left">Subtotal(2 items):</td>
                            <td class="col-right">$10</td>
                        </tr>
                        <tr class="ship-row">
                            <td class="col-left">Tax(13%):</td>
                            <td class="col-right">$10</td>
                        </tr>
                        <tr class="ship-row">
                            <td class="col-left"><b>Order Total</b></td>
                            <td class="col-right">$10</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
