var w = window.innerWidth;


// Menu functions
// Tests viewport width to determine wether or not to run js functions
if(w < 800){
var menuIcon = document.querySelector("#menu-icon");
var menu = document.querySelector("#menu");
var productItem = document.querySelector("#showsubmenu");
var submenu = document.querySelector("#submenu");
var Mybody = document.querySelector("body");
   

    // Hamburger menu controller
    menuIcon.addEventListener("click", function(){
        if(menuIcon.className != "close")
        {
            menuIcon.setAttribute("class", "close");
            menu.setAttribute("class", "show");
        }
        else
        {
            menuIcon.classList.remove("close");
            menu.classList.remove("show");
        }
    }
    ); 
} 

var w = window.innerWidth;
if(w > 800)
{
    // Slideshow functions

//Vi henter de enkelte billeder ind i variablen slidehow, som ligges i et array
var slideshow = document.querySelectorAll('.slide');
// Vi henter den overliggende div til vores dots
var dotArea = document.querySelector('#dots');
//Starter vores tæller "i"
var i = 0;

//Definere var j til nul
//Så længe j er mindre end slideshow.length skal løkken køres igennem
for (var j = 0; j < slideshow.length -1; j++)
{
    //Opretter span elementer
    var newDot = document.createElement('span');
    //tilføj klassen dots
    newDot.classList.add('dot');
    //Læg de ny oprettede span elementer i div området der blev hentet tidligere
    dotArea.appendChild(newDot);
}

//Lægger dotsne i et array
var dots = document.querySelectorAll('.dot');

//Opretter en variabel der holder vores setInterval der sørger for at funktionen kaldes når den skal
var interval = setInterval(slideshowSlider, 3000);

//Vores funktion der styrer det automatiske slideshow
function slideshowSlider()
{

    //Tester om vi er nået til slutningen af arrayet
    if (i == slideshow.length - 1)
    {
        //Hvis vi er ved enden skal tælleren nulstilles
        i = 0;
    }
    else
    {
        //Hvis ikke skal den blive ved med at tælle op
        i++;
    }
    
    //Tilføjer .currentimg til det billede der ligger på den plads i arrayet vi er på
    //Vi har talt i op derfor skal klassen flyttes
    slideshow[i].classList.add('currentimg');
    //Samme som ovenstående
    dots[i].classList.add('active');
    
    //Vi tester på om i er nul, altså om vi er i starten af arrayet, vi skal altså tilbage to pladser for at fjerne previous og 1 for at fjerne current
    if (i == 0)
    {
        //Vi går 1 tilbage erstater current med previous. Skifter klasse på det billede der lige har været vist
        slideshow[slideshow.length - 1].classList.replace('currentimg', 'previousimg');
        //Vi går tilbage og fjerner klassen previousimg
        slideshow[slideshow.length -2].classList.remove('previousimg');
        //Vi fjerner klassen fra den dot der lige har været active
        dots[slideshow.length - 1].classList.remove('active');
    }
    else
    {
        //Går tilbage og erstatter klassen
        slideshow[i-1].classList.replace('currentimg', 'previousimg');
        //Samme her
        dots[i - 1].classList.remove('active');
        
        //Står man på plads nummer 1 skal vi 2 pladser tilbage for at fjerne previous
        if (i == 1)
        {
            //Vi går to pladser tilbage iarrayet og fjerner previous
            slideshow[slideshow.length - 1].classList.remove('previousimg');
        }
        else
        {
            //På alle andre pladser i arrayet(hvis i fx er 2), så skal man gå to tilbage og fjerne previous
            slideshow[i - 2].classList.remove('previousimg');
        }
    }
}

// // Manuel slideshow

// //Henter vores pile ind i to forskellige variabler
// var myleftArrow = document.querySelector(".leftarrow");
// var myrightArrow = document.querySelector(".rightarrow");

// //Tilføjer en eventlistener til vores højre pil
// myrightArrow.addEventListener("click", function()
// {
//     clearInterval(interval);
//     slideshowSlider();
// }
// );

// myleftArrow.addEventListener("click", function()
// {
//     clearInterval(interval);
//     //Hvis i er nul, skal vi gå baglæns ved at trække 1 fra slideshow.length, vi trækker 1 fra for at komme til sidste billeder og index begynder på 0
//     if(i == 0)
//     {
//         i = slideshow.length -1;
//     }

//     else
//     {
//         //Hvis i ikke er nul trækker vi 1 fra index
//         i--;
//     }
//     //Vi tester om klassen previous er tilføjet
//     if(slideshow[i].classList.contains("previousimg"))
//     {
//         //Er den det, skal den udskiftes med current
//         slideshow[i].classList.replace("previousimg", "currentimg");
//     }

//     else
//     {
//         //Tilføjer currentimage til det index man lige kommer hen til
//         slideshow[i].classList.add("currentimg");
//     }

//     //Tilfæjer klassen active på det index vi lige er kommet hen på
//     dots[i].classList.add("active");
    
//     //Hvis vi står på sidste plads i arrayet
//     if (i == slideshow.length - 1)
//     { 
//         //Fjerne klasserne herunder
//         dots[0].classList.remove('active');
//         slideshow[0].classList.remove('currentimg');
//     }
//     else
//     {
//         //Vi går 1 frem og fjerner klasserne
//         dots[i + 1].classList.remove('active');
//         slideshow[i+1].classList.remove('currentimg');
//     }
//     //Tester værdien af 1
//     if (i == 0)
//     {
//         //Hvis i er nul skal vi tilføje klassen på det sidste billede i arrayet
//         slideshow[slideshow.length -1].classList.add('previousimg');
//     }
//     else
//     {
//         //Eller skal vi gå 1 tilbage i arrayet og tilføje klassen
//         slideshow[i -1].classList.add('previousimg');
//     }
// }
// );

}



