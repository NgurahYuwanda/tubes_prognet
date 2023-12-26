<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan Form</title>
</head>

<body>

    <!-- Form -->
    <form id="myForm">
        <label for="penjualan_id">Penjualan ID:</label>
        <input type="text" id="penjualan_id" name="penjualan_id" required>
        <br>
        <label for="barang_id">Barang ID:</label>
        <input type="text" id="barang_id" name="barang_id" required>
        <br>
        <label for="kuantitas">Kuantitas:</label>
        <input type="text" id="kuantitas" name="kuantitas" required>
        <br>
        <!-- Submit Button -->
        <button type="submit">Submit</button>

        <!-- Back Button (Can be a link to go back) -->
        <a href="/DetailPenjualan">Back</a>
    </form>

    <!-- Script to Handle Form Submission with Fetch API -->
    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get the values of the form inputs
            const penjualan_idValue = document.getElementById('penjualan_id').value;
            const barang_idValue = document.getElementById('barang_id').value;
            const kuantitasValue = document.getElementById('kuantitas').value;

            // Prepare the form data
            const formData = new FormData();
            formData.append('penjualan_id', penjualan_idValue);
            formData.append('barang_id', barang_idValue);
            formData.append('kuantitas', kuantitasValue);

            // Make a POST request using the Fetch API
            fetch('http://127.0.0.1:8000/api/DetailPenjualan', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the server (you can replace this with your logic)
                    console.log('Server response:', data);
                    if (data !== null) {
                        window.location.href = '/DetailPenjualan';
                    }
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                });
        });
    </script>

</body>

</html>