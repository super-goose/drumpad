<!DOCTYPE html>
<html>
<head>
    <title>Dubstep Drum Pad</title>
    <script type="text/javascript" src="js/jquery-2.1.3.js"></script>
    <script type="text/javascript" src="js/createjs-2015.05.21.min.js"></script>
    <script type="text/javascript" src="keyboard.js"></script>
    <script type="text/javascript" src="pad.js"></script>
    <link rel="stylesheet" type="text/css" href="pad.css">
</head>
<body>
    <div id="rack" style="display: inline-block; width: auto; margin: 5px auto;">
        <div id="controls" style="border: 1px solid black;">
            <button id="help">Help!!</button>
        </div>
        <div id="board" style="border: 1px solid black;">
            <div class="row">
                <?php 
                    include_once "keys.php";
                ?>
                <?php foreach ($keyboard as $row => $keys): ?>
                    <div class="row" id="<?=$row?>">
                    <?php foreach ($keys as $name => $key): ?>
                        <div class="key <?=$key['class']?>" id="<?=$name?>" data-key="<?=$key['key']?>">
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


        pad.initialize([
            {file: "sounds/808_Clap.ogg",       key: 'q',  id: '#q'},
            {file: "sounds/808_Clave.ogg",      key: 'a',  id: '#a'},
            {file: "sounds/808_Conga.ogg",      key: 'z',  id: '#z'},
            {file: "sounds/808_Kick_Long.ogg",  key: 'w',  id: '#w'},
            {file: "sounds/808_Kick_Short.ogg", key: 's',  id: '#s'},
            {file: "sounds/808_Cymbal.ogg",     key: 'x',  id: '#x'},
            {file: "sounds/808_Tom_Low.ogg",    key: 'e',  id: '#e'},
            {file: "sounds/808_Tom_Mid.ogg",    key: 'd',  id: '#d'},
            {file: "sounds/808_Tom_Hi.ogg",     key: 'c',  id: '#c'},
            {file: "sounds/808_Hat_Pedal.ogg",  key: 'r',  id: '#r'},
            {file: "sounds/808_Hat_Closed.ogg", key: 'f',  id: '#f'},
            {file: "sounds/808_Hat_Open.ogg",   key: 'v',  id: '#v'},

            /* * * * * * * * * green buttons * * * * * * * * */
            {file: "sounds/dubsnare.ogg",       key: 'o',  id: '#o'},
            {file: "sounds/dubkick.ogg",        key: 'p',  id: '#p'},
            {file: "sounds/dubshaker.ogg",      key: '[',  id: '#l-square-bracket'},
            {file: "sounds/dubboom.ogg",        key: 'k',  id: '#k'},
            {file: "sounds/crashwhoo.ogg",      key: 'l',  id: '#l'},
            {file: "sounds/kickbassclap.ogg",   key: ';',  id: '#semicolon'},
            {file: "sounds/dubdrop1.ogg",       key: 'm',  id: '#m'},
            {file: "sounds/bendupsynth.ogg",    key: ',',  id: '#comma'},
            {file: "sounds/benddownsynth.ogg",  key: '.',  id: '#period'},

            /* * * * * * * * * * yellowbuttons * * * * * * * * * */
            {file: "",  key: "'",  id: '#apostrophe'},
            {file: "",  key: '/',  id: '#forward-slash'}
        ]);

        // these are separate because holding down the key is just 
        // as important as releasing it
        K.up(']', pad.stopRecording, '');
        K.on(']', pad.startRecording, '');


        $('.key').click(function() {
            if ($(this).hasClass('yellow')) {
                pad.yellowClick($(this));
            } else {
                pad.allClick($(this));
            } 
        });

        $('#help').click(function() {
            console.log(" ]  >> hold down and select a sample to have it loop (or turn it off) on each beat");
//            console.log(" '  >> hold down and select a sample to have it loop (or turn it off) on current beat");
            console.log(" /  >> kill all looped samples");
        });

console.log(K);
console.log(pad);
    });

/*
#q,#w,#e,#r,#a,#s,#d,#f,#z,#x,#c,#v 
#t,#y,#u,#g,#h,#j,#b,#n,#m
#i,#k,#comma,#o,#l,#period,#p,#semicolon,#forward-slash,#apostrophe,#l-square-bracket,#r-square-bracket
*/

    </script>
</body>
</html>
