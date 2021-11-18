var canvas = document.getElementById("grid");
var ctx = canvas.getContext('2d');

ctx.canvas.width  = 2500;
ctx.canvas.height = 1200;


var drawGrid = function() {
    w = ctx.canvas.width;
    h = ctx.canvas.height;
    ctx.lineWidth = 1;
    for (x=0;x<=w;x+=100) {
        for (y=0;y<=h;y+=100) {
            ctx.moveTo(x, 0);
            ctx.lineTo(x, h);
            ctx.stroke();
            ctx.moveTo(0, y);
            ctx.lineTo(w, y);
            ctx.stroke();
        }
    }

};

drawGrid();