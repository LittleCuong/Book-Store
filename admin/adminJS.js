
document.getElementById('add_user').addEventListener('click', (e) => {
    e.preventDefault()
    const name = document.getElementById('name_input').value;
    const email = document.getElementById('email_input').value;
    const password = document.getElementById('password_input').value;
    const address = document.getElementById('address_input').value;
    $.ajax({
        url: 'adminFunction.php',
        method: 'POST',
        data: {
            'action': 'addUser',
            'name': name,
            'email': email,
            'password': password,
            'address': address
        },
        success: function (res) {
            if (res == 'success') {
                alert('Đã thêm khách hàng!')
                window.reload()
            } else {
                alert('Thêm khách hàng thất bại - Kiểm tra lại thông tin hoặc thử lại sau ít phút!')
            }
        }
    })
})

document.getElementById('remove_user').addEventListener('click', (e) => {
    e.preventDefault()
    const userID = document.getElementById('userID_input-rm').value;
    const name = document.getElementById('name_input-rm').value;
    const email = document.getElementById('email_input-rm').value;
    const address = document.getElementById('address_input-rm').value;

    if ( userID && name && email && address ) {
        $.ajax({
            url: 'adminFunction.php',
            method: 'POST',
            data: {
                'action': 'removeUser',
                'ID': userID,
                'name': name,
                'email': email,
                'address': address
            },
            success: function (res) {
                if (res == 'success') {
                    alert('Đã xoá khách hàng!')
                    window.reload()
                } else {
                    alert('Xoá khách hàng thất bại - Kiểm tra lại thông tin hoặc thử lại sau ít phút!')
                }
            }
        })
    } else {
        alert('Chưa nhập đủ dữ liệu');
    }

})


let category = 1

function handleChange(data) {
    category = data;
}

// Manage product
document.getElementById('add_product').addEventListener('click', (e) => {
    e.preventDefault()
    const name = document.getElementById('bookName_input').value;
    const author = document.getElementById('author_input').value;
    const price = document.getElementById('price_input').value;
    const publisher = document.getElementById('publisher_input').value;
    const image = document.getElementById('image_input').value;

    if (name && author && price && publisher && image) {
        $.ajax({
            url: 'adminFunction.php',
            method: 'POST',
            data: {
                'action': 'addProduct',
                'name': name,
                'author': author,
                'price': price,
                'publisher': publisher,
                'category': category,
                'image': image
            },
            success: function (res) {
                if (res == 'success') {
                    alert('Đã thêm sản phẩm!')
                    window.reload()
                } else {
                    alert('Thêm sản phẩm thất bại - Kiểm tra lại thông tin hoặc thử lại sau ít phút!')
                }
            }
        })
    } else {
        alert('Chưa nhập đủ dữ liệu');
    }

})

document.getElementById('remove_product').addEventListener('click', (e) => {
    e.preventDefault()
    const bookID = document.getElementById('bookID_input-rm').value;
    const bookName = document.getElementById('bookName_input-rm').value;

    if ( bookID && bookName ) {
        $.ajax({
            url: 'adminFunction.php',
            method: 'POST',
            data: {
                'action': 'removeProduct',
                'ID': bookID,
                'name': bookName
            },
            success: function (res) {
                if (res == 'success') {
                    alert('Đã xoá sản phẩm!')
                } else {
                    alert('Xoá sản phẩm thất bại - Kiểm tra lại thông tin hoặc thử lại sau ít phút!')
                }
            }
        })
    } else {
        alert('Chưa nhập đủ dữ liệu');
    }

})

const handleSearch = () => {
    $.ajax({
        url: 'adminFunction.php',
        method: 'POST',
        data: {
            'action': 'search',
            'ID': document.getElementById('search_input').value
        },
        success: function (res) {
            document.getElementById('container').innerHTML = res;
        }
    })
}

const handleUpdate = (bookID, categoryID) => {
    $.ajax({
        url: 'adminFunction.php',
        method: 'POST',
        data: {
            'action': 'update',
            'bookID': bookID,
            'bookName': document.getElementById('bookName_update').value,
            'bookAuthor': document.getElementById('bookAuthor_update').value,
            'bookPrice': document.getElementById('bookPrice_update').value,
            'bookPublisher': document.getElementById('bookPublisher_update').value,
            'bookCategory': document.getElementById('bookCategory_update').value == '' ? categoryID : document.getElementById('bookCategory_update').value,
            'bookImage': document.getElementById('bookImage_update').value

        },
        success: function (res) {
            if (res == 'success') {
                alert('Đã cập nhật thông tin sản phẩm!')
                location.reload()
            } else {
                alert('Cập nhật thông tin sản phẩm thất bại - Kiểm tra lại thông tin hoặc thử lại sau ít phút!')
            }
        }
    })
}

