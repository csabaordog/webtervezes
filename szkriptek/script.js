let sectionok = document.querySelectorAll("section.kint");
let ugrasGomb = document.querySelector("#ugras-gomb");
/*
    Ez a kódrészlet ráhelyez az #ugras-gomb-ra kattintás-figyelést,
    így amikor rákattintuk az oldal tetejére görget
 */

ugrasGomb.onclick = () => {
    window.scrollTo(0, 0);
};

/*
    Ez a kódrészlet mindig görgetésnél lefut, és az #ugras-gomb
    akkor válik láthatóvá, ha nem az oldal tetején vagyunk (+ load esemény is lefut a section-ök beúsztatása miatt)
*/
window.onscroll = () => {
    if (window.scrollY >= 50) {
        ugrasGomb.style.opacity = "1.0";
    } else {
        ugrasGomb.style.opacity = "0.0";
    }
    sectionBeusztatas();
};

window.onload = sectionBeusztatas;


/*
    Ez a függvény mindössze egy rejtett checkbox értékét "kapcsolgatja ki-be" (toggle),
    ami a mobilnézetes menü láthatóságáért felelős
*/

function hamburger() {
    let checkbox = document.getElementById("menu-toggle");
    checkbox.checked = !checkbox.checked;
}

/*
    Betöltődéskor és görgetéskor lefut a függvény, ami minden section-re ellenőrzi, hogy már látszódik-e a képen
    (a -350px azért került bele, hogy látszódjon is a beúszás és ne egyből ússzon be)
*/

function sectionBeusztatas() {
    sectionok.forEach((section) => {
        let elem = section.getBoundingClientRect();
        if (elem.top <= (window.innerHeight || document.documentElement.clientHeight) - 350) {
            section.classList.add("becsuszas");
            section.classList.remove("kint");
        }
    });
}