<!-- Styles -->
<link rel="stylesheet" href="<?php echo asset('bootstrap/css/guias.css')?>" type="text/css">
<!-- Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="imagenesGuias">
    <table>
        <tbody>
            @yield('content')
        </tbody>
    </table>
    <script src="<?php echo asset('js/imagenesGuias.js')?>"></script>
</div>
