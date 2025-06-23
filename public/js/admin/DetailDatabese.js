const imageInputContainer = document.getElementById('imageInputContainer');
const urlInputContainer = document.getElementById('urlInputContainer');

const imgTag = document.getElementById('img_address');
const urlTag = document.getElementById('img_url');


window.addEventListener('DOMContentLoaded', function() {

    const imgVisible = imgTag && imgTag.complete && imgTag.naturalWidth > 0;
    const urlVisible = urlTag && urlTag.complete && urlTag.naturalWidth > 0;

    if (imgVisible) {
        imageInputContainer.style.display = 'block';
        urlInputContainer.style.display = 'none';
        document.getElementById('radio_img').checked = true;
    } else if (urlVisible) {
        imageInputContainer.style.display = 'none';
        urlInputContainer.style.display = 'block';
        document.getElementById('radio_url').checked = true;
    } else {
        alert("可能圖片檔案或路徑壞掉了");
        imageInputContainer.style.display = 'block';
        urlInputContainer.style.display = 'block';
    }
});


function toggleInput(name){

    if(name === 'image'){
        imageInputContainer.style.display = 'block';
        urlInputContainer.style.display = 'none';
    }else if(name === 'url'){
        imageInputContainer.style.display = 'none';
        urlInputContainer.style.display = 'block';
    }

}


window.addEventListener('DOMContentLoaded', function(){

    const imageInput = document.getElementById('imageInput');
    const urlInput = document.getElementById('urlInput');

    imageInput.addEventListener('change', function(event){
        document.getElementById('radio_img').checked = true;
        const preview = document.getElementById('img_address');
        const imgAddressText = document.getElementById('img_address_text');

        const reader = new FileReader();
        const file = event.target.files[0];

        if (file) {
            reader.onload = function(e) {
                preview.src = e.target.result;
                imgAddressText.textContent = file.name;
            };
            reader.readAsDataURL(file);
        }
    })

    imageInput.addEventListener('submit', function(){
        if(document.getElementById('radio_img').checked = true){
            urlInput.value = '';
        }
    })

    urlInput.addEventListener('change', function(){
        document.getElementById('radio_url').checked = true;
        const preview = document.getElementById('img_url');
        preview.src = urlInput.value;
    })

})


window.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector("form[action=\"{{ route('update') }}\"]") || document.querySelector('form');
    if (form) {
        form.addEventListener('keydown', function(event) {
            // Enterキー（key: 'Enter'）が押された場合
            if (event.key === 'Enter') {
                // textarea以外でEnterを押した場合のみ送信を防ぐ
                if (event.target.tagName !== 'TEXTAREA') {
                    event.preventDefault();
                }
            }
        });
    }

    if (form) {
        form.addEventListener('submit', function(event) {
            alert('image_or_url:' + document.querySelector('input[name="image_or_url"]:checked').value);
        });
    }
});