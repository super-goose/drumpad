<html>
<head>
    <title>Dubstep Drum Pad</title>
    <script type="text/javascript" src="jquery-2.1.3.js"></script>
    <script type="text/javascript" src="keyboard.js"></script>
    <script type="text/javascript" src="pad.js"></script>
    <link rel="stylesheet" type="text/css" href="pad.css">
    <script src="https://code.createjs.com/createjs-2015.05.21.min.js"></script>
</head>
<body>
    <div id="rack" style="display: inline-block; width: auto; margin: 5px auto;">
        <div id="controls" style="border: 1px solid black;"></div>
        <div id="board" style="border: 1px solid black;">
            <div class="row">
                <?php 
                    include_once "keys.php";
                ?>
                <?php foreach ($keyboard as $row => $keys): ?>
                    <div class="row" id="<?=$row?>">
                    <?php foreach ($keys as $name => $key): ?>
                        <div class="key <?=$key['class']?>" id="<?=$name?>">
                            <div><?=$key['key']?></div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">

            </div>
            <div class="row">

            </div>
        </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {

        pad.initialize("sounds/808_Clap.ogg",       'q', '#q');
        pad.initialize("sounds/808_Clave.ogg",      'a', '#a');
        pad.initialize("sounds/808_Conga.ogg",      'z', '#z');
        pad.initialize("sounds/808_Kick_Long.ogg",  'w', '#w');
        pad.initialize("sounds/808_Kick_Short.ogg", 's', '#s');
        pad.initialize("sounds/808_Cymbal.ogg",     'x', '#x');
        pad.initialize("sounds/808_Tom_Low.ogg",    'e', '#e');
        pad.initialize("sounds/808_Tom_Mid.ogg",    'd', '#d');
        pad.initialize("sounds/808_Tom_Hi.ogg",     'c', '#c');
        pad.initialize("sounds/808_Hat_Pedal.ogg",  'r', '#r');
        pad.initialize("sounds/808_Hat_Closed.ogg", 'f', '#f');
        pad.initialize("sounds/808_Hat_Open.ogg",   'v', '#v');

        /* * * * * * * * * green buttons * * * * * * * * */
        pad.initialize("sounds/dubsnare.ogg",      't', '#t');
        pad.initialize("sounds/dubkick.ogg",       'g', '#g');
        pad.initialize("sounds/dubshaker.ogg",     'y', '#y');
        pad.initialize("sounds/dubboom.ogg",       'h', '#h');
        pad.initialize("sounds/crashwhoo.ogg",     'u', '#u');
        pad.initialize("sounds/kickbassclap.ogg",  'i', '#i');
        pad.initialize("sounds/dubdrop1.ogg",      'j', '#j');
        pad.initialize("sounds/bendupsynth.ogg",   'b', '#b');
        pad.initialize("sounds/benddownsynth.ogg", 'n', '#n');

        /* * * * * * * * * * yellowbuttons * * * * * * * * * */
        pad.initialize("", "'", '#apostrophe');
        pad.initialize("", '/', '#forward-slash');

        K.up(']', stopRecording, '');
        K.on(']', startRecording, '');
        pad.loop = setInterval(function() {
            for (i = 0; i < pad.onLoop.length; i++) {
                pad.click(pad.onLoop[i]);
            }
        }, 500);

        function startRecording(opt) {
            if (!pad.recording.on) {
                pad.recording.on = true;
                console.log('] key was pressed');                
            }
        }

        function stopRecording(opt) {
            if (pad.recording.on) {
                pad.recording.on = false;
                console.log('] key was released');                
            }
        }

        $('.key').click(function() {
            if ($(this).hasClass('green')) {
                pad.greenClick($(this));
            } else if ($(this).hasClass('blue')) {
                pad.blueClick($(this));
            } else if ($(this).hasClass('red')) {
                pad.redClick($(this));
            } else if ($(this).hasClass('yellow')) {
                pad.yellowClick($(this));
            } 
        });

    });

/*
#q,#w,#e,#r,#a,#s,#d,#f,#z,#x,#c,#v 
#t,#y,#u,#g,#h,#j,#b,#n,#m
#i,#k,#comma,#o,#l,#period,#p,#semicolon,#forward-slash,#apostrophe,#l-square-bracket,#r-square-bracket
*/

    </script>
</body>
</html>
