document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('ordentd');
    const headers = table.querySelectorAll('th');
    let sortOrder = 1; // 1 for ascending, -1 for descending

    headers.forEach((header, index) => {
      header.addEventListener('click', () => {
        sortOrder = header.classList.contains('sort-asc') ? -1 : 1;
        sortTableByColumn(table, index, sortOrder);

        headers.forEach(h => h.classList.remove('sort-asc', 'sort-desc'));
        header.classList.toggle('sort-asc', sortOrder === 1);
        header.classList.toggle('sort-desc', sortOrder ===
          -1);
      });
    });

    function sortTableByColumn(table, columnIndex, order) {
      const tbody = table.querySelector('tbody');
      const rows = Array.from(tbody.querySelectorAll('tr'));

      rows.sort((rowA, rowB) => {
        const cellA = rowA.querySelectorAll('td')[columnIndex].textContent.trim();
        const cellB = rowB.querySelectorAll('td')[columnIndex].textContent.trim();

        const cellAValue = parseCellValue(cellA);
        const cellBValue = parseCellValue(cellB);

        return cellAValue > cellBValue ? (1 * order) : (-1 * order);
      });

      rows.forEach(row => tbody.appendChild(row));
    }

    function parseCellValue(value) {
      if (!isNaN(value) && value !== "") {
        return parseFloat(value);
      }
      if (value.includes('/')) {
        return new Date(value);
      }
      return value.toLowerCase();
    }
  });