//Autocomplete ajax for searching for campuses in user.create
$(document).ready(function(){
    var campus = $('#campuses').tagsinput({
        itemValue: 'id',
        itemText: 'text',
        confirmKeys: [128, 149],
    });

    //@error('campuses') is-invalid @enderror

    var campusParent = $('#campuses');
    if(campusParent.siblings('span').children('strong').length)
    {
        campusParent.siblings('.bootstrap-tagsinput').addClass('is-invalid');
    }

    if(campusParent.val() !== '')
    {
        var _token = $('input[name="_token"]').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({ 
            url:"/admin/campus/fetchCampuses",
            method:"POST",
            data:{query:campusParent.val(), _token:_token},
            dataType: "json",
            success:function(data){
                data.forEach(function(i) {
                    $('#campuses').tagsinput('add', { id: i.id, text: i.name });  
                });
            }
        });
    }

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
    });

    document.getElementById("campuses").addEventListener("blur", function() { 
        $('#campus').fadeOut();  
    });

    $('html').click(function(e) {                    
        if(!$(e.target).hasClass('autocomplete'))
        {
            $('#campus').fadeOut();                 
        }
    }); 
}); 