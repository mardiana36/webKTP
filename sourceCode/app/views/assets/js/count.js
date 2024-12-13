function fetchDashboardData() {
  fetch("index.php?action=getDashboardData")
    .then((response) => response.text())
    .then((html) => {
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, "text/html");
      document.querySelector("#totalPengajuan").innerText =
        doc.querySelector("#totalPengajuan").innerText;
      document.querySelector("#totalPembuatan").innerText =
        doc.querySelector("#totalPembuatan").innerText;
      document.querySelector("#totalLaporan").innerText =
        doc.querySelector("#totalLaporan").innerText;
      const tableBody = document.querySelector("table tbody");
      const newTableBody = doc.querySelector("table tbody");
      tableBody.innerHTML = newTableBody.innerHTML;
    })
    .catch((err) => console.error("Gagal memuat data:", err));
}

setInterval(fetchDashboardData, 5000);
