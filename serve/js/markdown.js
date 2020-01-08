var body = document.getElementsByTagName("body");
markdown(body[0]);
//Array.prototype.forEach.call(list, markdown);

function markdown(element){
    element.innerHTML = element.innerHTML.replace( "\\~", "~")
    
    element.innerHTML = element.innerHTML.replace( /(\w+)~"(.+)"/gm,"<span class=\"kw $1\">$2</span>")
    element.innerHTML = element.innerHTML.replace( /(\w+)~(\w+)/gm,"<span class=\"kw $1\">$2</span>")
    element.innerHTML = element.innerHTML.replace( /~(\w+)/gm,"<span class=\"kw\">$1</span>")
}