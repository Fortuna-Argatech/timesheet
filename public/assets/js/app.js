

/*********************/
/*   App Js     */
/*********************/

class App {

  init() {

    const html = document.querySelector("html");
    const toggletheme = document.querySelector("#toggle-theme");
    const togglethemeicon = toggletheme?.querySelector("i");
    toggletheme?.addEventListener('click', () => {

      if (html.getAttribute('class') == "dark") {
        document.body.setAttribute("data-layout-mode", "light")
      } else {
        document.body.setAttribute("data-layout-mode", "dark")
      }

      html.classList.toggle("dark");
      const isDark = html.classList.contains('dark');
      const themeIcon = isDark ? 'sun' : 'moon';
      togglethemeicon.className = "ti ti-" + `${themeIcon}` + " text-3xl top-icon";
    })
  }
}




window.addEventListener('DOMContentLoaded', function (e) {
  new App().init();
})

/*********************/
/*   Menu Sticky     */
/*********************/
function windowScroll() {
  const navbar = document.getElementById("topbar");
  if (navbar != null) {
    if (
      document.body.scrollTop >= 50 ||
      document.documentElement.scrollTop >= 50
    ) {
      navbar.classList.add("nav-sticky");
    } else {
      navbar.classList.remove("nav-sticky");
    }
  }
}

window.addEventListener('scroll', (ev) => {
  ev.preventDefault();
  windowScroll();
})




/*********************/
/*  Vertical Menu     */
/*********************/
function activeMenu() {


  function activeTwoColumn() {
    function activeTabMenu() {
      document.querySelectorAll('.tab-menu button').forEach((e) => {
        e.setAttribute('aria-selected', false);
      })
    }
    activeTabMenu();

    document.querySelectorAll('#Icon-menu a').forEach(function (element, index) {
      var pageUrl = window.location.href.split(/[?#]/)[0];
      const target = element;

      if (element.href == pageUrl) {
        // tabPanelList list link active
        document.querySelectorAll('#Icon-menu [role="tabpanel"]').forEach(function (elem) {
          elem.classList.add('hidden');
          elem.querySelectorAll('.collapse-menu').forEach(function (accorElem) {
            accorElem.classList.add('hidden');
          });
        });

        target.classList.add('active');
        target.parentNode.classList.add('menuitem-active');
        let tabNode = null;
        if (target.parentNode.parentNode.parentNode.hasAttribute("role")) {
          target.parentNode.parentNode.parentNode.classList.remove('hidden');
          tabNode = target.parentNode.parentNode.parentNode;
        }
        if (target.parentNode.parentNode.parentNode.classList.contains("collapse-menu")) {
          target.parentNode.parentNode.parentNode.classList.remove('hidden');
          tabNode = target.parentNode.parentNode.parentNode;
        }
        if (target.parentNode.parentNode.parentNode.previousElementSibling) {
          target.parentNode.parentNode.parentNode.previousElementSibling.querySelector('.nav-link').classList.add('active');
          target.parentNode.parentNode.parentNode.previousElementSibling.querySelector('[data-accordion-icon]')?.classList.add('rotate-180');
          target.parentNode.parentNode.parentNode.previousElementSibling.querySelector('.nav-link').setAttribute('aria-expanded', "true");
          if (target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.hasAttribute("role")) {
            target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.classList.remove('hidden');
            tabNode = target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
          }
        }

        if (tabNode) {
          document.querySelectorAll(`.tab-menu button[data-tabs-target="#${tabNode.id}"]`).forEach((e) => {
            // e.setAttribute('aria-selected', true);
            e.click();
          })
        }
      }
    });
  }


  function activeHorizontal() {
    if (document.querySelector('nav#topbar')) {
      document.querySelectorAll('nav#topbar ul.NavMenu a').forEach(function (element, index) {
        var pageUrl = window.location.href.split(/[?#]/)[0];
        const target = element;
        

        if (element.href == pageUrl) {
            console.info(element);
            element.classList.add("active")
            element.parentElement.parentElement.parentElement.querySelector('a')?.classList.add('active');
            element.parentElement.parentElement.parentElement.parentElement.parentElement.querySelector('a')?.classList.add('active');
        }
      });
    }
  }

  activeTwoColumn();
  activeHorizontal();


}

window.addEventListener("load", (event) => {
  activeMenu();
});

feather.replace();


try {
  // Toggle menu
  document.getElementById("toggle-menu").addEventListener("click", function () {
    var mobileMenu = document.getElementById("mobile-menu-2");
    mobileMenu.classList.toggle("block");
    if (mobileMenu.classList.contains('block')) {
      mobileMenu.classList.remove("hidden");
    } else {
      mobileMenu.classList.add("hidden");
    }
  })
} catch (err) { }





// Default Mode
document.getElementById('default-size-check')?.addEventListener('click', () => {
  document.body.setAttribute("data-sidebar-size", "default")
});



//collapsed
var collapsedToggle = document.querySelector(".button-menu-mobile");
collapsedToggle?.addEventListener('click', function () {

  var sidebarSize = document.body.getAttribute("data-sidebar-size");

  if (sidebarSize == "collapsed") {
    document.body.setAttribute("data-sidebar-size", "default")

  } else {
    document.body.setAttribute("data-sidebar-size", "collapsed")
  }

});

window.addEventListener('resize', () => {
  if (window.innerWidth >= 310 && window.innerWidth <= 1440) {
    document.body.setAttribute("data-sidebar-size", "collapsed")
  } else {
    document.body.setAttribute("data-sidebar-size", "default")
  }
})

//collapsed
var collapsedToggle = document.querySelector(".button-menu-mobile-2");
collapsedToggle?.addEventListener('click', function () {

  var sidebarSize = document.body.getAttribute("data-sidebar-size");

  if (sidebarSize == "collapsed") {
    document.body.setAttribute("data-sidebar-size", "default")
    // document.getElementById('default-size-check').checked = true;

  } else {
    document.body.setAttribute("data-sidebar-size", "collapsed")
  }

});



function dismissDropdownMenu() {
  document.querySelectorAll(".dropdown-menu").forEach(function (item) {
    item.classList.remove("block")
    item.classList.add("hidden")
  });
  document.querySelectorAll(".dropdown-toggle").forEach(function (item) {
    item.classList.remove("block")
  });
}

window.addEventListener('click', function (e) {
  dismissDropdownMenu();
});


try {
  window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll(".drop-multi button, .second-level a").forEach(el => {
      el.addEventListener('click', function () {
        this.nextElementSibling.classList.toggle('block');
        this.parentNode.classList.toggle('block');
      });
    });
  });

  // data-tw-auto-close
  Array.from(document.querySelectorAll(".dropdown-toggle")).forEach(function (item) {
    var elem = item.parentElement
    if (item.getAttribute('data-tw-auto-close') == 'outside') {
      elem.querySelector(".dropdown-menu").addEventListener("click", function () {
        if (!isShowDropMenu) {
          isShowDropMenu = true;
        }
      });
    } else if (item.getAttribute('data-tw-auto-close') == 'inside') {
      item.addEventListener("click", function () {
        isShowDropMenu = true;
        isMenuInside = true;
      });
      elem.querySelector(".dropdown-menu").addEventListener("click", function () {
        isShowDropMenu = false;
        isMenuInside = false;
      });
    }
  });

  window.addEventListener('click', function (e) {
    if (!isShowDropMenu && !isMenuInside) {
      dismissDropdownMenu();
    }
    isShowDropMenu = false;
  });

} catch (err) { }


