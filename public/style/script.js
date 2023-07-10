
$(document).ready(function() {
    $(document).on('click', '.editBtn', function() {
        var id = $(this).val();

        $.ajax({  
            type: "GET", 
            url: "/editBarang/"+id, 
            success: function(response){  
                $('#id').val(response.Barang.id);
                $('#idBarang').val(response.Barang.idBarang);
                $('#nama').val(response.Barang.namaBarang);
                $('#tipeBarangs').val(response.Barang.tipeBarang);
                $("#tipeBarang option[value='"+ response.Barang.tipeBarang +"']").prop('selected', true)
                $('#jumlahBarang').val(response.Barang.jumlahBarang);
            }
        })
    })

    $(document).on('click', '.editMember', function() {
      var id = $(this).val();

      console.log(id);

      $.ajax({ 
        type: "GET",
        url: "/editMember/"+id,
        success: function(response){
          $('#ids').val(response.Member.id);
          $('#idMembers').val(response.Member.idMember);
          $('#namaMembers').val(response.Member.namaMember);
          $('#tipeMembers').val(response.Member.tipeMember);
          $('#usernames').val(response.Member.username);
          $('#passwords').val(response.Member.password);
        }
      })

    })

    // Data Member Search
    $(document).on('keyup', '#search', function() {
      $value = $(this).val();
       
      console.log($value);

      if($value){ 
          $('#allData').hide();
          $('.searchData').show();
      }else{
          $('#allData').show();
          $('.searchData').hide();
      }

      $.ajax({
          type:'GET',
          url:"/search",
          data:{'search':$value},

          success:function(data){
            console.log(data);
              $('#Content').html(data);
          }

      });

  })
    
})

$('#tipeBarang').on('change', function() {
  var value = $(this).val();
  generateCodeIdBarang(value);
  console.log("Value Select = " + value);
});

// Generate code
function generateCodeIdBarang(tipeBarang) {

    // Generate a random suffix 
    let suffix = "";
    for (let i = 0; i < 4; i++) {
      suffix += Math.floor(Math.random() * 10);
    }

    switch(tipeBarang) {
      case "Stempel":
        $('#idBarangs').val("STM" + "-" + suffix);
        break;
      case "Undangan":
        $('#idBarangs').val("UND" + "-" + suffix);
        break;
      case "Spanduk":
        $('#idBarangs').val("SDK" + "-" + suffix);
        break;
      case "Lanyard":
        $('#idBarangs').val("LYD" + "-" + suffix);
        break;
      case "Id Card":
        $('#idBarangs').val("ICD" + "-" + suffix);
        break;

      default:
        $('#idBarangs').val("-");
    }

  } 

    //   Add Library Data AOS
    AOS.init();