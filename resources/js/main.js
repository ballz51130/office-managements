function hasOwn(obj, key) {
    return Object.prototype.hasOwnProperty.call(obj, key);
} // Escape special characters.

function escapeRe(str) {
    return str.replace(/[.*+?^$|[\](){}\\-]/g, '\\$&');
} // Return a future date by the given string.

function computeExpires(str) {
    var lastCh = str.charAt(str.length - 1);
    var value = parseInt(str, 10);
    var expires = new Date();

    switch (lastCh) {
    case 'Y':
        expires.setFullYear(expires.getFullYear() + value);
        break;

    case 'M':
        expires.setMonth(expires.getMonth() + value);
        break;

    case 'D':
        expires.setDate(expires.getDate() + value);
        break;

    case 'h':
        expires.setHours(expires.getHours() + value);
        break;

    case 'm':
        expires.setMinutes(expires.getMinutes() + value);
        break;

    case 's':
        expires.setSeconds(expires.getSeconds() + value);
        break;

    default:
        expires = new Date(str);
    }

    return expires;
} // Convert an object to a cookie option string.

function convert(opts) {
    var res = ''; // eslint-disable-next-line

    for (var key in opts) {
    if (hasOwn(opts, key)) {
        if (/^expires$/i.test(key)) {
        var expires = opts[key];

        if (typeof expires !== 'object') {
            expires += typeof expires === 'number' ? 'D' : '';
            expires = computeExpires(expires);
        }

        res += ";" + key + "=" + expires.toUTCString();
        } else if (/^secure$/.test(key)) {
        if (opts[key]) {
            res += ";" + key;
        }
        } else {
        res += ";" + key + "=" + opts[key];
        }
    }
    }

    if (!hasOwn(opts, 'path')) {
    res += ';path=/';
    }

    return res;
}

function getCookie(key, decoder) {
    if (decoder === void 0) {
    decoder = decodeURIComponent;
    }

    if (typeof key !== 'string' || !key) {
    return null;
    }

    var reKey = new RegExp("(?:^|; )" + escapeRe(key) + "(?:=([^;]*))?(?:;|$)");
    var match = reKey.exec(document.cookie);

    if (match === null) {
    return null;
    }

    return typeof decoder === 'function' ? decoder(match[1]) : match[1];
} // The all cookies

function setCookie(key, value, encoder, options) {
    if (encoder === void 0) {
    encoder = encodeURIComponent;
    }

    if (typeof encoder === 'object' && encoder !== null) {
    /* eslint-disable no-param-reassign */
    options = encoder;
    encoder = encodeURIComponent;
    /* eslint-enable no-param-reassign */
    }

    var attrsStr = convert(options || {});
    var valueStr = typeof encoder === 'function' ? encoder(value) : value;
    var newCookie = key + "=" + valueStr + attrsStr;
    document.cookie = newCookie;
} // Remove a cookie by the specified key.


var Sidebar = {
    collapse: false,
    supportsLocalStorage: true,

    init(){

        this.checkLocalStorageFunctionality();
        this.collapse = this.getCollapse();

        const vm = this;
        const $sidebar = $('.bd-sidebar');

        $('.navbar-collapse-button').on('click', function (e) {
            e.preventDefault();

            $sidebar.toggleClass('collapsed')
            vm.setCollapse( !$sidebar.hasClass('collapsed') );
        })


        $('.sidebar-menu-title-container').on('click', function(e) {
            e.preventDefault();

            const $li = $(this).closest('li');

            $li.toggleClass('sidebar-submenu--active')
            // console.log( 'sidebar-menu-title' );
        })

        // $sidebar.toggleClass('collapsed', this.collapse==='true' ? false: true )

        // setTimeout(() => {
        //     $sidebar.removeClass('offline');
        // }, 10);
    },

    // set

    checkLocalStorageFunctionality(){

        try {
            var test = 'cookie-localStorage';
            window.localStorage.setItem(test, test);
            window.localStorage.removeItem(test);
        } catch (e) {
            this.supportsLocalStorage = false;
        }

    },

    setCollapse(status) {
        if (this.supportsLocalStorage) {
            localStorage.setItem("sidebar-collapsed-cookie", status);
        }
        else{
            setCookie("sidebar-collapsed-cookie", status);
        }
    },

    getCollapse() {

        if ( this.supportsLocalStorage ) {
            return localStorage.getItem("sidebar-collapsed-cookie")
        } else {
            return getCookie("sidebar-collapsed-cookie")
        }
    },
};

$(function() {
    $('[data-toggle=tooltip]').tooltip();

    Sidebar.init();
});
