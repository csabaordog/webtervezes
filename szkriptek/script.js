window.addEventListener("load",()=>{
    let ugrasGomb = document.getElementById("ugras-gomb");
    ugrasGomb.onclick = () => {
        window.scrollTo(0,0);
    };
    window.onscroll = () => {
        if(window.scrollY >= 50){
            ugrasGomb.style.opacity = 1.0;
        }else{
            ugrasGomb.style.opacity = 0.0;
        }
    };
})


function hamburger(){
    let checkbox = document.getElementById("menu-toggle");
    if(checkbox.checked ){
        checkbox.checked = false;
    }else{
        checkbox.checked = true;
    }
}