$(document).ready(function () {
  function dragAndDrop(idArea, idFile, idImg) {
    const dropArea = $(idArea);
    const fileInput = $(idFile);
    const previewImg = $(idImg);

    dropArea.on("dragover", function (e) {
      e.preventDefault();
      dropArea.addClass("hover");
    });

    dropArea.on("dragleave", function () {
      dropArea.removeClass("hover");
    });

    dropArea.on("drop", function (e) {
      if (!dropArea.hasClass("disabled")) {
        e.preventDefault();
        dropArea.removeClass("hover");
        const file = e.originalEvent.dataTransfer.files[0];
        if (file) {
          fileInput[0].files = e.originalEvent.dataTransfer.files;
          displayPreview(file);
        }
      }
    });
    dropArea.on("click", function (e) {
      if (!$(e.target).is("#file-input")) {
        fileInput.click();
      }
    });

    fileInput.on("change", function (e) {
      const file = e.target.files[0];
      if (file) {
        displayPreview(file);
      }
    });

    function displayPreview(file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        previewImg.attr("src", e.target.result);
        const fileName = file.name;
        fileInput.val(fileName);
      };
      reader.readAsDataURL(file);
    }
  }
  dragAndDrop("#drop-area", "#file-input", "#preview-img");
  function ttd(idCanvas, idTtd, idBtnClear, idBtnSave) {
    let canvas = $(idCanvas)[0];
    let ctx = canvas.getContext("2d");
    ctx.lineCap = "round";
    ctx.lineJoin = "round";
    ctx.lineWidth = 100;
    let isDrawing = false;
    const inputFile = $(idTtd)[0];
    const clear = $(idBtnClear);
    const save = $(idBtnSave);
  
    function isCanvasBlank(canvas) {
      const context = canvas.getContext("2d");
      const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
      for (let i = 0; i < imageData.data.length; i += 4) {
        if (imageData.data[i + 3] !== 0) {
          return false;
        }
      }
      return true;
    }
  
    function conditionCanvas(canvas) {
      if (isCanvasBlank(canvas)) {
        save.css({
          opacity: "0",
          visibility: "hidden",
        });
      } else {
        save.css({
          opacity: "1",
          visibility: "visible",
        });
      }
    }
  
    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;
  
    conditionCanvas(canvas);
  
    canvas.addEventListener("mousedown", function (e) {
      isDrawing = true;
      ctx.beginPath();
      ctx.moveTo(e.offsetX, e.offsetY);
    });
  
    canvas.addEventListener("mousemove", function (e) {
      if (isDrawing) {
        ctx.lineTo(e.offsetX, e.offsetY);
        ctx.stroke();
      }
    });
  
    canvas.addEventListener("mouseup", function () {
      isDrawing = false;
      conditionCanvas(canvas);
    });
  
    clear.on("click", function () {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      conditionCanvas(canvas);
      inputFile.value = "";
    });
  
    save.on("click", function () {
      const croppedCanvas = cropCanvas(canvas);
      const dataUrl = croppedCanvas.toDataURL("image/png");
      const file = dataURLtoFile(dataUrl, "ttd.png");
      const dataTransfer = new DataTransfer();
      dataTransfer.items.add(file);
      inputFile.files = dataTransfer.files;
      alertSuksess("Sukses!", "Tanda tangan anda akan disimpan.");
    });
  
    function cropCanvas(originalCanvas) {
      const ctx = originalCanvas.getContext("2d");
      const imageData = ctx.getImageData(0, 0, originalCanvas.width, originalCanvas.height);
  
      let minX = originalCanvas.width;
      let maxX = 0;
      let minY = originalCanvas.height;
      let maxY = 0;
  
      // Mencari batas dari tanda tangan yang digambar
      for (let y = 0; y < originalCanvas.height; y++) {
        for (let x = 0; x < originalCanvas.width; x++) {
          const index = (y * originalCanvas.width + x) * 4;
          if (imageData.data[index + 3] !== 0) {
            if (x < minX) minX = x;
            if (x > maxX) maxX = x;
            if (y < minY) minY = y;
            if (y > maxY) maxY = y;
          }
        }
      }
  
      // Menghitung ukuran canvas baru berdasarkan batas tanda tangan
      const croppedWidth = maxX - minX;
      const croppedHeight = maxY - minY;
  
      // Membuat canvas baru untuk cropped image
      const croppedCanvas = document.createElement("canvas");
      const croppedCtx = croppedCanvas.getContext("2d");
  
      croppedCanvas.width = croppedWidth;
      croppedCanvas.height = croppedHeight;
  
      // Memindahkan tanda tangan ke posisi tengah canvas baru
      croppedCtx.drawImage(
        originalCanvas,
        minX, minY, croppedWidth, croppedHeight, // source area
        0, 0, croppedWidth, croppedHeight // target area
      );
  
      return croppedCanvas;
    }
  
    function dataURLtoFile(dataUrl, filename) {
      const arr = dataUrl.split(",");
      const mime = arr[0].match(/:(.*?);/)[1];
      const bstr = atob(arr[1]);
      let n = bstr.length;
      const u8arr = new Uint8Array(n);
      while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
      }
      return new File([u8arr], filename, { type: mime });
    }
  }
  
  ttd("#canvas", "#ttdInput", "#clear", "#save");
  

});
