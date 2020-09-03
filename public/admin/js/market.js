function convertToSlug(Text)
{
    return Text
        .replace(/^\s+|\s+$/gm, '')
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}

function callFancyBox(){
    $('.iframe-btn').fancybox({
        'width'		: 900,
        'height'	: 600,
        'type'		: 'iframe',
        'autoScale'    	: false
    });
}

function responsive_filemanager_callback(field_id){
    var url=jQuery('#'+field_id).val();
    $("#holder").attr("src",url);
    $('#thumbnail').val(url.replace('http://pratimagurung.com.np/',''));
}

function multipleSelect(selector, placeholder){
    $('.'+selector).select2({
        placeholder: placeholder        
    });
}

function initSelect(id){
    $("#"+id).select2();
}

function MarketColors(id){
    $.ajax({
        method: "GET",
        url: "/colors", //{{ route('colors') }}
        dataType: 'json',
        success: function(response) {
            $.each(response, function(key, value) {
                $('#'+id).append('<option value="'+response[key]['id']+'">'+response[key]['name']+'</option>');
            });
        },
    });
};

function Wholesale(id){
    $.ajax({
        method: "GET",
        url: "/wholesale", //{{ route('colors') }}
        dataType: 'json',
        success: function(response) {
            $.each(response, function(key, value) {
                $('#'+id).append('<option value="'+response[key]['id']+'">'+response[key]['name']+'</option>');
            });
        },
    });
};

function javaAlert(response){
    var type=  response.alert_type;
    switch(type){
        case 'info':
        toastr.info(response.message);
        break;
    case 'success':
        toastr.success(response.message);
        break;
    case 'warning':
        toastr.warning(response.message);
        break;
    case 'error':
    toastr.error(response.message);
    break;
    }
}