<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Form</title>
</head>

<body>

    <!-- Form -->
    <form id="myForm">
        <label for="kode">Kode:</label>
        <input type="text" id="kode" name="kode" required>
        <br>
        <label for="namabarang">Nama Barang:</label>
        <input type="text" id="namabarang" name="namabarang" required>
        <br>
        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga" required>
        <br>
        <label for="stok">Stok:</label>
        <input type="text" id="stok" name="stok" required>
        <br>
        <label for="satuan_id">Satuan ID:</label>
        <input type="text" id="satuan_id" name="satuan_id" required>
        <br>
        <!-- Submit Button -->
        <button type="submit">Submit</button>

        <!-- Back Button (Can be a link to go back) -->
        <a href="/Barang">Back</a>
    </form>

    <!-- Script to Handle Form Submission with Fetch API -->
    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get the values of the form inputs
            const kodeValue = document.getElementById('kode').value;
            const namabarangValue = document.getElementById('namabarang').value;
            const hargaValue = document.getElementById('harga').value;
            const stokValue = document.getElementById('stok').value;
            const satuan_idValue = document.getElementById('satuan_id').value;

            // Prepare the form data
            const formData = new FormData();
            formData.append('kode', kodeValue);
            formData.append('namabarang', namabarangValue);
            formData.append('harga', hargaValue);
            formData.append('stok', stokValue);
            formData.append('satuan_id', satuan_idValue);

            // Make a POST request using the Fetch API
            fetch('http://127.0.0.1:8000/api/Barang', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from the server (you can replace this with your logic)
                    console.log('Server response:', data);
                    if (data !== null) {
                        window.location.href = '/Barang';
                    }
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                });
        });
    </script>

</body>

</html>