<div class="loader text-center" style="margin-top: 15%;">

    <span></span>

    <span></span>

    <span></span>

</div>

<?php echo '

<script>

    const loader = document.querySelector(".loader");

    const main = document.querySelector(".main");



    function init(){

        setTimeout(() => {

            loader.style.opacity = 0;

            loader.style.display = "none";



            main.style.display = "block";

            setTimeout(() => (main.style.opacity = 1, 50));

        }, 1000);

    }



    init();

</script>

';

?>
