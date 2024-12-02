$(function () {
    function typing() {
        const sentences = [
          "Welcome to KTP Online!",
          "Bikin KTP Jadi Lebih Mudah!",
        ];
      
        const textElement = $("#type");
        const cursorElement = $("<span>|</span>").addClass("blinking");
      
        textElement.append(cursorElement);
        let sentenceIndex = 0;
        let sentenceCharIndex = 0;
        let isTyping = true;
      
        function type() {
          const currentSentence = sentences[sentenceIndex];
      
          if (isTyping) {
            if (sentenceCharIndex < currentSentence.length) {
              textElement.text(currentSentence.substring(0, sentenceCharIndex + 1));
              textElement.append(cursorElement);
              sentenceCharIndex++;
              setTimeout(type, 100);
            } else {
              isTyping = false;
              setTimeout(type, 1000);
            }
          } else {
            if (sentenceCharIndex > 0) {
              textElement.text(currentSentence.substring(0, sentenceCharIndex - 1));
              textElement.append(cursorElement);
              sentenceCharIndex--;
              setTimeout(type, 100);
            } else {
              isTyping = true;
              sentenceIndex = (sentenceIndex + 1) % sentences.length;
              setTimeout(type, 500);
            }
          }
        }
      
        type();
      }
      
  typing();
  
  const dropCategory = (btn, sub, icon, img = null) => {
    let button = $(btn);
    let subcategory = $(sub);
    let iconDrop = $(icon);
    subcategory.hide();

    const changeImg = (image, index) => {
      $(image).fadeOut(500, function () {
        if (index == 1) {
          $(image).attr("src", "app/views/assets/images/cara2.png");
        } else if (index == 2) {
          $(image).attr("src", "app/views/assets/images/cara3.png");
        } else if (index == 3) {
          $(image).attr("src", "app/views/assets/images/cara4.png");
        } else {
          $(image).attr("src", "app/views/assets/images/cara1.png");
        }
        $(image).fadeIn(500);
      });
    };

    subcategory
      .eq(0)
      .slideDown(500)
      .closest("li")
      .find(icon)
      .removeClass("bxs-chevron-down")
      .addClass("bxs-chevron-up");
    button.each(function (index) {
      $(this).click(function () {
        subcategory.slideUp(500);
        iconDrop.removeClass("bxs-chevron-up").addClass("bxs-chevron-down");
        let targetSub = $(this).closest("li").find(sub);
        if (targetSub.is(":visible")) {
          targetSub.slideUp(500);
        } else {
          targetSub.slideDown(500);
          if (img != null) {
            changeImg(img, index);
          }
          $(this).find(icon).toggleClass("bxs-chevron-down bxs-chevron-up");
        }
      });
    });
  };
  dropCategory(
    ".btnShowHideDropList",
    ".showHideDropList",
    ".iconDropList",
    ".imgDropList"
  );
      
});
