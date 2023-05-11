const modal = document.getElementById("modal_buy");

// Remove
const handleRemove = (bookID, userID) => {
    $.ajax({
        url: 'cartFunction.php',
        method: 'POST',
        data: {
            'action': 'removeFromCart',
            'userID': userID,
            'bookID': bookID,
        },
        success: function (res) {
            if (res == 'success') {
                alert('Đã xoá khỏi giỏ hàng!')
                location.reload()
            } else {
                alert('Xoá khỏi giỏ hàng thất bại!')
            }
        }
    })
}

// Show modal
const handleShowModal = () => {
    modal.style.display = 'flex';
}

const handleCloseModal = () => {
    modal.style.display = 'none';
}

const handleBuyProduct = (userID, bookID) => {
    $.ajax({
        url: 'cartFunction.php',
        method: 'POST',
        data: {
            'action': 'buy',
            'userID': userID,
            'bookID': bookID,
            'amount': document.getElementById('amount_modal').value
        },
        success: function (res) {
            if (res == 'success') {
                alert('Mua hàng thành công!')
                const modal = document.getElementById("modal_buy");
                modal.style.display = 'none';
            } else {
                alert('Mua hàng thất bại!')
            }
        }
    })
}