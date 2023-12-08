var tooltip;

function showData(e) {
    tooltip = document.createElement("div");
    tooltip.innerHTML = e;
    tooltip.style.position = "absolute";
    tooltip.style.background = "#fff";
    tooltip.style.border = "1px solid #ccc";
    tooltip.style.padding = "10px";
    tooltip.style.zIndex = "999";
    tooltip.style.top = event.clientY + 10 + "px";
    tooltip.style.left = event.clientX + 10 + "px";

    document.body.appendChild(tooltip);
}

function hideData() {
    if (tooltip && tooltip.parentNode) {
        tooltip.parentNode.removeChild(tooltip);
        tooltip = null;
    }
}
