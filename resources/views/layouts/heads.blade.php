<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<title>{{config('app.name','Laravel')}}</title>
<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
<link rel="icon" href="{{asset('images/LdsWebDes.png')}}" type="image/x-icon"/>

<!-- Fonts and icons -->
<script src="{{asset('atlantis-lite/assets/js/plugin/webfont/webfont.min.js')}}"></script>
<script>
    WebFont.load({
        google: {"families": ["Lato:300,400,700,900"]},
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
            urls: ['{{asset('atlantis-lite/assets/css/fonts.min.css')}}']
        },
        active: function () {
            sessionStorage.fonts = true;
        }
    });
</script>

<!-- CSS Files -->
{{ Html::style('css/fontawesome-5.8.1/css/all.min.css') }}
{{ Html::style('atlantis-lite/assets/css/bootstrap.min.css') }}
{{ Html::style('atlantis-lite/assets/css/atlantis.min.css') }}
{{ Html::style('css/style.css') }}

<!-- CSS Just for demo purpose, don't include it in your project -->
{{--{{ Html::style('atlantis-lite/assets/css/demo.css') }}--}}