var K = {
    init: function() {
        document.onkeydown = K.handleKeyDown;
        document.onkeyup = K.handleKeyUp;
    },

    on: function(key, fn, opt) {
        K.currentlyPressedKeys[K.keyCodeChart[key]] = fn;
        K.optionsForKeyDown[K.keyCodeChart[key]] = opt;
    },

    up: function(key, fn, opt) {
        K.currentlyUppedKeys[K.keyCodeChart[key]] = fn;
        K.optionsForKeyUp[K.keyCodeChart[key]] = opt;
    },

    off: function(key) {
        K.currentlyPressedKeys[K.keyCodeChart[key]] = false;
        K.currentlyUppedKeys[K.keyCodeChart[key]] = false;
        K.optionsForKeyDown[K.keyCodeChart[key]] = false;
        K.optionsForKeyUp[K.keyCodeChart[key]] = false;
    },

    handleKeyUp: function(event) {
        var keyCode = event.which || event.keyCode;
        if (typeof K.currentlyUppedKeys[keyCode] !== 'undefined') {
            if (K.currentlyUppedKeys[keyCode] !== false) {
                // execute this function
                K.currentlyUppedKeys[keyCode](K.optionsForKeyUp[keyCode]);
            }
        }
    },

    handleKeyDown: function(event) {
        var keyCode = event.which || event.keyCode;
        if (typeof K.currentlyPressedKeys[keyCode] !== 'undefined') {
            if (K.currentlyPressedKeys[keyCode] !== false) {
                // execute this function
                K.currentlyPressedKeys[keyCode](K.optionsForKeyDown[keyCode]);
            }
        }

    },
    optionsForKeyDown: [],
    optionsForKeyUp: [],
    currentlyPressedKeys: [],
    currentlyUppedKeys: [],
    keyCodeChart: {
        'backspace':  8, 'tab':       9, 'enter':     13, 'shift':    16, 'ctrl':       17,
        'alt':       18, 'capslock': 20, 'esc':       27, 'pageup':   33, 'pagedown':   34,
        'end':       35, 'home':     36, 'leftarrow': 37, 'uparrow':  38, 'rightarrow': 39,
        'downarrow': 40, 'insert':   45, 'delete':    46, 'numlock': 144,
        '0':  48, '1':  49, '2':   50, '3':  51, '4':  52, '5':  53, '6':  54, '7':  55, '8':  56,
        '9':  57, 'a':  65, 'b':   66, 'c':  67, 'd':  68, 'e':  69, 'f':  70, 'g':  71, 'h':  72,
        'i':  73, 'j':  74, 'k':   75, 'l':  76, 'm':  77, 'n':  78, 'o':  79, 'p':  80, 'q':  81,
        'r':  82, 's':  83, 't':   84, 'u':  85, 'v':  86, 'w':  87, 'x':  88, 'y':  89, 'z':  90,
        '/': 111, ';': 186, '=':  187, ',': 188, '-': 189, '.': 190, '/': 191, '`': 192, '[': 219,
        ']': 221, "'": 222, '\\': 220,
        'f1': 112, 'f2': 113, 'f3': 114, 'f4':  115, 'f5':  116, 'f6':  117,
        'f7': 118, 'f8': 119, 'f9': 120, 'f10': 121, 'f11': 122, 'f12': 123
    }
};

document.onreadystatechange = K.init();

