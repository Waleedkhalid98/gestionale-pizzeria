function activeClass(){
    var header = document.getElementById("ss");  // Correggi l'ID da "myDIV" a "ss"
    var item = header.getElementsByClassName("nav-item");
    var btns = header.getElementsByClassName("nav-link");
    
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        if (current.length > 0) {
          current[0].className = current[0].className.replace(" active", "");
        }
        this.parentElement.className += " active";
      });
    }
}


function saluta() {
  alert("Ciao");
}
