function adicionarColunaTotalizadora() {
    const table = document.getElementById('notas-table');
    const thead = table.querySelector('thead');
    const tbody = table.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');

    const headerRow = thead.querySelector('tr');
    if (headerRow.cells.length < 13) { 
        const newHeader = document.createElement('th');
        newHeader.textContent = 'Média';
        headerRow.appendChild(newHeader);
    }


    rows.forEach((row, rowIndex) => {
        if (rowIndex > -1) {  
            let sum = 0;
            let count = 0;
            for (let i = 1; i <= 9; i++) {
                const cell = row.cells[i];
                if (cell && cell.textContent && !isNaN(cell.textContent)) {
                    sum += parseFloat(cell.textContent);
                    count++;
                }
            }
            const avg = count > 0 ? (sum / count).toFixed(2) : 'N/A';
            row.innerHTML += `<td>${avg}</td>`;
        }
    });
}


function adicionarLinhaTotalizadora() {
    const table = document.getElementById('notas-table');
    const tbody = table.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');
    const newRow = document.createElement('tr');
    newRow.innerHTML = '<td>Média</td>';

    for (let i = 1; i <= 9; i++) {
        let sum = 0;
        let count = 0;
        rows.forEach(row => {
            const cell = row.cells[i];
            if (cell && cell.textContent && !isNaN(cell.textContent)) {
                sum += parseFloat(cell.textContent);
                count++;
            }
        });
        const avg = count > 0 ? (sum / count).toFixed(2) : 'N/A';
        newRow.innerHTML += `<td>${avg}</td>`;
    }
    newRow.innerHTML += '<td></td>';
    tbody.appendChild(newRow);
}
