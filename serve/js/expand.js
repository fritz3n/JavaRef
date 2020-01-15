/**
 * 
 * @param {HTMLElement} element 
 */

async function expand(element) {
    iframe = document.getElementById("item-frame");
    iframe.src = "/item.php?iframe=1&item=" + element;
    iframe.onload= function() {
        iframe.classList.add("expand");
    };
    /*
    var bodyRect = document.body.getBoundingClientRect(),
    elemRect = element.getBoundingClientRect();

    element.setAttribute("size", JSON.stringify(elemRect));
    
    element.style.zIndex = 1;

    element.classList.remove('transition-all');
    element.style.width = element.clientWidth + "px";
    element.style.height = element.clientHeight + "px";
    element.style.top = (elemRect.top - bodyRect.top) + "px";
    element.style.left = (elemRect.left - bodyRect.left) + "px";
    element.style.position = "fixed";


    element.classList.add('transition-all');
    await new Promise(r => setTimeout(r, 100));
    element.style = null;
    element.classList.add('expand');*/
}

/**
 * 
 * @param {HTMLElement} element 
 */
async function contract(element) {

    elemRect = JSON.parse(element.getAttribute("size"));
    
    var bodyRect = document.body.getBoundingClientRect();

    element.style.zIndex = 1;

    element.style.width = elemRect.width + "px";
    element.style.height = elemRect.height + "px";
    element.style.top = (elemRect.top - bodyRect.top) + "px";
    element.style.left = (elemRect.left - bodyRect.left) + "px";
    element.style.position = "fixed";

    element.classList.remove('expand');
    await new Promise(r => setTimeout(r, 1000));
    element.style = null;
}