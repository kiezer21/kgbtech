function showOrder(){  
    $.ajax({
        url:"./adminView/viewallOrder.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showReviews(){  
    $.ajax({
        url:"./adminView/viewReviews.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showSorder(){  
    $.ajax({
        url:"./adminView/viewallSorder.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showProductItems(){  
    $.ajax({
        url:"./adminView/viewAllProducts.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showServices(){  
    $.ajax({
        url:"./adminView/viewServices.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function ChangeOrderStatus(id){
    $.ajax({
       url:"./controller/updateOrderStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Order Status updated successfully');
           $('form').trigger('reset');
           showOrder();
       }
   });
}


function ChangeSorderStatus(id){
    $.ajax({
       url:"./controller/updateSorderStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Service Status updated successfully');
           $('form').trigger('reset');
           showSorder();
       }
   });
}

//add product data
function addItems(){
    var product_name=$('#product_name').val();
    var price=$('#price').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];

    var fd = new FormData();
    fd.append('product_name', product_name);
    fd.append('price', price);
    fd.append('file', file);
    fd.append('upload', upload);
    $.ajax({
        url:"./controller/addItemController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Product Added successfully.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

function addServices(){
    var service_name=$('#service_name').val();
    var s_desc=$('#s_desc').val();
    var s_price=$('#s_price').val();

    var fd = new FormData();
    fd.append('service_name', service_name);
    fd.append('s_desc', s_desc);
    fd.append('s_price', s_price);
    $.ajax({
        url:"../controller/addServicesController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Service Added successfully.');
            $('form').trigger('reset');
            showServices();
        }
    });
}

function addOrder(){
    var product_id = parseInt('{{ $product->product_id }}');
    var name=$('#name').val();
    var email=$('#email').val();
    var contact=$('#contact').val();
    var address=$('#address').val();

    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('name', name);
    fd.append('email', email);
    fd.append('contact', contact);
    fd.append('address', address);
    $.ajax({
        url:"../controller/checkout.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Added successfully.');
            $('form').trigger('reset');
            showOrder();
        }
    });
}

function addSorder(){
    var id = parseInt('{{ $services->id }}');
    var name=$('#name').val();
    var email=$('#email').val();
    var contact=$('#contact').val();
    var address=$('#address').val();

    var fd = new FormData();
    fd.append('id', id);
    fd.append('name', name);
    fd.append('email', email);
    fd.append('contact', contact);
    fd.append('address', address);
    $.ajax({
        url:"../controller/scheckout.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Added successfully.');
            $('form').trigger('reset');
            showSorder();
        }
    });
}
/*
function addOrder() {
    var p_id = parseInt('{{ $product->product_id }}');
    var c_id = parseInt('{{ $customer->c_id }}');
    var total_price = $('#total_price').val();

    var fd = new FormData();
    fd.append('p_id', p_id);
    fd.append('c_id', c_id);
    fd.append('total_price', total_price);

    $.ajax({
        url: "./controller/addOrderController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Order Successful.');
            $('form').trigger('reset');
            showOrder();
        }
    });
} */



function itemEditForm(id){
    $.ajax({
        url:"./adminView/editItemForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function updateItems(){
    var product_id = $('#product_id').val();
    var product_name = $('#product_name').val();
    var price = $('#price').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('product_name', product_name);
    fd.append('price', price);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
   
    $.ajax({
      url:'./controller/updateItemController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Data Update Success.');
        $('form').trigger('reset');
        showProductItems();
      }
    });
}

function itemDelete(id){
    $.ajax({
        url:"./controller/deleteItemController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

function reviewDelete(id){
    $.ajax({
        url:"./controller/deleteReviewController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Review Successfully deleted');
            $('form').trigger('reset');
            showReviews();
        }
    });
}

function confirmDelete(id) {
    var confirmation = confirm("Are you sure you want to delete this order?");
    if (confirmation) {
      orderDelete(id);
    }
}

function orderDelete(id){
    $.ajax({
        url:"./controller/deleteOrderController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Order deleted');
            $('form').trigger('reset');
            showOrder();
        }
    });
}

function confirmSDelete(id) {
    var confirmation = confirm("Are you sure you want to delete this order?");
    if (confirmation) {
      sorderDelete(id);
    }
}

function sorderDelete(id){
    $.ajax({
        url:"./controller/deleteSorderController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Service Avail deleted');
            $('form').trigger('reset');
            showSorder();
        }
    });
}

function sorderDelete(id){
    $.ajax({
        url:"./controller/deleteSorderController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Service Avail deleted');
            $('form').trigger('reset');
            showSorder();
        }
    });
}

function serviceDelete(id){
    $.ajax({
        url:"./controller/deleteServiceController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Successfully deleted');
            $('form').trigger('reset');
            showServices();
        }
    });
}



function serviceEditForm(id){
    $.ajax({
        url:"./adminView/editServiceForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function updateService(){
    var id = $('#id').val();
    var service_name = $('#service_name').val();
    var s_desc = $('#s_desc').val();
    var s_price = $('#s_price').val();
    var fd = new FormData();
    fd.append('id', id);
    fd.append('service_name', service_name);
    fd.append('s_desc', s_desc);
    fd.append('s_price', s_price);
   
    $.ajax({
      url:'./controller/updateServiceController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Update Success.');
        $('form').trigger('reset');
        showServices();
      }
    });
}