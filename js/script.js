// Scrolling header
window.onscroll = () => {
    const nav = document.querySelector('#main-nav');
    if(this.scrollY <= 75) nav.className = ''; else nav.className = 'scroll';
  };

// Hamburger menu
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("content").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("content").style.marginLeft= "0";
}

// Read more 
function readMore() {
  let x = document.getElementById("AL-paragraph2");
  if (x.style.display === "none") {
    x.style.display = "inline-block";
    document.getElementById("expand-para").style.marginBottom = "250px";
  } else {
    x.style.display = "none";
  }
}