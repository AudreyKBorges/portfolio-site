window.onscroll = () => {
    const nav = document.querySelector('#main-nav');
    if(this.scrollY <= 75) nav.className = ''; else nav.className = 'scroll';
  };

function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}