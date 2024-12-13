<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>

    <h1>Upload File</h1>

    <!-- Form Upload -->
    <?php if(session()->getFlashdata('success')): ?>
        <p style="color: green;"><?php echo session()->getFlashdata('success'); ?></p>
    <?php elseif(session()->getFlashdata('error')): ?>
        <p style="color: red;"><?php echo session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <form action="/upload" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>  <!-- CSRF Token untuk keamanan -->

        <label for="file">Pilih File</label>
        <input type="file" name="file" id="file" required>

        <br><br>

        <button type="submit">Upload</button>
    </form>

</body>
</html>
