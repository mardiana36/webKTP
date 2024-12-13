function fetchViewData() {
  fetch("index.php?action=getAdminPengajuan")
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

setInterval(fetchViewData, 5000);
