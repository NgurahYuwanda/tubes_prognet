<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penjualan</title>
</head>

<body>

    <!-- Form for Editing Penjualan -->
    <form id="editForm">
        <label for="nomorTransaksi">Nomor Transaksi:</label>
        <input type="text" id="nomorTransaksi" name="nomorTransaksi" required>
        <br>
        <br>
        <label for="totalHarga">Total Harga:</label>
        <input type="text" id="totalHarga" name="totalHarga" required>
        <br>
        <br>

        <label for="userId">User ID:</label>
        <input type="text" id="userId" name="userId" required>
        <br>
        <br>
        <!-- Hidden input for storing the ID of the item being edited -->
        <input type="hidden" id="editItemId" name="editItemId">

        <!-- Submit Button for Editing -->
        <button type="submit">Update</button>

        <!-- Back Button (Can be a link to go back) -->
        <a href="/Penjualan">Back</a>
    </form>

    <!-- Script to Populate Form with Existing Data -->
    <script>
        // Get the item ID from the URL
        const itemId = window.location.pathname.split('/').pop();

        // Fetch existing data for editing
        fetch(`http://127.0.0.1:8000/api/Penjualan/${itemId}`)
            .then(response => response.json())
            .then(existingData => {
                // Fill the form fields with existing data
                document.getElementById('nomorTransaksi').value = existingData.nomortransaksi;
                document.getElementById('totalHarga').value = existingData.totalharga;
                document.getElementById('userId').value = existingData.user_id;
                document.getElementById('editItemId').value = existingData.id;
            })
            .catch(error => {
                console.error('Error fetching existing data:', error);
            });
    </script>

    <!-- Script to Handle Edit Form Submission -->
    <script>
        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get the edited values
            const editedNomorTransaksi = document.getElementById('nomorTransaksi').value;
            const editedTotalHarga = document.getElementById('totalHarga').value;
            const editedUserId = document.getElementById('userId').value;
            const itemId = document.getElementById('editItemId').value;

            // Prepare the data to be sent to the server for update
            const updatedData = {
                id: itemId,
                nomortransaksi: editedNomorTransaksi,
                totalharga: editedTotalHarga,
                user_id: editedUserId,
            };

            // Make a PUT request using the Fetch API (replace 'http://example.com/update-endpoint' with your actual update endpoint)
            fetch(`http://127.0.0.1:8000/api/Penjualan/${itemId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(updatedData),
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the server
                    console.log('Update response:', data);

                    // Redirect to /Penjualan on successful update
                    if (data !== null) {
                        window.location.href = '/Penjualan';
                    }
                })
                .catch(error => {
                    console.error('Error updating data:', error);
                });
        });
    </script>

</body>

</html>