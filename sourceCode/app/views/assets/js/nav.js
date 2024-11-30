$(function () {
    const dropDownNav = (container, icon) => {
        $(container).hover(function () {
          $(icon).toggleClass("bx-chevron-down bx-chevron-up");
        });
      };
      dropDownNav("#dropDown", "#iconDown");
      dropDownNav("#dropDown2", "#iconDown2");
      
      const navMobile = (iconNav, containerNav) => {
        const updateInit = () => {
          let icon = $(iconNav);
          let container = $(containerNav);
          let sizeWindow = $(window).width();
          $(icon).removeClass("bx-x").addClass("bx-menu");
          icon.off("click");
          if (sizeWindow <= 1135) {
            container.hide();
            icon.on("click", function () {
              if (!container.is(":visible")) {
                container.slideDown(500);
                icon.remove("bx-x");
                icon.addClass("bx-menu");
              } else {
                container.slideUp(500);
              }
              $(this).toggleClass("bx-menu bx-x");
            });
          } else if (sizeWindow > 1135) {
            if (!container.is(":visible")) {
              container.show();
            }
          }
        };
        $(window).resize(function () {
          updateInit();
        });
        updateInit();
      };
      navMobile("#iconNavResponsif", "#divNavResponsif");
       
});