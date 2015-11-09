var pad = {
    recording: {on: false, key: '', interval: null, start: null},
    recorded: {},
    playing: {},
    onLoop: [],
    loop: null,

    initialize: function (file, key, name) {
        if (file != '') {
            createjs.Sound.registerSound(file, key);
        }
        K.on(key, pad.click, name);
    },

    click: function (key) {        
        $(key).trigger('click');
    },

    greenClick: function (key) {
        var id = key.attr('id');
        key.fadeOut(90).fadeIn(10);

        if (!pad.recording.on) {
            if (typeof pad.playing[id] != 'undefined') {
                pad.playing[id].stop();
            }
            pad.playing[id] = createjs.Sound.play(id);
        } else {
            var index = '#' + id;
            if (pad.onLoop.indexOf(index) > -1) {
                pad.onLoop.splice(pad.onLoop.indexOf(index), 1);
            } else {
                pad.onLoop.push(index);
            }
        }
    }, 

    blueClick: function (key) {
        var id = key.attr('id');
        if (typeof pad.playing[id] != 'undefined') {
            pad.playing[id].stop();
        }
        pad.playing[id] = createjs.Sound.play(id);
        key.fadeOut(90).fadeIn(10);
    }, 

    redClick: function (key) {
        var id = key.attr('id');
        if (typeof pad.playing[id] != 'undefined') {
            pad.playing[id].stop();
        }
        pad.playing[id] = createjs.Sound.play(id);
        key.fadeOut(90).fadeIn(10);
    }, 

    yellowClick: function (key) {
        var id = key.attr('id');
        if (id == 'r-square-bracket') {
            if (pad.recording.on) {
                pad.recording.on = false;
            } else {
                pad.recording.on = true;
            }
        } else if (id == 'apostrophe') {

        } else if (id == 'forward-slash') {

        }
    }, 

};