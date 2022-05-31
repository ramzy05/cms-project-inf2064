const  header = document.querySelector('header')


/* event on window scroll */


let lastScrollTop = 0;
window.addEventListener("scroll", ()=>{
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop
  if(scrollTop > lastScrollTop){
    header.style.top = "-200px"
  }else{
    header.style.top = "0"
  }
  lastScrollTop = scrollTop
})

/* active menu */
let links = document.querySelectorAll('.links')
let sections = document.querySelectorAll('section')

/* function activeMenu(){
  let len = sections.length
  while(--len && window.scrollY + 96 < sections[len].offsetTop){}
  links.forEach(link => link.classList.remove("active"))
  links[len].classList.add("active")
} */

for (let i = 0; i < links.length; i++) {
  links[i].addEventListener("click", function() {
    let current = document.getElementsByClassName("active");

    if (current.length > 0) {
      current[0].className = current[0].className.replace("active", "");
    }

   
    this.className += " active";
  });
}


/* end active menu */