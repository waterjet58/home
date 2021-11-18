class Room {
    //variables
    constructor(x, y, width, height, ctx) {
        this.x = x;
        this.y = y;
        this.height = height;
        this.width = width;
        this.lineWidth = 7;
        this.selected = false;
        this.edgeWidth = 20
        this.dragLoc = "none"
        this.dragging = false
    }

    draw(ctx) {
        ctx.lineWidth = 1;

        if (this.selected == false) {
            ctx.fillStyle = 'white';
        }
        if (this.selected == true) {
            ctx.fillStyle = 'red';
        }

        ctx.fillRect(this.x, this.y, this.width, this.height);
        ctx.strokeRect(this.x, this.y, this.width, this.height);
    }

}