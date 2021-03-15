function readURL(input, target, control) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            target.src = control.value = e.target.result;
            target.hidden = false;
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}