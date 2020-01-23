var heights = document.getElementsByClassName('info');
for (var i = 0; i < heights.length; i++) {
    var height = heights[i].offsetHeight;
    heights[i].className += " gradient";
}