<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel Satuan</title>
</head>
<body>

<table border="1">
  <thead>
    <tr>
      <th>ID</th>
      <th>Satuan</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="tableBody">
    
  </tbody>
</table>
<a href="/SatuanBarang/create">Tambah</a>
<script>
    fetch('http://127.0.0.1:8000/api/SatuanBarang')
    .then(response => response.json())
    .then(data => {
      // Get the table body element
      const tableBody = document.getElementById('tableBody');

      // Loop through the data and create table rows
      data.forEach(item => {
        const row = document.createElement('tr');
        const idCell = document.createElement('td');
        const satuanCell = document.createElement('td');
        const actionCell = document.createElement('td');

        // Set the content of each cell
        idCell.textContent = item.id;
        satuanCell.textContent = item.satuan;

        // Create Edit button
        const editButton = document.createElement('button');
        editButton.textContent = 'Edit';
        editButton.addEventListener('click', () => {
          // Add logic to handle edit button click (e.g., redirect to edit page)
          window.location.href = `/SatuanBarang/${item.id}`
        });

        // Create Delete button
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.addEventListener('click', () => {
            fetch(`http://127.0.0.1:8000/api/SatuanBarang/${item.id}`, {
                method: 'DELETE'
            })
            .then(response => {
            if (response.ok) {
              // Handle successful deletion (e.g., remove the row from the table)
              row.remove();
              console.log(`Item with ID ${item.id} deleted successfully`);
            } else {
              // Handle unsuccessful deletion (e.g., show an error message)
              console.error('Error deleting item:', response.statusText);
            }
          })
          .catch(error => {
            console.error('Error deleting item:', error);
          });
        });

        // Append buttons to the action cell
        actionCell.appendChild(editButton);
        actionCell.appendChild(deleteButton);

        // Append cells to the row
        row.appendChild(idCell);
        row.appendChild(satuanCell);
        row.appendChild(actionCell);

        // Append the row to the table body
        tableBody.appendChild(row);
      });
    })
    .catch(error => {
      console.error('Error fetching data:', error);
    });
</script>

</body>
</html>
