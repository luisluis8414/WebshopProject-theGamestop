const header = document.querySelector("header");
const sectionOne = document.querySelector(".home-intro");

const sectionOneOptions = {
  rootMargin: "-200px 0px 0px 0px"
};

const sectionOneObserver = new IntersectionObserver(function(
  entries,
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      header.classList.add("nav-scrolled");
      $('#ShoppingCartIcon path').css('fill', 'black');
      $('#LogOutButton').css({
        'border-color': 'black',
        'color': 'black'
      });
      

    } else {
      header.classList.remove("nav-scrolled");
      $('#ShoppingCartIcon path').css('fill', 'white');
      $('#LogOutButton').css({
        'border-color': 'white',
        'color': 'white'
      });
    } 
  });
},
sectionOneOptions);

sectionOneObserver.observe(sectionOne);
