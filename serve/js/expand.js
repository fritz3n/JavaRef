var expanding = false;

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
    expanding = true;
    

    iframe = document.getElementById("item-frame");
    iframe.src = "/item.php?iframe=1&item=" + item;
    iframe.style.zIndex = 10;
    var scroll = document.documentElement.scrollTop;
    window.scroll({
        top: 0,
        left: 0,
        behavior: 'smooth'
      });

    document.body.classList.add("noscroll");
    iframe.onload= function() {
        iframe.classList.add("expand");
        iframe.style.zIndex = 1;
        if(pushState)
            history.pushState({type: "expand", item: item, prevScroll: scroll}, item, "/items.php?item=" + item);
        expanding = false;
    };
}

window.onpopstate = function(event) {
    if(event.state != null && event.state.type == "expand"){
        expand(event.state.item, false);
    }else{
        if(event.state != null && history.state.type == "expand")
            contract(event.state.prevScroll);
        else 
            contract();
    }
};

window.onclick = contractMaybe;

/**
 * 
 * @param {MouseEvent} event 
 */
function contractMaybe(event){
    if(!expanding && !isNavbarChild(event.target)){
        ensureCollapsedNavbar();
        contract();
    }
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

async function contract(prevScroll = -1) {

    if(prevScroll == -1){
        if(history.state != null && history.state.type == "expand")
            prevScroll = history.state.prevScroll
    }

    /**@type {HTMLElement} */
    var iframe = document.getElementById("item-frame");

    iframe.style.zIndex = 10;
    iframe.classList.remove("expand");

    while( history.state != null && history.state.type == "expand"){
        history.back();
        await sleep(20);
    }
    document.body.classList.remove("noscroll");
    if(prevScroll != -1)
        window.scroll({
            top: prevScroll,
            left: 0,
            behavior: 'smooth'
        });
}