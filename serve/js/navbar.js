
/**
 * 
 * @param {HTMLElement} element 
 */
function toggleExpandDropdown(element){
    if(element.parentElement.classList.contains("dropdown-expand")){
        ensureCollapsedDropdown(element.parentElement.parentElement);
    }else{

        ensureCollapsedDropdown(element.parentElement.parentElement);
        element.parentElement.classList.toggle("dropdown-expand");
        element.children[0].classList.toggle("rotate");
    }
}

/**
 * 
 * @param {HTMLElement} element 
 */
function toggleExpandNavbar(element){
    var navbar = document.getElementsByClassName("navbar")[0];
    navbar.classList.toggle("navbar-expand")
    element.classList.toggle("rotate");

    if(!navbar.classList.contains("navbar-expand"))
        ensureCollapsedDropdown(element.parentElement.parentElement);
}

function ensureCollapsedNavbar(){
    var navbar = document.getElementsByClassName("navbar")[0];
    navbar.classList.remove("navbar-expand")

    ensureCollapsedDropdown(navbar);
}

/**
 * 
 * @param {HTMLElement} element 
 */
function ensureCollapsedDropdown(element){
    element.classList.remove("rotate");
    element.classList.remove("dropdown-expand");

    Array.from(element.children).forEach(element => {
        ensureCollapsedDropdown(element);
    });
}