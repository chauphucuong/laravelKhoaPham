<div class="container">
    <div class="headerdetails">
        <div class="pull-left">
            <ul class="nav language pull-left">
                <li class="dropdown hover"> <a href="#" class="dropdown-toggle" data-toggle="">US Doller <b class="caret"></b></a>
                    <ul class="dropdown-menu currency">
                        <li><a href="#">US Doller</a> </li>
                        <li><a href="#">Euro </a> </li>
                        <li><a href="#">British Pound</a> </li>
                    </ul>
                </li>
                <li class="dropdown hover"> <a href="#" class="dropdown-toggle" data-toggle="">English <b class="caret"></b></a>
                    <ul class="dropdown-menu language">
                        <li><a href="#">English</a> </li>
                        <li><a href="#">Spanish</a> </li>
                        <li><a href="#">German</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="pull-right">
            <ul class="nav topcart pull-left">
                <li class="dropdown hover carticon "> <a href="#" class="dropdown-toggle" > Shopping Cart <span class="label label-orange font14">1 item(s)</span> - $589.50 <b class="caret"></b></a>
                    <ul class="dropdown-menu topcartopen ">
                        <li>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="image"><a href="product.html"><img width="50" height="50" src="frontend/img/prodcut-40x40.jpg" alt="product" title="product"></a></td>
                                        <td class="name"><a href="product.html">MacBook</a></td>
                                        <td class="quantity">x&nbsp;1</td>
                                        <td class="total">$589.50</td>
                                        <td class="remove"><i class="icon-remove"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="image"><a href="product.html"><img width="50" height="50" src="frontend/img/prodcut-40x40.jpg" alt="product" title="product"></a></td>
                                        <td class="name"><a href="product.html">MacBook</a></td>
                                        <td class="quantity">x&nbsp;1</td>
                                        <td class="total">$589.50</td>
                                        <td class="remove"><i class="icon-remove "></i></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="textright"><b>Sub-Total:</b></td>
                                        <td class="textright">$500.00</td>
                                    </tr>
                                    <tr>
                                        <td class="textright"><b>Eco Tax (-2.00):</b></td>
                                        <td class="textright">$2.00</td>
                                    </tr>
                                    <tr>
                                        <td class="textright"><b>VAT (17.5%):</b></td>
                                        <td class="textright">$87.50</td>
                                    </tr>
                                    <tr>
                                        <td class="textright"><b>Total:</b></td>
                                        <td class="textright">$589.50</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="well pull-right buttonwrap"> <a class="btn btn-orange" href="#">View Cart</a> <a class="btn btn-orange" href="#">Checkout</a> </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div id="categorymenu">
        <nav class="subnav">
            <ul class="nav-pills categorymenu">
                <li><a href="{{ url('/') }}">Trang chủ</a>
                </li>
                <li><a class="active"  href="index.html">Home</a>
                    <div>
                        <ul>
                            <li><a href="index2.html">Home Style 2</a>
                                <div>
                                    <ul>
                                        <li><a href="product.html">Product style 1</a> </li>
                                        <li><a href="product2.html">Product style 2</a> </li>
                                        <li><a href="#"> Women's Accessories</a> </li>
                                        <li><a href="#">Men's Accessories <span class="label label-success">Sale</span> </a> </li>
                                        <li><a href="#">Dresses </a> </li>
                                        <li><a href="#">Shoes <span class="label label-warning">(25)</span> </a> </li>
                                        <li><a href="#">Bags <span class="label label-info">(new)</span> </a> </li>
                                        <li><a href="#">Sunglasses </a> </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{ url('lien-he') }}">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</div>