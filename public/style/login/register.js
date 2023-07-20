$(document).on('click', '.btnRegister', function() {
    var id = $(this).val();

    var formRegist = $('#formRegister')[0];
    var formData = new FormData(formRegist);

    $.ajax({
        type: "POST",
        url: "/authRegist",
        processData: false,
        contentType: false,
        data: formData, 

        success: function(response){
            console.log("Berhasil ");
            console.log(response);

            alert(response.message);
            console.log(response.dataRegist);

            $('.bgPemisah').addClass('ml-[442px]')

        }

    })

});