//Select the menu icon based on the id
let menu = document.querySelector('#menu-icon');

//Select navbar based on class
let navlist = document.querySelector('.navlist');

//If menu-icon is clicked then change the 3 bar icon to a cross and toggle the css for class "open"
menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navlist.classList.toggle('open');
}

