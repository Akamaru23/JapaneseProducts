const input = document.getElementById('imageInput');
const input_url = document.getElementById('UrlInput');

const preview = document.getElementById('preview');
const cancelButton = document.getElementById('cancelButton');

document.addEventListener('DOMContentLoaded', function(){
    
    input.addEventListener('change', function(event) {
        const reader = new FileReader();
        const file = event.target.files[0];

        if (file) {
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                cancelButton.style.display = 'inline-block';
            };
            reader.readAsDataURL(file);
        }
    });

    cancelButton.addEventListener('click', function(){
        input.value='';
        preview.src = '';
        preview.style.display = 'none';
        cancelButton.style.display = 'none';

    });

    input_url.addEventListener('change', function(){
        const url_preview = document.getElementById('preview_url');
        url_preview.style.display = 'block';
        url_preview.src = input_url.value;
    });

})

function toggleInput(type) {
    if (type === 'image') {
        document.getElementById('imageInputContainer').style.display = 'block';
        document.getElementById('urlInputContainer').style.display = 'none';
        
        const url_preview = document.getElementById('preview_url');
        input_url.value='';
        url_preview.src = '';
        url_preview.style.display = 'none';
    } else if (type === 'url') {
        document.getElementById('imageInputContainer').style.display = 'none';
        document.getElementById('urlInputContainer').style.display = 'block';
        
        input.value='';
        preview.src = '';
        preview.style.display = 'none';
        cancelButton.style.display = 'none';
    }
}