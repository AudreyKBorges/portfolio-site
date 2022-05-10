window.onscroll = () => {
    const nav = document.querySelector('#main-nav');
    if(this.scrollY <= 75) nav.className = ''; else nav.className = 'scroll';
  };