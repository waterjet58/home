var canvas = document.getElementById("rooms");
var ctx = canvas.getContext('2d');

ctx.canvas.width = 2500;
ctx.canvas.height = 1200;

var mouseDown = false;
var dragTarget = "none"
var room1 = new Room(100, 100, 200, 300);
var room2 = new Room(400, 400, 500, 300);
var rooms = [];
rooms.push(room1)
rooms.push(room2)

function drawRooms() {
    for (i = 0; i < rooms.length; i++) {
        rooms[i].draw(ctx);
    }
}

canvas.onmousedown = function (e) {
    if(dragTarget = "whole" || rooms[i].dragging != null)
    {
        mouseDown = true;
    }
}

canvas.onmouseup = function (e) {
    mouseDown = false;

    rooms[i].dragging = null;
}
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
            console.log(i+dragTarget)
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

    function roomChecks(i,edgeSize)
    {
        if (checkRightEdge(i,edgeSize)) {
            if (rooms[i].height > 0) {
                rooms[i].selected = true;
                rooms[i].insideBound = true;
                rooms[i].dragging = i;
                rooms[i].dragLoc = "right";
            }
            else {
                rooms[i].selected = true;
                rooms[i].insideBound = true;
                rooms[i].dragging = i;
                rooms[i].dragLoc = "right";
            }
        }
        else if (checkLeftEdge(i,edgeSize)) {
            if (rooms[i].height > 0) {
                rooms[i].selected = true;
                rooms[i].insideBound = true;
                rooms[i].dragging = i;
                rooms[i].dragLoc = "left";
            }
            else {
                rooms[i].selected = true;
                rooms[i].insideBound = true;
                rooms[i].dragging = i;
                rooms[i].dragLoc = "left";
            }
        }
        else if (checkTopEdge(i,edgeSize)) {
            if (rooms[i].width > 0) {
                if (x > rooms[i].x && x < rooms[i].x + rooms[i].width) {
                    rooms[i].selected = true;
                    rooms[i].insideBound = true;
                    rooms[i].dragging = i;
                    rooms[i].dragLoc = "top";
                }
            }
            else {
                if (x < rooms[i].x && x > rooms[i].x + rooms[i].width) {
                    rooms[i].selected = true;
                    rooms[i].insideBound = true;
                    rooms[i].dragging = i;
                    rooms[i].dragLoc = "top";
                }
            }
        }
        else if (checkBottomEdge(i,edgeSize)) {
            if (rooms[i].width > 0) {
                if (x > rooms[i].x && x < rooms[i].x + rooms[i].width) {
                    rooms[i].selected = true;
                    rooms[i].insideBound = true;
                    rooms[i].dragging = i;
                    rooms[i].dragLoc = "bottom";
                }
            }
            else {
                if (x < rooms[i].x && x > rooms[i].x + rooms[i].width) {
                    rooms[i].selected = true;
                    rooms[i].insideBound = true;
                    rooms[i].dragging = i;
                    rooms[i].dragLoc = "bottom";
                }
            }
        }
        else if (!(checkBottomEdge(i,edgeSize) || checkLeftEdge(i,edgeSize) || checkRightEdge(i,edgeSize) || checkTopEdge(i,edgeSize))) {
            rooms[i].insideBound = false
        }
        if (y < rooms[i].y - edgeSize + Math.abs(rooms[i].height) && y > rooms[i].y + edgeSize && x < Math.abs(rooms[i].width) + rooms[i].x - edgeSize && x > rooms[i].x + edgeSize && !rooms[i].insideBound) {
            rooms[i].dragLoc = "whole";
            rooms[i].dragging = i;
            rooms[i].selected = true;
            console.log(i)
        }
        else if(!rooms[i].insideBound) {
            rooms[i].selected = false;
            rooms[i].insideBound = false;
            
        }
    }

    function checkTopEdge(i,edgeSize) {
        if (y < rooms[i].y + edgeSize && y > rooms[i].y - edgeSize && mouseDown == false) {
            if (rooms[i].width > 0) {
                if (x > rooms[i].x && x < rooms[i].x + rooms[i].width) {
                    return true;
                }
            }
            else {
                if (x < rooms[i].x && x > rooms[i].x + rooms[i].width) {
                    return true;
                }
            }
            return false
        }
    }

    function checkBottomEdge(i,edgeSize) {
        if (y < rooms[i].y + rooms[i].height + edgeSize && y > rooms[i].y + rooms[i].height - edgeSize && mouseDown == false) {
            if (rooms[i].width > 0) {
                if (x > rooms[i].x && x < rooms[i].x + rooms[i].width) {
                    return true
                }
            }
            else {
                if (x < rooms[i].x && x > rooms[i].x + rooms[i].width) {
                    return false
                }
            }
            return false
        }
    }

    function checkLeftEdge(i,edgeSize) {
        if (x > rooms[i].x - edgeSize && x < rooms[i].x + edgeSize && mouseDown == false) {
            if (rooms[i].height > 0) {
                if (y > rooms[i].y && y < rooms[i].y + rooms[i].height) {
                    return true
                }
            }
            else {
                if (y < rooms[i].y && y > rooms[i].y + rooms[i].height) {
                    return true
                }
            }
        }
        return false
    }

    function checkRightEdge(i,edgeSize) {
        if (x < rooms[i].x + rooms[i].width + edgeSize && x > rooms[i].x + rooms[i].width - edgeSize && mouseDown == false) {
            if (rooms[i].height > 0) {
                if (y > rooms[i].y && y < rooms[i].y + Math.abs(rooms[i].height)) {
                    return true;
                }
            }
            else {
                if (y < rooms[i].y && y > rooms[i].y + rooms[i].height) {
                    return true;
                }
            }
        }
        return false
    }
}


