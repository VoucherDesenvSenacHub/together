
<button class="component-back-button" id="component-back-button">
    <i id="component-back-icon" class="fa-solid fa-arrow-left"></i>
</button>


<script>
    let forwardButton = document.getElementById("component-back-button");
    forwardButton.addEventListener("click", () => {
        history.back();
    });
</script>