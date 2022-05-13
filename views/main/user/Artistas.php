<?php require "views/templates/header.php"; ?>
<!-- ##### Header Area End ##### -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo constant('URL') ?>resources/resources/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Cantantes mas populares</p>
            <h2>Artistas</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">
            

            <div class="row oneMusic-albums">
            <?php
            foreach ($this->listaArtista as $artista) {
            ?>
                <!-- Single Album -->
                <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p" style="height: 100px;">
                    <div class="single-album">
                        <img src="<?php echo constant('URL') ?>resources/artistas/<?php echo $artista->getImg(); ?>" alt="">
                        <div class="album-info">
                            <a href="#">
                            <a href="#" onclick="prueba('<?php echo $artista->getImg(); ?>',
                            '<?php echo $artista->getNombreartista(); ?>',
                            '<?php echo $artista->getDescripcion(); ?>')"><h5><?php echo $artista->getNombreartista(); ?></h5></a>
                            </a>
                            <p>Cantante</p>
                        </div>
                    </div>
                </div>

                <script>
                    function prueba(img, nombre, descripcion) {
                        document.getElementById("img").src = "<?php echo constant('URL') ?>resources/artistas/" + img;
                        document.getElementById("nombre").innerHTML = nombre;
                        document.getElementById("descripcion").innerHTML = descripcion.replace(/_|#|-|@|<>/g, " ");
                        var p1 = document.getElementById("s");
                        var p2 = document.getElementById("s1");
                        p1.click();
                        p2.click();
                    }
                </script>


            <?php
            }
            ?>
            </div>
        </div>

        <div class="products-container" style="cursor: pointer;" id="s1" hidden>
                <div style="cursor: pointer;" class="product" data-name="p-1" id="s"></div>
            </div>

            <div class="products-preview">

                <div class="preview" data-target="p-1">
                    <i class="fas fa-times"></i>
                    <img src="" alt="" id="img">
                    <h3 class="price" id="nombre"></h3>
                    <p id="descripcion"></p>
                </div>
            </div>
    </section>
    <!-- ##### Album Catagory Area End ##### -->

  
<script>
    let preveiwContainer = document.querySelector('.products-preview');
    let previewBox = preveiwContainer.querySelectorAll('.preview');

    document.querySelectorAll('.products-container .product').forEach(product => {
        product.onclick = () => {
            preveiwContainer.style.display = 'flex';
            let name = product.getAttribute('data-name');
            previewBox.forEach(preview => {
                let target = preview.getAttribute('data-target');
                if (name == target) {
                    preview.classList.add('active');
                }
            });
        };
    });

    previewBox.forEach(close => {
        close.querySelector('.fa-times').onclick = () => {
            close.classList.remove('active');
            preveiwContainer.style.display = 'none';
        };
    });
</script>

<br><br><br><br><br><br><br><br><br><br><br>

<!-- ##### Footer Area Start ##### -->
<?php require "views/templates/footer.php"; ?>



