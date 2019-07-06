//Hàm kích hoạt datatable
$(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
//slide biên mất sau 3s	
$("div.alert").delay(3000).slideUp();
//Hiển thị thông báo trước khi xóa (cần truyền msg)
function xacnhanxoa(msg){
	if(window.confirm(msg)){
		return true;
	}
	return false;
}
//Phương thức thêm nhiều hàng để insert
$(document).ready(function(){
	$("#addImages").click(function(){
		//$("#insert").append('<div class="form-group"><input type="file" name="fProductDetail"></div>');
		//append làm xuất hiện div class
		$("#insert").append('<div class="form-group"><input type="file" name="fProductDetail[]"></div>');
	});
});
//Xóa nhiều hình trong edit hình laravelKP 
$(document).ready(function(){
	// a là <a></a> #tenid => $del_img_demo
	$("a#del_img_demo").on('click',function(){
		//tác động giửa form luôn kèm theo token
		var url = "http://laravelkhoapham.test:8080/admin/product/delimg/";
		// token cần tên form nên tạo name cho form và tìm kiếm token đó
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
		//do ajax bắt đầu từ <a></a> nên xài parent để lên thẻ <img> 
		var idHinh= $(this).parent().find("img").attr('idHinh');	//lấy mã id hình trong databse
		//lấy dường dẫn của hình
		var img= $(this).parent().find("img").attr('src');
		//lấy mã id theo thứ tự trong web đứng vị trí thứ mấy 
		var rid= $(this).parent().find("img").attr('id');
		$.ajax(
			{
				url: url+idHinh,
				type: 'GET', 	//giống với phương thức get hay post vào phương thức gọi ajax này( ở đây là getDelImg)
				cache: false,
				data:{"_token":_token,"idHinh":idHinh,"urlHinh":img},
				success: function(data){
					if(data == "Oke"){
						// Hình có mã rid(id vị trí từ trên xuống) bị xóa
						$("#"+rid).remove();
					}else{
						alert("Error ! Please Contact Admin");
					}
				}
			}
		);
	});
});