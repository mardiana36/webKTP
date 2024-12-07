$(function () {
  $("#download-btn").on("click", function () {
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF();

    // Menangkap elemen HTML sebagai canvas
    const ktpElement = $("#ktp")[0];
    const scale = 5; // Skala resolusi, semakin tinggi semakin tajam

    html2canvas(ktpElement, {
      scale: scale,
      useCORS: true,
    }).then((canvas) => {
      const imgData = canvas.toDataURL("image/png", 1.0);
      const imgWidth = 85.6;
      const imgHeight = (canvas.height * imgWidth) / canvas.width;

      pdf.addImage(imgData, "PNG", 10, 10, imgWidth, imgHeight);
      pdf.save("ktp.pdf");
    });
  });

  function shere(idbtn) {
    const shareButton = document.getElementById(idbtn);
    shareButton.addEventListener("click", async () => {
      if (navigator.share) {
        try {
          await navigator.share({
            title: "Judul Website",
            text: "Cek website ini!",
            url: window.location.href,
          });
        } catch (error) {
          alert("Gagal membagikan tautan: " + error.message);
        }
      } else {
        alert("Browser tidak mendukung fitur berbagi!");
      }
    });
    }
    shere('share-btn');
});
