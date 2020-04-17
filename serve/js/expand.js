
window.onmessage = function(e){
    if (e.data.type == 'close') {
        contract();
    }else if(e.data.type == 'address'){
        redirectAddress(e.data.item);
    }
};

function redirectAddress(item){
    var f = document.createElement('form');
    f.action='/addresseingabe.php';
    f.method='POST';

    var i=document.createElement('input');
    i.type='hidden';
    i.name='item';
    i.value=item;
    f.appendChild(i);

    document.body.appendChild(f);
    f.submit();
}

/**
 * 
 * @param {HTMLElement} element 
 * @returns {boolean}
 */
function isNavbarChild(element){
    if(element.classList.contains("navbar"))
        return true;
    if(element.parentElement.tagName == "HTML")
        return false;
    if(element.parentElement.classList.contains("navbar"))
        return true;
    
    return isNavbarChild(element.parentElement);
}

async function expand(item, pushState = true) {
    iframe = document.getElementById("item-frame");
    iframe.src = "/item.php?iframe=1&item=" + item;
    iframe.style.zIndex = 10;
    iframe.onload= function() {
        iframe.classList.add("expand");
        iframe.style.zIndex = 1;
        if(pushState)
            history.pushState({type: "expand", item: item}, item, "/items.php?item=" + item);
    };
}

window.onpopstate = function(event) {
    if(event.state != null && event.state.type == "expand"){
        expand(event.state.item, false);
    }else{
        contract(false);
    }
};

window.onclick = contractMaybe;

/**
 * 
 * @param {MouseEvent} event 
 */
function contractMaybe(event){
    if(!isNavbarChild(event.target)){
        ensureCollapsedNavbar();
        contract();
    }
}

async function contract(goBack = true) {

    /**@type {HTMLElement} */
    var iframe = document.getElementById("item-frame");
    
    iframe.style.zIndex = 10;
    iframe.classList.remove("expand");

    if(goBack && history.state != null && history.state.type == "expand")
        history.back();
}