function fetchPembuatanData() {
  fetch("index.php?action=getAdminPembuatan")
    .then((response) => response.text())
    .then((html) => {
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, "text/html");

      const tableBody = document.querySelector("table tbody");
      const newTableBody = doc.querySelector("table tbody");

      tableBody.innerHTML = newTableBody.innerHTML;
    })
    .catch((err) => console.error("Gagal memuat data:", err));
}

setInterval(fetchPembuatanData, 5000);
