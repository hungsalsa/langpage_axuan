var host = window.location.href; //backend
host = host.split("backend");
var base_url = window.location.origin;
// var base_url = host.replace("backend", "");
// alert(base_url);
tinymce.init({
  selector: "textarea.content",
  element_format : 'html',
  theme : "modern",
  height: 280,
  
  plugins: 'code print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern',
  toolbar1: "code undo redo | bold italic underline fontsizeselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
  toolbar2: 'bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | pastetext removeformat searchreplace | table |image media |link unlink anchor| print preview fullscreen',

  image_advtab: true,


    // plugins: [
    // "code autolink link image lists charmap print preview hr anchor pagebreak importcss",
    // "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
    // "table contextmenu directionality emoticons paste textcolor responsivefilemanager fullscreen"
    // ],
    // theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
    // toolbar1: "code undo redo | bold italic underline fontsizeselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    // toolbar2: "responsivefilemanager | pastetext removeformat searchreplace | table | media |link unlink anchor| print preview fullscreen",
    fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
    // menubar: "format",
    valid_elements : '*[*]',
    toolbar_items_size: 'small',
    relative_urls: false,
    remove_script_host:false,
    // content_css: "/my-styles.css",
    importcss_append: true,
    allow_script_urls: true,
    extended_valid_elements : "script[type|src]",
    relative_urls : true,
    document_base_url : base_url,
    filemanager_title:"Quản lý file",
    external_filemanager_path: host[0]+"filemanager/",
    external_plugins: { "filemanager" : host[0]+"filemanager/plugin.min.js"},
    filemanager_access_key:"dfc78fb912939b31a2798211ae7e950c",
});

$(document).ready(function(){
  // alert('adsa');
	// demo.initChartist();

	// $.notify({
	// 	icon: 'pe-7s-gift',
	// 	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

	// },{
	// 	type: 'info',
	// 	timer: 4000
	// });

$("#imageFile").click(function (event) {
    $("#myModal").modal();
  })

  $('#myModal').on('hidden.bs.modal', function () {
    imgsrc = $("#imageFile").val();
    // alert(imgsrc);
    $("#previewImage").attr('src', imgsrc);
  })


  function ChangeToSlug()
  {
    var title, slug;

    //Lấy text từ thẻ input title 
    title = document.getElementById("title_slug").value;

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi khoảng daaus cham thành ký tự rong
    // slug = slug.replace(/\./gi, "");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/[^a-zA-Z0-9]/gi, '-');
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');

    // $str = slug.replace('/([\s]+)/gi', '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //Đổi chữ hoa thành chữ thường
    slug = slug.toLowerCase();
    //In slug ra textbox có id “slug”
    document.getElementById('slug_url').value = slug;
  }
  
  $("#title_slug").blur(function(event) {
    ChangeToSlug();
  });

  
});