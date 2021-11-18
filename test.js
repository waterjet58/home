var canvas = document.getElementById("rooms");
var ctx = canvas.getContext('2d');

ctx.canvas.width = 2500;
ctx.canvas.height = 1200;

var room1 = new Room(100, 100, 200, 300);
var room2 = new Room(400, 400, 500, 300);
var rooms = [];
rooms.push(room1)
rooms.push(room2)
curTarget = null

var lastUpdate = Date.now();
var myInterval = setInterval(tick,0)
curDelta = 0;

function tick()
{
    var now = Date.now();
    var deltaTime = now - lastUpdate;
    lastUpdate = now;
    curDelta = curDelta + deltaTime
    
}

function drawRooms() {
    for (i = 0; i < rooms.length; i++) {
        rooms[i].draw(ctx);
    }
}

canvas.onmousedown = function (e) {

}

canvas.onmouseup = function (e) {
    mouseDown = false;

    rooms[i].dragging = null;
}

canvas.onmousemove = function (e) {
    
    if(curDelta >15)
    {
        curDelta = 0;
        handleRooms(e)
    }

    }

    function handleRooms(e)
    {
        ctx.clearRect(0, 0, canvas.width, canvas.height); // for demo
        drawRooms();
        
        var widthMin = 150
        var heightMin = 150
        var edgeSize

        //Get True mouse cords
        var r = canvas.getBoundingClientRect(),
            x = e.clientX, y = e.clientY - r.top;

        
        for (let i = 0; i < rooms.length; i++) {

            if (rooms[i].dragging == true) {
                edgeSize = 100
            }
            else {
                edgeSize = 10
            }

            roomChecks(i,edgeSize);

            dragTarget = rooms[i].dragLoc

            if (rooms[i].dragging && mouseDown && rooms[i].dragLoc == "right" && rooms[i].width > widthMin) {
                rooms[i].width = x - rooms[i].x;
            }
            else if (rooms[i].dragging && mouseDown && rooms[i].dragLoc == "right") {
                rooms[i].width = widthMin + 1;
            }

            if (rooms[i].dragging && mouseDown && rooms[i].dragLoc == "left" && rooms[i].width > widthMin) {
                var change = x - rooms[i].x
                rooms[i].x = x;
                rooms[i].width -= change
            }
            else if (rooms[i].dragging && mouseDown && rooms[i].dragLoc == "left") {
                rooms[i].width = widthMin + 1;
            }

            if (rooms[i].dragging && mouseDown && rooms[i].dragLoc == "top" && rooms[i].height > heightMin) {
                var change = y - rooms[i].y;
                rooms[i].y = y;
                rooms[i].height -= change;
            }
            else if (rooms[i].dragging && mouseDown && rooms[i].dragLoc == "top") {
                rooms[i].height = heightMin + 1;
            }

            if (rooms[i].dragging && mouseDown && rooms[i].dragLoc == "bottom" && rooms[i].height > heightMin) {
                rooms[i].height = y - rooms[i].y
            }
            else if (rooms[i].dragging && mouseDown && rooms[i].dragLoc == "bottom") {
                rooms[i].height = heightMin + 1;
            }

            if (rooms[i].dragging && mouseDown && rooms[i].dragLoc == "whole") {
                rooms[i].x = x - (rooms[i].width / 2);
                rooms[i].y = y - (rooms[i].height / 2);
            }
        }
    drawRooms();

    function roomChecks(i,x,y)
    {

    }    
}