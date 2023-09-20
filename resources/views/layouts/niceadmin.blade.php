<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('layouts/head')
  
      <script type="text/javascript">
        function number_format(amount, decimals) {

        amount += ''; // por si pasan un numero en vez de un string
        amount = parseFloat(amount.replace(/[^0-9\.\-]/g, '')); // elimino cualquier cosa que no sea numero o punto

        decimals = decimals || 0; // por si la variable no fue fue pasada

        // si no es un numero o es igual a cero retorno el mismo cero
        if (isNaN(amount) || amount === 0) 
            return parseFloat(0).toFixed(decimals);

        // si es mayor o menor que cero retorno el valor formateado como numero
        amount = '' + amount.toFixed(decimals);

        var amount_parts = amount.split('.'),
            regexp = /(\d+)(\d{3})/;

        while (regexp.test(amount_parts[0]))
            amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

      return amount_parts.join('.');
      }
      </script>

      <style type="text/css">
        body.smart-style-6 .table>tbody>tr>td, body.smart-style-6 .table>tbody>tr>th, body.smart-style-6 .table>tfoot>tr>td, body.smart-style-6 .table>tfoot>tr>th, body.smart-style-6 .table>thead>tr>td, body.smart-style-6 .table>thead>tr>th {
          padding: 8px 10px;
          font-size: 12px;
          }

          body.smart-style-6 .login-info {
            height: 110px;
            background: #FFF;
            margin-top: -1px!important;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            border: 0;
        }



        body.smart-style-6 .login-info img {
            border-radius: 0%;
            min-width: 30px;
            width: 90px;
            max-width: 90%;
            max-height: 90px;
            min-height: 50px;
            /*padding: 3px;*/
            border: 0px solid rgba(0,0,0,.14);
            /*box-sizing: content-box;*/
        }

        body.smart-style-6 .login-info a span {
            display: block;
            background: rgba(0,0,0,.2);
            width: 100%;
            max-width: 100%;
            padding: 5px 10px;
            margin-left: -10px;
            margin-top: 2px;
            color: #fff;
        }

        /*body.smart-style-6 .minifyme {
            background: #FC1F24;
            color: #FFF;
            position: absolute;
            width: 29px;
            border-radius: 50%;
            z-index: 999;
            right: 0;
            padding: 1px 3px;
            border-bottom: 1px solid #3D6A8A;
        }*/

        .popover{
          z-index: 999999;
        }

        .MessageBoxMiddle {
            position: relative;
            left: 10%;
            width: 90%;
        }

        .page-footer {
            height: 70px;
        }

        body.smart-style-6 .minifyme {
            position: relative;
            top: 30px;
            left: 206px;
        }

        #ribbon{padding: 10px 46px;}

        /*.fa-mobile-phone:before, .fa-mobile:before, .fa-envelope-square:before {
            content: "\f10b";
            top: 4px;
            position: relative;
            padding: 3px;
        }*/

        /*.hide-phone{font-size: 19px;
            font-weight: 800;
            text-transform: uppercase;
            color: #fff;
        }*/

        
      </style>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

      @include('layouts/head')


  </header><!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      @include('layouts/aside')

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div id="content"> 
      <!--<div id="notificiones_realtime" class="alert alert-success">App en Tiempo Real</div>-->

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      @yield('content')
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

      @include('layouts/footer')

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

    @include('layouts/DefaultPageScript') 

  <!-- Template Main JS File --> 

</body>

</html>