<!-- breadcrumb -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php base_url(); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Report Depresiasi/Revenue (Consumer)</span>
        </li>
    </ul>
</div>
<!-- end breadcrumb -->
<div class="space-4"></div>
<div class="row">
    <div class="col-md-12">
        <h2 class="info" style="display:none;">Oops, this report on construction <i class="fa fa-building"></i></h2>
    </div>
</div>

<script>
    $(function() {
        $(".info").fadeIn(2000)
        window.setInterval("changeColor()", 1000);
    });

    function changeColor() {
        var newColor = '#'+(0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6);
        $(".info").css('color',newColor);
    }
</script>