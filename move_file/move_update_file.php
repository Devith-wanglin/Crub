<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Preview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="container w-50 mt-4 p-2 shadow rounded-3">
        <form action="">
            <img id="image" src="https://i.pinimg.com/1200x/6e/59/95/6e599501252c23bcf02658617b29c894.jpg" class="rounded-circle" width="300px" height="300px" alt="">
            <input type="file" id="file" class="form-control mt-2">
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $('#file').hide(); // hide file input initially

            $('#image').click(function(){
                $('#file').click(); // open file selector when image is clicked
            });

            $('#file').change(function(){
                const file = this.files[0];
                if(file){
                    const image = URL.createObjectURL(file);
                    $('#image').attr('src', image); // update image preview
                }
            });
        });
    </script>
</body>
</html>
