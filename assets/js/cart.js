let cart = $('.menu-item');

$(document).on("click", "#addCart", function(){  
    let id = $(this).data('id');
    let nama = $(this).data('nama');
    let harga = $(this).data('harga');

    menu = {
        'id':id, 
        'nama':nama, 
        'qty': 0, 
        'harga':harga
    }
    
    cartNumbers(menu);
    subTotal(menu);
    displayMenu();
})

function cartNumbers(menu){
    let menuNumbers = localStorage.getItem('cartNumbers');

    menuNumbers = parseInt(menuNumbers);

    if( menuNumbers ){
        localStorage.setItem('cartNumbers', menuNumbers + 1);
        document.querySelector('.cart span').textContent = menuNumbers + 1;
    }else{
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart span').textContent = 1;
    }

    setItems(menu);
    
}

function setItems(menu){
    let cartItems = localStorage.getItem('menuInCart');
    cartItems = JSON.parse(cartItems);

    if(cartItems != null){
        if(cartItems[menu.nama] == undefined){
            cartItems = {
                ...cartItems,
                [menu.nama]: menu
            }
        }
        cartItems[menu.nama].qty += 1;
    } else {
        menu.qty = 1;
        cartItems = {
            [menu.nama]: menu
        }
    }

    localStorage.setItem('menuInCart', JSON.stringify(cartItems));
}

function onLoadCartNumbers(){
    let menuNumbers = localStorage.getItem('cartNumbers');

    if(menuNumbers){
        document.querySelector('.cart span').textContent = menuNumbers;
    }
}

function subTotal(menu){
    let hargaMenu = localStorage.getItem('subTotal');
    
    if(hargaMenu != null){
        hargaMenu = parseInt(hargaMenu);
        localStorage.setItem('subTotal', hargaMenu + menu.harga);
    }else{
        localStorage.setItem('subTotal', menu.harga);
    }

}

function displayMenu(){
    let cartItems = localStorage.getItem('menuInCart');
    cartItems = JSON.parse(cartItems);
    let subTotal = localStorage.getItem('subTotal');
    subTotal = JSON.parse(subTotal);
    let cartNumbers = localStorage.getItem('cartNumbers');
    cartNumbers = JSON.parse(cartNumbers);
    // console.log(cartNumbers);
    let shipping = 3000;
    let listCart = "";
    let data_id = "";
    let data_qty = "";
    let totalCart = "";

    if(cartItems){
        listCart = '<table class="table">';
        listCart += '<thead>'+
                            
                          '</thead><tbody>';
        for (i in cartItems){
            listCart += '<tr>';
            listCart += '<td>'+ cartItems[i].nama + ' ( x ' + cartItems[i].qty +') </td>'+
                              '<td>'+ (cartItems[i].harga * cartItems[i].qty)+ ' </td>'+
                              // '<td>'+ cartItems[i].qty + ' </td>'+
                              '<td><a class="btn btn-danger" href="javascript:void(0)" onclick="hapusData(\''+cartItems[i].nama+'\')"><i class="fas fa-trash"></i></a></td>';
            listCart += '</tr>'; 

            data_id += '<input type="hidden" name="menu_id[]" value="'+ cartItems[i].id +'">';
            data_qty += '<input type="hidden" name="qty[]" value="'+ cartItems[i].qty +'">';

        }
        listCart += '</tbody></table>';
    }else {
        listCart = '<h5 class="text-subtitle"><i>Belum ada pesanan</i></h5>';
    }

    if(subTotal == null){
        subTotal = 0;
    }

    let totalHarga = (subTotal + shipping);
    $('.form #id_menu').html(data_id);
    $('.form #data_qty').html(data_qty);
    $('.form #total_cart').html(totalCart);
    $('#list-cart').html(listCart);
    $('#shipping').html('Rp. '+ shipping);
    $('#subTotal').html('Rp. '+ subTotal);
    $('#totalHarga').html('Rp. '+ totalHarga);
}

function hapusData(menu){
    let hargaMenu = localStorage.getItem('subTotal');
    let menuNumbers = localStorage.getItem('cartNumbers');
    let cartItems = JSON.parse(localStorage.getItem('menuInCart')); 
    menuNumbers = parseInt(menuNumbers);

    if(hargaMenu != null){
        hargaMenu = parseInt(hargaMenu);
        localStorage.setItem('subTotal', hargaMenu - (cartItems[menu].harga*cartItems[menu].qty));
    }else{
        localStorage.setItem('subTotal', cartItems[menu].harga);
    }

    if( menuNumbers ){
        localStorage.setItem('cartNumbers', menuNumbers - (1*cartItems[menu].qty));
        document.querySelector('.cart span').textContent = menuNumbers - (1*cartItems[menu].qty);
    }else{
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart span').textContent = 1;
    }

    if(localStorage.menuInCart){
        cartItems = JSON.parse(localStorage.getItem('menuInCart')); 

        if (cartItems[menu]){
            delete cartItems[menu];
        }

        localStorage.setItem('menuInCart', JSON.stringify(cartItems));
        displayMenu();
    } 
}

$(document).on("click","#submit", function(){
  localStorage.clear();
})

onLoadCartNumbers();
displayMenu();
