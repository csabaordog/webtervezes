/*
Ez a kódrészlet az oldal betöltődése után (load esemény) ráhelyez egy
eseményfigyelőt az #ugras-gomb elemre, ami kattintásra az oldal tetejére ugrik,
és egy másik eseményfigyelőt a window object-re ami az #ugras-gomb láthatóságáért felelős.
 */

window.addEventListener("load",()=>{
    let ugrasGomb = document.getElementById("ugras-gomb");
    ugrasGomb.onclick = () => {
        window.scrollTo(0,0);
    };
    window.onscroll = () => {
        if(window.scrollY >= 50){
            ugrasGomb.style.opacity = "1.0";
        }else{
            ugrasGomb.style.opacity = "0.0";
        }
    };
})
/*
    Ez a függvény mindössze egy rejtett checkbox értékét "kapcsolgatja ki-be" (toggle),
    ami a mobilnézetes menü láthatóságáért felelős
*/

function hamburger(){
    let checkbox = document.getElementById("menu-toggle");
    checkbox.checked = !checkbox.checked;
}
