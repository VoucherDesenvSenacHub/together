document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('file');
    const preview = document.getElementById('preview');
    const text = document.querySelector('.text');
    const icon = document.querySelector('.icon-upload');
    const formPreview = document.querySelector('.formulario-imagem-preview');
    
    if (fileInput && preview && formPreview) {
        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                if (text) text.style.display = 'none';
                if (icon) icon.style.display = 'none';
                formPreview.style.border = 'none';

                const reader = new FileReader();
                reader.addEventListener('load', function () {
                    preview.setAttribute('src', this.result);
                    preview.style.display = 'block';
                });
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.setAttribute('src', '#');
            }
        });
    }
});
