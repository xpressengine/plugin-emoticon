<style>
    #emoticons img {cursor:pointer}
</style>
<script type="text/javascript">
//    setTimeout(function() {
//        var image = '<img src="https://codepo8.github.io/canvas-images-andpixels/img/horse.png" style="cursor:pointer"/>';
//
//        appendToolContent(image);
//        self.close();
//    }, 2000);


    $(function () {
        $('img', '#emoticons').click(function () {
            var src = $(this).attr('src'),
                image = '<img src="' + src + '" style="cursor:pointer">';

            appendToolContent(image);
            self.close();
        });
    });

</script>


<div id="emoticons">
    <img src="{{ $plugin->asset('assets/images/msn01.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn02.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn03.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn04.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn05.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn06.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn07.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn08.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn09.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn10.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn11.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn12.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn13.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn14.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn15.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn16.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn17.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn18.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn19.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn20.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn21.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn22.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn23.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn24.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn25.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn26.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn27.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn28.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn29.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn30.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn31.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn32.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn33.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn34.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn35.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn36.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn37.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn38.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn39.gif') }}">
    <img src="{{ $plugin->asset('assets/images/msn40.gif') }}">
</div>