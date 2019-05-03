var timeout = null;
$(document).ready(function(){
	$.ajax({
		processData: false,
		contentType: false,
		url: '?mod=category&act=getListCategory',
		type: 'get',

		success : function(data){
            var array = JSON.parse(data);
            $.each(JSON.parse(array.cates), function(key,value){
				console.log(value.name);
                $('#category_head').append('<li class="" index="' + key + '"><a href="#">'+value.name+'</a></li>');
            })
		},
	});

     $('#search').keyup(function(){
        $('#choose_search').remove();
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            checkSearchUsed();    
        }, 500);

    });
    $('#search').click(function(){
        checkSearchUsed();    
    });
 //    $('#search').blur(function(){
	// 	$('#choose_search').remove();
	// })

});

function checkSearchUsed() {
    var ketqua= $('#search').val();
    var i;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$.ajax({
		processData: false,
		contentType: false,
		url: '?mod=product&act=searchListProduct',
		type: 'get',
		data: "ketqua="+ketqua,

		success : function(data){
            console.log(data)
			var array = JSON.parse(data);
			 if(array != ''){
                $('#search_info').html('<ul id="choose_search"></ul>')
                for (var i = 0; i < 4; i++) {
                    $('#choose_search').append('<li class="choose_phone_true" index="' + i + '"><a href="?mod=product&act=productdetail&productCode='+array.products[i].code+'" class="add-card">'+array.products[i].code+'-'+array.products[i].name+'</a></li>');
                }
            }
		},
	});
}