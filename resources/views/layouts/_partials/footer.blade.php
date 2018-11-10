
<!-- Core JS files -->
<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/inputmask/inputmask.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/jquery-money/jquery.Money.js')}}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>

@auth
    <script type="text/javascript" src="{{asset('assets/admin.js')}}"></script>
@endauth

<!-- /theme JS files -->

</body>
</html>