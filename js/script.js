window.onscroll = () => {
    const nav = document.querySelector('#main-nav');
    if(this.scrollY <= 100) nav.className = ''; else nav.className = 'scroll';
  };