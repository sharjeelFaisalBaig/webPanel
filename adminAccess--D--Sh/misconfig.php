<?php if (!(isset($_GET['errorBtn']))) {
    header("location: index.php");
} ?>
<title>MODREN SOLUTIONS ADMIN PANEL DATABASE ERROR</title>
<style>
    @import "compass/css3";

    body {
        overflow: hidden;
        width: 100%;
        height: 100%;
        margin: 0;
    }

    canvas {
        position: absolute;
        left: 0;
        top: 0;
    }

    #display {
        position: fixed;
        width: 100%;
        font-family: system-ui;
        top: 7rem;
        font-size: 6em;
        text-align: center;
        background: white;
        font-weight: 300;
    }

    #title {
        padding: 0.2em;
        background: rgba(255, 255, 255, 0.5);
        display: block;
        text-align: center;
        font-size: 30px;
        font-weight: 700;
        color: red;
    }
</style>
<canvas id="world"></canvas>
<div id="display">Database Connection Error!
    <div id="title">Please Resolve This Error to proceed to DASHBOARD 👇 <br>
        <?php if (isset($_GET['errorBtn'])) {
            echo $_GET['mysqliError'];
        } ?>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    var world = document.getElementById('world');
    var world_cx = world.getContext('2d');
    var world_w, world_h;

    var display = document.getElementById('display');
    var rgb = document.getElementById('rgb');
    var interlace = document.getElementById('interlace');

    var cv = document.createElement('canvas');
    var cx = cv.getContext('2d');
    var cw = cv.width = 100;
    var ch = cv.height = 100;
    var dt = cx.createImageData(cw, ch);
    var dd = dt.data,
        dl = dt.width * dt.height;

    function generateNoise() {
        var p = 0,
            i = 0;
        for (; i < dl; ++i) {
            dd[p++] = c = Math.floor(Math.random() * 256);
            dd[p++] = c;
            dd[p++] = c;
            dd[p++] = 255;
        }
        cx.putImageData(dt, 0, 0);
    }

    function resize() {
        var w = window.innerWidth;
        var h = window.innerHeight;
        world_w = world.width = w >> 1;
        world_h = world.height = h >> 1;
        world.style.width = w + 'px';
        world.style.height = h + 'px';
    }

    resize();
    window.addEventListener('resize', resize, false);
    window.addEventListener('load', function() {
        var s = +new Date;
        generateNoise();
        world_cx.fillStyle = world_cx.createPattern(cv, 'repeat');
        world_cx.fillRect(0, 0, world_w, world_h);
        setTimeout(arguments.callee, 20);
    }, false);
</script>