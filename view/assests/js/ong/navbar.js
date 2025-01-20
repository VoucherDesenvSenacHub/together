class MobileNavbar{
    constructor(mobileMenu, navList, navLinks){
        this.mobileMenu = document.querySelector(mobileMenu);
        this.mobileList = document.querySelector(navList);
        this.navLinks = document.querySelectorAll(navLinks);
        this.activeClass = "active";
    }

    addClickEvent(){
    this.mobileMenu.addEventListener("click", () => console.log("aaaaa"));
    }

    init(){
        if(this.mobileMenu){
            this.addClickEvent();
        }
        return this;
    }
}

const mobileNavBar = new MobileNavbar(
    ".mobile-menu",
    ".nav-links",
    ".nav-links li"
);

mobileNavBar.init();