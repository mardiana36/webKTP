$(document).ready(function () {
  // Login, regis
  const inputLogin = ({ inputs, cIcon }) => {
    const setupInput = (inputSelector, cIconSelector) => {
      let input = $(inputSelector);
      let icon = input.closest("div").find(cIconSelector + " i");

      icon.on("click", function () {
        input.focus();
        if (input.attr("key") == "password") {
          if ($(input).attr("type") == "password") {
            $(input).attr("type", "text");
          } else {
            $(input).attr("type", "password");
          }
          $(this).toggleClass("bxs-lock bxs-lock-open");
        }
      });

      input.on("focus", function () {
        let getLabel = $(`label[for="${input.attr("id")}"]`);
        if (getLabel.length > 0) {
          getLabel.stop().animate(
            {
              bottom: -5,
            },
            function () {
              $(this).addClass("addFocus");
            }
          );
        }
      });

      input.on("focusout", function () {
        let getLabel = $(`label[for="${input.attr("id")}"]`);
        if ($(this).val().length == 0) {
          getLabel.stop().animate(
            {
              bottom: -36,
            },
            function () {
              $(this).removeClass("addFocus");
            }
          );
        }
      });
    };

    inputs.forEach((input) => {
      setupInput(input, cIcon);
    });
  };
  inputLogin({
    inputs: [
      "#emailRegis",
      "#passwordRegis",
      "#userName",
      "#emailLogin",
      "#passwordLogin",
      "#token",
    ],
    cIcon: ".divIconLogin",
  });

  // regis, login
  const checkStatusPassword = (containerPw, inputPw, form) => {
    let container = $(containerPw);
    let input = $(inputPw);
    let fromPw = $(form);
    let allContentP = $(containerPw + " div p");

    allContentP.hide();
    input.focus(function () {
      container.stop().animate(
        {
          bottom: "-15px",
        },
        600,
        "linear"
      );
    });
    $(input).focusout(function () {
      container.stop().animate(
        {
          bottom: "40px",
        },
        600,
        "linear"
      );
    });

    input.on("input", function () {
      let valueInput = $(this).val();
      const hasNumber = /\d/.test(valueInput);
      const hasUppercase = /[A-Z]/.test(valueInput);
      const hasLowercase = /[a-z]/.test(valueInput);
      const hasSymbol = /[^\w\s]/.test(valueInput);

      let targetIndex;
      if (
        valueInput.length >= 8 &&
        hasLowercase &&
        hasNumber &&
        hasSymbol &&
        hasUppercase
      ) {
        targetIndex = 3;
      } else if (
        valueInput.length >= 8 &&
        hasLowercase &&
        hasNumber &&
        hasUppercase
      ) {
        targetIndex = 2;
      } else if (valueInput.length >= 8 && hasLowercase && hasNumber) {
        targetIndex = 1;
      } else {
        targetIndex = 0;
      }
      if (
        !allContentP.eq(targetIndex).is(":visible") &&
        valueInput.length != 0
      ) {
        allContentP.slideUp(500);
        allContentP.closest("div").css({
          backgroundColor: "#ffffff68",
        });
        allContentP.eq(targetIndex).closest("div").css({
          backgroundColor: "#ffffff",
        });
        allContentP.eq(targetIndex).slideDown(500);
      } else if (valueInput.length == 0) {
        allContentP.closest("div").css({
          backgroundColor: "#ffffff68",
        });
        allContentP.slideUp(500);
      }
    });

    fromPw.submit(function (e) {
      let finallValue = input.val();
      let hasNumber = /\d/.test(finallValue);
      let hasLowercase = /[a-z]/.test(finallValue);
      if (finallValue.length < 8 || !hasLowercase || !hasNumber) {
        e.preventDefault();
        alertError(
          10000,
          "Password minimal terdiri dari huruf kecil, angka, dan 8 karakter!"
        );
      }
    });
  };
  checkStatusPassword("#checkPassword", ".statusActive", ".formRegis");
});
