var mig = mig || {};
mig.canvas = mig.canvas || {};
mig.canvas.view = function (window, confApp) {
    "use strict";
    var jQuery = window.$j, root, confDef, conf, ini = 0,
            int = function (s) {
                return parseInt(s, 10);
            },
            self = this;
    confDef = {
        root: '.svg-canvas'
    };
    conf = jQuery.extend(confDef, confApp);

    self.setCanvas = function () {
        self.canv = jQuery(conf.root);

        //console.log(self.canv.attr('width'));
        //self.canv.css({width: self.canv.attr('width') + 'px'});
        self.canv.click(function (e) {
            execute(e);
        });

        jQuery('svg *').click(function (e) {
            if (jQuery(this).attr('stroke') != 'red') {
                jQuery(this).attr({'stroke': 'red', 'stroke-width': '1px'});
            } else {
                jQuery(this).attr({'stroke': 'black', 'stroke-width': '1px'});
            }
        });
    }

    this.setCanvas();

    var calculate = jQuery('.calculate'),
            desc = jQuery('.desc'),
            reseter = jQuery('.reseter'),
            start = jQuery('.start'),
            end = jQuery('.end'),
            zoom0ut = jQuery('.zoom-out'),
            zoomIn = jQuery('.zoom-in'),
            rule = jQuery('.svg-rule'),
            ruler = jQuery('.ruler'),
            //excludes = jQuery('.exclude'),
            //excluders = jQuery('.excluder'),
            //current = [],         
            txt = '',
            reset = function () {
                conf.X = 0;
                conf.Y = 0;
                conf.Xe = 0;
                conf.Ye = 0;

                conf.Xr = 0;
                conf.Yr = 0;

                conf.cnt = 0;
                start.css({top: conf.Y, left: conf.X});
                end.css({top: conf.Ye, left: conf.Xe});
                calculate.html('').css({top: conf.Y, left: conf.X, width: 0, height: 0});
                if(ini != 0) {
                  desc.html('');  
                }
                
                self.canv.css({transform: 'scale(' + 1 + ')', top: 0, left: 0});
                ini++;
            };


    jQuery('.switcher').click(function (e) {
        e.stopPropagation();

        /*if (jQuery(this).hasClass('excluder')) {
         
         for (var i = 0; i < current.length; i++) {
         
         if (typeof current[i].box !== "undefined") {
         current[i].box.hide();
         }
         if (typeof current[i].href !== "undefined") {
         current[i].href.removeClass('active');
         }
         }
         current = [];
         }*/

        var what = jQuery(this).attr('data-id-to-switch'),
                el = jQuery('.' + what);
        el.toggle();
        //current.push({box: el, href: jQuery(this)});



        if (el.is(":visible")) {
            jQuery(this).addClass('active');
            if (what == 'pomiar') {
                calculate.show();
                desc.show();
                start.show();
                end.show();
                reset();
            }            
            
        } else {
            jQuery(this).removeClass('active');
            if (what == 'pomiar') {
                calculate.hide();
                desc.hide();
                start.hide();
                end.hide();
            }

        }

        return false;
    });

    var rules = function () {

        for (var i = 0; i < 20; i++) {
            var z = i * 50,
                    x = document.createElementNS('http://www.w3.org/2000/svg', 'line'),
                    y = document.createElementNS('http://www.w3.org/2000/svg', 'line'),
                    tx = document.createElementNS('http://www.w3.org/2000/svg', 'text'),
                    ty = document.createElementNS('http://www.w3.org/2000/svg', 'text');

            x.setAttribute('x1', '390');
            x.setAttribute('y1', z);
            x.setAttribute('x2', '410');
            x.setAttribute('y2', z);
            x.setAttribute('stroke-width', 1);
            x.setAttribute('stroke', 'grey');
            rule.append(x);

            tx.setAttribute('x', '415');
            tx.setAttribute('y', z + 15);
            tx.setAttribute('fill', 'grey');
            tx.textContent = z;
            rule.append(tx);

            y.setAttribute('x1', z);
            y.setAttribute('y1', '390');
            y.setAttribute('x2', z);
            y.setAttribute('y2', '410');
            y.setAttribute('stroke-width', 1);
            y.setAttribute('stroke', 'grey');
            rule.append(y);

            ty.setAttribute('x', z + 15);
            ty.setAttribute('y', '425');
            ty.setAttribute('fill', 'grey');
            ty.textContent = z;
            rule.append(ty);

        }
    }

    rules();

    reseter.click(function (e) {
        reset();
    });

    zoom0ut.click(function (e) {
        var cs = self.canv.css({transform: 'scale'});
        console.log(cs);
        self.canv.css({transform: 'scale(' + 1.2 + ')', top: '15%', left: '10%', 'z-index': 200});
    });
    zoomIn.click(function (e) {
        reset();
        self.canv.css({transform: 'scale(' + 0.7 + ')'});
    });

    rule.mouseover(function (e) {
        conf.X = e.pageX;
        conf.Y = e.pageY;
        jQuery(this).css({top: conf.Y - 400, left: conf.X - 400});
    });

    rule.click(function (e) {
        jQuery(this).hide();
        ruler.removeClass('active');
    });

    var execute = function (e) {
        //console.debug(e, 'e');

        conf.cnt++;

        if (conf.cnt == 1) {
            conf.X = e.pageX;

            conf.Y = e.pageY;
            start.css({top: conf.Y, left: conf.X});
            txt = 'x: ' + conf.X + ', y:' + conf.Y;
            calculate.html(txt).css({top: conf.Y - 80, left: conf.X - 80, width: '120px', height: '80px'});
            desc.html(txt);
        }

        if (conf.cnt == 2) {
            conf.Xe = e.pageX;
            conf.Ye = e.pageY;
            conf.Xr = Math.abs(conf.X - conf.Xe);
            conf.Yr = Math.abs(conf.Y - conf.Ye);
            end.css({top: conf.Ye - 3, left: conf.Xe - 3});
            txt = 'w: ' + conf.Xr + ', h:' + conf.Yr;
            desc.html(txt + '<span>' + 'p:' + ((conf.Xr * conf.Yr) / 10000) + '</span>');

            if (conf.Xr > 100 && conf.Yr > 40) {
                calculate.html(txt);
            } else {
                calculate.html('');
            }
            calculate.css({top: conf.Y, left: conf.X, width: conf.Xr + 'px', height: conf.Yr + 'px'});
        }
    };
    // });
    return self;
};



