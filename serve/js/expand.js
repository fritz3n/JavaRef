
window.onmessage = function(e){
    if (e.data == 'close') {
        contract();
    }
};

/**
 * 
 * @param {HTMLElement} element 
 * @returns {boolean}
 */
function isNavbarChild(element){
    if(element.classList.contains("navbar"))
        return true;
    if(element.parentElement.classList.contains("navbar"))
        return true;
    if(element.parentElement.tagName == "HTML")
        return false;
    
    return isNavbarChild(element.parentElement);
}

/**
 * 
 * @param {HTMLElement} element 
 */
async function expand(item) {
    iframe = document.getElementById("item-frame");
    iframe.src = "/item.php?iframe=1&item=" + item;
    iframe.style.zIndex = 10;
    iframe.onload= function() {
        iframe.classList.add("expand");
        iframe.style.zIndex = 1;
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

window.onclick = contractMaybe;

/**
 * 
 * @param {MouseEvent} event 
 */
function contractMaybe(event){
    if(!isNavbarChild(event.target))
        contract();
}

async function contract() {

    /**@type {HTMLElement} */
    var iframe = document.getElementById("item-frame");
    
    iframe.style.zIndex = 10;
    iframe.classList.remove("expand");

    /*

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
    */
}