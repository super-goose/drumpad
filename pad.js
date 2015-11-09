var pad = {
    recording: {on: false, key: '', interval: null, start: null},
    recorded: {},
    playing: {},
    onLoop: [],
    loop: null,

    initialize: function (keys) {

        for (var i = 0, l = keys.length; i < l; i++) {
            if (keys[i].file != '') {
                createjs.Sound.registerSound(keys[i].file, keys[i].key);
            }
            K.on(keys[i].key, pad.click, keys[i].id);
        }

        pad.loop = setInterval(function() {
            for (i = 0; i < pad.onLoop.length; i++) {
 
                var id = pad.onLoop[i];
                var cssId = pad.getCssId(id);

                $('#' + cssId).fadeOut(90).fadeIn(10);

                if (typeof pad.playing[id] != 'undefined') {
                    pad.playing[id].stop();
                }
                pad.playing[id] = createjs.Sound.play(id);
            }
        }, 500);
    },

    click: function (key) {        
        $(key).trigger('click');
    },

    allClick: function (key) {
        var id = key.attr('data-key');
        key.fadeOut(90).fadeIn(10);

        if (!pad.recording.on) {
            if (typeof pad.playing[id] != 'undefined') {
                pad.playing[id].stop();
            }
            pad.playing[id] = createjs.Sound.play(id);
        } else {
            if (pad.onLoop.indexOf(id) > -1) {
                pad.onLoop.splice(pad.onLoop.indexOf(id), 1);
            } else {
                pad.onLoop.push(id);
            }
        }
    }, 

    startRecording: function (opt) {
        if (!pad.recording.on) {
            pad.recording.on = true;
        }
    },

    stopRecording: function (opt) {
        if (pad.recording.on) {
            pad.recording.on = false;
        }
    },

    yellowClick: function (key) {
        var id = key.attr('id');
        if (id == 'r-square-bracket') {

        } else if (id == 'apostrophe') {

        } else if (id == 'forward-slash') {
            pad.onLoop = [];
        }
    }, 

    getCssId: function (id) {
        switch (id) {
            case '[':
                return 'l-square-bracket';
            case ']':
                return 'r-square-bracket';
            case ';':
                return 'semicolon';
            case '\'':
                return 'apostrophe';
            case ',':
                return 'comma';
            case '.':
                return 'period';
            case '/':
                return 'forward-slash';
            default:
                return id;
        }
    },
};