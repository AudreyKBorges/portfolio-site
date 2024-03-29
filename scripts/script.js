// Scrolling header
window.onscroll = () => {
  const nav = document.querySelector('#main-nav');
  if (this.scrollY <= 75) nav.className = ''; else nav.className = 'scroll';
}

// Hamburger menu
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("content").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("content").style.marginLeft = "0";
}

// Captcha callback to enable the sumbit button after the user has checked the box or completed the challenge
function enableBtn() {
  document.getElementById("submit").disabled = false;
}