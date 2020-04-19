//Autocomplete ajax for searching for campuses in user.create
$(document).ready(function(){
    var campus = $('#campuses').tagsinput({
        itemValue: 'id',
        itemText: 'text',
        confirmKeys: [128, 149],
    });

    $(campus[0].$input).keyup(function(){   
        var query = $(this).val();
        if(query != ''){
            var _token = $('input[name="_token"]').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({ 
                url:"/admin/campus/fetchCampus",
                method:"POST",
                data:{query:query, _token:_token},
                dataType: "json",
                success:function(data){
                    var htmlMK = '<ul class="dropdown-menu autocomplete autocomplete-pos">';
                    data.forEach(function(i) {
                        htmlMK = htmlMK + '<li class="p-1"><a class="p-1" style="text-decoration:none;color:black" href="#">' + i.id + ' | ' + i.name + '</a></li>';
                    });

                    if(data.length == 0) {
                        htmlMK = htmlMK + '<li class="p-1">NO RESULT FOUND</li>';
                    }
                    htmlMK = htmlMK + '</ul>';
                    
                    $('#campus').html(htmlMK);
                    $('#campus').fadeIn(); 
                }
            });
        }
    });
 
    $(document).on('click', '#campus li', function(){  
        var details = $(this).text().split('|');
        $(campus[0].$input).val('');
        $('#campuses').tagsinput('add', { id: details[0], text: details[1] });  
        $('#campus').fadeOut();  
        console.log($("#campuses").val());
    });

//    document.getElementById("borrower").addEventListener("blur", function() { 
 //       $('#patronList').fadeOut();  
 //   });

    $('#campuses').on('beforeItemAdd', function(event) {
        //console.log(event.item);
    });
}); 